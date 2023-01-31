<div>
    @if ($flag)
        @include('auth.login')
    @else
        @include('auth.request_password')
    @endif
</div>
