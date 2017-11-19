
{{-- Intro Lines --}}
@foreach ($introLines as $line)
<div style="size: 20px; color: blue"><center>{{ $line }}</center></div>

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
<div style="size: 20px; color: blue"><center>{{ $line }}</center></div>

@endforeach

{{-- Salutation --}}
{{-- @if (! empty($salutation))
{{ $salutation }}
@else
T2HD Bookstore
@endif --}}

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
Nếu có vấn đề khi click vào nút "{{ $actionText }}", bạn hãy dùng đường dẫn dưới đây để sử dụng dịch vụ lấy lại mật khẩu của chúng tôi: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endisset

