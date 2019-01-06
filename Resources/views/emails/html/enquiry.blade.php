<html>
    <body>
        <p>Merhaba</p>
        <p>Websiteden bir mesaj aldık, mesajın detayları:</p>
		
		<p><strong>Başvuru Tarihi</strong>: {{ $appointment->created_at->formatLocalized('d F Y H:i') }}</p>
		
		<p><strong>Randevu Tarihi</strong>: {{ $appointment->appointment_at->formatLocalized('d F Y H:i') }}</p>

        <p><strong>{{ trans('appointment::appointments.form.fullname') }}</strong>: {{ $appointment->first_name }} {{ $appointment->last_name }}</p>

        <p><strong>{{ trans('appointment::appointments.form.phone') }}</strong>: {{ $appointment->phone }}</p>

        <p><strong>{{ trans('appointment::appointments.form.email') }}</strong>: {{ $appointment->email }}</p>

        <p><strong>{{ trans('appointment::appointments.form.message') }}</strong>: {{ $appointment->message }}</p>
    </body>
</html>