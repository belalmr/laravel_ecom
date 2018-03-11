@component('mail::message')
# Reset Password

Welecom {{ $data['data']->name }}
{{--Welecom <p> {{ \App\Http\admin_auth()->user()->name }} </p>--}} {{-- Why Not?!--}}

You can reset password to url: http://bel.com

@component('mail::button', ['url' => url('/admin/password/'. $data['token'])])
Click Here to Reset Password
@endcomponent
or <br>
Copy this link <br>
<a href="{{ url('/admin/password/'. $data['token']) }}"> {{ url('/admin/password/'. $data['token'])  }}</a> <br>
Thanks,<br>
{{--{{ config('app.name') }}--}}
@endcomponent
