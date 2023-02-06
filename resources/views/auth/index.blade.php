@extends('layouts.main')
@section('layout')
    <div class="auth-wrapper background">
        <div class="auth-form">
            <div class="header">
                <img src="/images/logo_white_red.png" alt="" style="width: 120px">
            </div>
            <div class="body">
                <livewire:authswitch>
            </div>
        </div>
        </div>
    @endsection
