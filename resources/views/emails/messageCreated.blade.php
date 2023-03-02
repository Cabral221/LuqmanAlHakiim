@component('mail::message')
# Message from Daara luqmane Al Hakiim

- {{ $name }}
- {{ $email }}

@component('mail::panel')
{{ $msg }}
@endcomponent

@component('mail::button', ['url' => route('admin.blog.messages.show',$idMes)])
Watch from the website
@endcomponent


Reply directly from here or log in to the administration panel to reply to this message.
<br>
<p sttle="text-align:center">Daara luqmane Al Hakiim</p>
@endcomponent
