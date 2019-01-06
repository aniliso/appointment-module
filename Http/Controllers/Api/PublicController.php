<?php

namespace Modules\Appointment\Http\Controllers\Api;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Appointment\Http\Requests\AppointmentCreateRequest;
use Modules\Appointment\Repositories\AppointmentRepository;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Setting\Contracts\Setting;

class PublicController extends BasePublicController
{
    /**
     * @var AppointmentRepository
     */
    private $appointment;
    /**
     * @var Setting
     */
    private $setting;

    public function __construct(AppointmentRepository $appointment, Setting $setting)
    {
        parent::__construct();
        $this->appointment = $appointment;
        $this->setting = $setting;
    }

    /**
     * @param AppointmentCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Mailer $mailer, AppointmentCreateRequest $request)
    {
        if($request->ajax()) {
            $request->request->add(['appointment_at'=>$request->datepicker.' '.$request->timepicker.':00']);
            $inputs = $request->except(['datepicker', 'timepicker']);
            if($appointment = $this->appointment->create($inputs)) {
                $mailer->send('appointment::emails.html.enquiry', compact('appointment'), function ($message) use ($request) {
                    $message->to(
                        $this->setting->get('contact::contact-to-email', locale()),
                        $this->setting->get('contact::contact-to-name', locale())
                    );
					$message->replyTo($request->email, $request->first_name.' '.$request->last_name);
                    $message->subject('Randevu Formu');
                });
                return response()->json(['success'=>true]);
            }
        }
        return response()->json(['success'=>false]);
    }
}
