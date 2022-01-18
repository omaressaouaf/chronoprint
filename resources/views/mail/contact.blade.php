@component('mail::message')
# Message du formulaire de contact


@if ($mailData["name"])
Nom : {{$mailData["name"]}}
@endif
<br>
@if ($mailData["phone"])
Téléphone : {{$mailData["phone"]}}
@endif
<br>
Email : {{$mailData["email"]}}


@component('mail::panel')
{{$mailData["message"]}}
@endcomponent


Merci<br>
{{ config('app.name') }}
@endcomponent
