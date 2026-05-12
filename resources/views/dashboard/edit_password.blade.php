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
                                        <a class="nav-link d-flex align-items-center "  href="{{route('edit.profile')}}"  role="tab">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Profile </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" role="tab"  href="{{route('admin.change_password')}}">
                                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Password</span>
                                        </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->



                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form class="form form-vertical" action="{{route('admin.update_password')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Old Password</label>
                                                            <input type="password" name="old_password" class="form-control" required data-validation-required-message="كلمة المرور القديمة مطلوب">
                                                            @error('old_password')
                                                            <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control" name="password"  required data-validation-required-message="كلمة المرور الجديدة مطلوب">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
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
