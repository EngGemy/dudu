@extends('dashboard.layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Settings</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal"
                                              action="{{ route('settings.update',$setting->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'site_name',
                                                            'label' => 'Site Name',
                                                            'type' => 'input',
                                                            'required' => true,
                                                            'translations' => $setting->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Mobile Phone</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->manager_phone}}" type="text"
                                                                       class="form-control" name="manager_phone">
                                                                @error('manager_phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'address',
                                                            'label' => 'Address',
                                                            'type' => 'input',
                                                            'translations' => $setting->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Email</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->email}}" type="text"
                                                                       class="form-control" name="email">
                                                                @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Currency</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="currency">
                                                                    <option>Select Currency</option>
                                                                    <option @if($setting->currency =='$') selected @endif value="$">Dollar</option>
                                                                    <option @if($setting->currency =='Egp') selected @endif value="Egp">Egp</option>
                                                                    <option @if($setting->currency =='Sar') selected @endif value="Sar">Sar</option>
                                                                    <option @if($setting->currency =='€') selected @endif value="€">Euro</option>
                                                                </select>
                                                                @error('currency')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'opening_words',
                                                            'label' => 'Opening Words',
                                                            'type' => 'textarea',
                                                            'rows' => 3,
                                                            'translations' => $setting->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'Tags',
                                                            'label' => 'Tags',
                                                            'type' => 'textarea',
                                                            'rows' => 3,
                                                            'translations' => $setting->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'location',
                                                            'label' => 'Location',
                                                            'type' => 'textarea',
                                                            'rows' => 4,
                                                            'translations' => $setting->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Site Logo</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" class="form-control"
                                                                       name="site_logo_header">
                                                                @error('site_logo_header')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            @if($setting->site_logo_header != null )
                                                                <div class="col-sm-3">
                                                                    <img
                                                                        style="object-fit: contain;width: 190px;height: 90px;background-color: darkgray;"
                                                                        class="imgsit"
                                                                        src="{{$setting->site_logo_header}}"
                                                                        alt="no_sit_logo">
                                                                </div>
                                                            @else
                                                                <div style="padding: 35px" class="col-sm-3">
                                                                    <span>There is not Photo </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Site Footer Logo</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" class="form-control"
                                                                       name="site_logo_footer">
                                                                @error('site_logo_footer')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            @if($setting->site_logo_footer != null )
                                                                <div class="col-sm-3">
                                                                    <img
                                                                        style="object-fit: contain;width: 190px;height: 90px;background-color: darkgray;"
                                                                        class="imgsit"
                                                                        src="{{$setting->site_logo_footer}}"
                                                                        alt="no_sit_logo">
                                                                </div>
                                                            @else
                                                                <div style="padding: 35px" class="col-sm-3">
                                                                    <span>There is not Photo </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Site Icon</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" id="first-name-vertical"
                                                                       class="form-control" name="site_logo_icon">
                                                                @error('site_logo_icon')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            @if($setting->site_logo_icon != null )
                                                                <div class="col-sm-3">
                                                                    <img class="imgsit"
                                                                         src="{{$setting->site_logo_icon}}"
                                                                         alt="no_sit_logo">
                                                                </div>
                                                            @else
                                                                <div style="padding: 35px" class="col-sm-3">
                                                                    <span>No Photo </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
