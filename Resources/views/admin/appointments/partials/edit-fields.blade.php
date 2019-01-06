<div class="box-body">
    <table class="table" style="width: 50%;">
        <tr>
            <th>Randevu Tarihi</th>
            <td>{{ $appointment->appointment_at->formatLocalized('d F Y H:i') }}</td>
        </tr>
        <tr>
            <th>{{ trans('appointment::appointments.form.first_name') . '&' . trans('appointment::appointments.form.last_name') }}</th>
            <td>{{ $appointment->fullname }}</td>
        </tr>
        <tr>
            <th>{{ trans('appointment::appointments.form.phone') }}</th>
            <td>{{ $appointment->phone }}</td>
        </tr>

        <tr>
            <th>{{ trans('appointment::appointments.form.email') }}</th>
            <td>{{ $appointment->email }}</td>
        </tr>

        <tr>
            <th>{{ trans('appointment::appointments.form.message') }}</th>
            <td>{{ $appointment->message }}</td>
        </tr>
    </table>
</div>
