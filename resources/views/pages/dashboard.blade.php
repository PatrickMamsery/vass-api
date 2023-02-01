@extends('layouts.app')
@section('page')
    <div class="dashboard-wrapper">
        <div class="row">
            <div class="col-md-9">
                <div class="header mb-1">
                    <h2>Hello {{ Auth::user()->name }}</h2>
                    <p>Welcome back!</p>
                </div>
                <div class="body">

                </div>
            </div>
            <div class="col-md-3">
                <div class="section-right summary light-bg">
                    right section
                </div>
            </div>
        </div>
        <div class="mt-4"></div>
    </div>
@endsection