<?php

namespace Modules\Appointment\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment__appointments';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'message', 'appointment_at'];
	protected $dates = [
		'created_at',
		'updated_at',
		'appointment_at'
	];

    public function getFullNameAttribute()
    {
        return $this->getAttribute('first_name').' '.$this->getAttribute('last_name');
    }

    public function setAppointmentAtAttribute($value)
    {
        return $this->attributes['appointment_at'] = Carbon::parse($value);
    }
}
