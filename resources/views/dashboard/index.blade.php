@extends('dashboard.layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="{{asset('dashboard/images/elements/decore-left.png')}}" class="img-left" alt="
            card-img-left">
                                        <img src="{{asset('dashboard/images/elements/decore-right.png')}}" class="img-right" alt="
            card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Congratulations {{\Illuminate\Support\Facades\Auth::user()->username}},</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{\App\Models\Booking\Booking::count()}}</h2>
                                    <p class="mb-0">Bookings</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{\App\Models\Blog\Blog::count()}}</h2>
                                    <p class="mb-0">Blogs</p>
                                </div>
                                <div class="card-content">
                                    <div id="orders-received-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Events</h4>
                                    <div class="dropdown chart-dropdown">


                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="product-order-chart" class="mb-3"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">All</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Event::count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Event::where('is_active',1)->count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">Not Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Event::where('is_active',0)->count()}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Tours</h4>
                                    <div class="dropdown chart-dropdown">


                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="product-order-chart" class="mb-3"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">All</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Tour::count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Tour::where('publish',1)->count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">Not Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Tour::where('publish',0)->count()}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Blogs</h4>
                                    <div class="dropdown chart-dropdown">


                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="product-order-chart" class="mb-3"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">All</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Blog\Blog::count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{\App\Models\Blog\Blog::count()}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">Not Publish</span>
                                            </div>
                                            <div class="product-result">
                                                <span>0</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Last Bookings</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>

                                                <th>Tour</th>
                                                <th>City</th>
                                                <th>Arrival date</th>
                                                <th>Departure date</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1 ?>
                                            @foreach(\App\Models\Booking\Booking::orderBy('created_at', 'Desc')->limit(10)->get() as  $order)

                                                <tr>
                                                    <td>#{{$i++}}</td>

                                                    <td>{{$order->name  }}</td>
                                                    <td>{{$order->email  }}</td>
                                                    <td>{{$order->tour->name  }}</td>
                                                    <td>{{ $order->city->name }}</td>
                                                    <td>{{ $order->arrival_date }}</td>
                                                    <td>{{ $order->departure_date }}</td>



                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection


