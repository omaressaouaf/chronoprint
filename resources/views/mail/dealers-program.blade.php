@component('mail::message')
# Demande revendeur


Nom : {{$mailData["name"]}}
<br>
@if ($mailData["company"])
Entreprise : {{$mailData["company"]}}
<br>
@endif
@if ($mailData["phone"])
Téléphone : {{$mailData["phone"]}}
<br>
@endif
Email : {{$mailData["email"]}}


@component('mail::panel')
{{$mailData["message"]}}
@endcomponent


Merci<br>
{{ config('app.name') }}
@endcomponent
