@component('mail::message')
# Introduction

{{$message}}

@component('mail::button', ['url' => $url])
Vérifiez ça
@endcomponent

Merci<br>
{{ config('app.name') }}
@endcomponent
