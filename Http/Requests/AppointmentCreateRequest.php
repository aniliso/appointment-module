<?php namespace Modules\Appointment\Http\Requests;

use Illuminate\Http\Response;
use Modules\Core\Internationalisation\BaseFormRequest;

class AppointmentCreateRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'first_name'           => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email',
            'phone'                => 'required',
            'g-recaptcha-response' => 'required|captcha',
			'datepicker'		   => 'required',
			'timepicker'		   => 'required'
        ];
    }

    public function attributes()
    {
        return trans('appointment::appointments.form');
    }

    public function authorize()
    {
        return true;
    }

    public function response(array $errors)
    {
        return response()->json([
            'success'  => false,
            'messages' => $errors
        ], Response::HTTP_BAD_REQUEST);
    }
}
