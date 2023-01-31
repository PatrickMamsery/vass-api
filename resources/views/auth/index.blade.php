@extends('layouts.main')
@section('layout')
<div class="auth-wrapper">
    <div class="auth-form">
        <div class="header">
            <img src="/images/garage.png" alt="">
        </div>
        <div class="body">
            <livewire:authswitch>
        </div>
    </div>
</div>
@endsection