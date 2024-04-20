@extends('layouts.app')
    @section('page')
    <div class="page logs-wrapper ">
        <div class="body">
            <div class="custom-header">
                <h2>System logs</h2>
            </div>
            @livewire('system-log')
        </div>
    </div>
    @endsection