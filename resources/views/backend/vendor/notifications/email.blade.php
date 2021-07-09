@component('mail::message')
{{-- Greeting --}}
<img src="https://inapayudaspedagogicas.com.co/files/logo2.jpg" title="Aquicreamos"   width="560" style=" width: 100%; max-width: 560px;"/>

@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# O Tenemos un problema!
@else
# Hola!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Si no puede hacer click "{{ $actionText }}" en el boton, copie y pegue en la url de su explorador: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset
@endcomponent
