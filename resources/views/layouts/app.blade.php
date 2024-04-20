@extends('layouts.main')
@section('layout')
    <div class="main-wrapper">
        <div class="d-flex">
            <div class="navigation">
                <div class="brand-logo">
                    <img src="images/vet_logo.png" width="100" alt="">
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a href="/" class="nav-link active">
                            Dashboard<i class="fa-solid fa-chart-pie"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/centres" class="nav-link">
                            Vet Centres<i class="fa-solid fa-building"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/vets" class="nav-link">
                            Vets<i class="fa-solid fa-user-md"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/appointments" class="nav-link">
                            Appointments <i class="fa-solid fa-clipboard-list"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/statistics" class="nav-link">
                            Statistics<i class="fa-solid fa-chart-column"></i>
                        </a>
                    </li> --}}
                    <div class="divider"></div>
                    <li class="nav-item management">
                        <a  class="nav-link " data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample"> Management<i class="fa-solid fa-users-gear"></i></a>
                        <div class="collapse mb-3" id="collapseExample">
                            <div class="card card-body">
                                <a href="/administration" class="btn btn-custom inner-btn " >Administration <i class="fa-solid fa-user-gear"></i></a>
                                {{-- <a  href="/collectors" class="btn btn-custom inner-btn mt-3">Clients <i class="fa-solid fa-user-group"></i></a> --}}
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/logs" class="nav-link"> Logs<i class="fa-solid fa-file-shield"></i></a>
                    </li>
                </ul>
                <div class="avatar-wrapper dropup">
                    <a class="avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/avatar.png') }}" alt="">
                    </a>

                    <div class="d-flex justify-content-start flex-column">
                        <div class="name">
                            Mr. {{ Auth::user()->name }}
                        </div>
                        <div class="phone">
                            +255 756 808 808
                            {{-- {{ Auth::user()->phone }} --}}
                        </div>
                    </div>
                    <div class="dropdown-menu ml-1 mb-3">
                        <div class="logout">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-3">
                <div class="main-body">
                    @yield('page')
                    {{ $slot ?? '' }}
                </div>
            </div>
        </div>
    </div>
@endsection

