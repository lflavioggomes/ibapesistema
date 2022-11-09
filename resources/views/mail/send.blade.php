@component('mail::message')
Recuperação de senha

Olá, {{$nome}}

Clique no botão para recuperar sua senha do Sistema IBAPE NACIONAL

@component('mail::button', ['url'=> config('app.url').$link])
Recuperar Senha {{config('APP_URL')}}
@endcomponent
@endcomponent
