@component('mail::message')
# Contact Form
<br>
A new contact form was submitted on the {{ config('app.name') }} website<br>
<br>
Name: {{ $request['name'] }}<br>
Email: {{ $request['email'] }}<br>
Contact Number: {{ $request['contact_number'] }}<br>
Message: {{ $request['message'] }}<br>

<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
