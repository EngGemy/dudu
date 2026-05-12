@extends('dashboard.layouts.app')

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="{{route('edit.profile')}}" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Profile </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center " role="tab"  href="{{route('admin.change_password')}}">
                                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Password</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->



                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form class="form form-vertical" action="{{route('update.profile',$admin->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>UserName</label>
                                                            <input type="text" name="username" class="form-control" placeholder="username" value="{{$admin->username}}" required data-validation-required-message="اسم المستخدم مطلوب">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$admin->email}}" required data-validation-required-message="البريد الالكتروني مطلوب">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        </button>

                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>





@endsection
