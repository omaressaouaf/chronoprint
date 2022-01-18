@component('mail::message')
# Notification de commande

{{$message}}

@component('mail::button', ['url' => $url])
Vérifiez ça
@endcomponent

Merci<br>
{{ config('app.name') }}
@endcomponent
