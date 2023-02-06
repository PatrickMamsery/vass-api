@extends('layouts.app')
@section('page')
    <div class="dashboard-wrapper">
        <div class="row">
            <div class="col-md-9">
                <div class="header mb-1">
                    <h2>Hello {{ Auth::user()->name }} 👋</h2>
                    <p>Welcome back!</p>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-4">
                            @include('shared.summary_tile', ['icon' => 'coins', 'title' => 'Sales', 'total' => '100,000', 'trend' => '5', 'subtitle' => 'Since last month', 'trend_direction' => 'up'])
                        </div>
                        <div class="col-md-4">
                            @include('shared.summary_tile', ['icon' => 'cart-shopping', 'title' => 'Orders', 'total' => '200', 'trend' => '17', 'subtitle' => 'Since last month', 'trend_direction' => 'down'])
                        </div>
                        <div class="col-md-4">
                            @include('shared.summary_tile', ['icon' => 'user', 'title' => 'Clients', 'total' => '100', 'trend' => '10', 'subtitle' => 'Since last month', 'trend_direction' => 'up'])
                        </div>
                    </div>
                    <div class="mt-5">
                        @include('components.chart')
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="section-right summary light-bg ">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="icon-border">
                                <div class="icon">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="icon-border">
                                <div class="icon">
                                    <i class="fa-solid fa-lightbulb"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="icon-border">
                                <div class="icon">
                                    <i class="fa-solid fa-gear"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="icon-border">
                                <div class="icon">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="section-right mt-2">
                    @include('components.calendar')
                </div>
                
                
                @include('shared.order_tile', ['image' => 'images/hourglass.png', 'count' => '100', 'title' => 'Pending Orders'])
                
                @include('shared.order_tile', ['image' => 'images/check-circle.png', 'count' => '500', 'title' => 'Accepted Orders'])

                @include('shared.order_tile', ['image' => 'images/denied.png', 'count' => '10', 'title' => 'Denied Orders'])
                
                @include('shared.order_tile', ['image' => 'images/racing-flag.png', 'count' => '1000', 'title' => 'Completed Orders'])
                
                @include('shared.order_tile', ['image' => 'images/hourglass.png', 'count' => '100', 'title' => 'Pending Orders'])
                
            </div>
        </div>
        <div class="mt-4"></div>
    </div>
@endsection
