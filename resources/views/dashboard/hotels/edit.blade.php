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
                            <h2 class="content-header-name float-left mb-0">Hotels</h2>
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
                                              action="{{ route('hotels.update', $hotel->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field'        => 'name',
                                                                    'label'        => '',
                                                                    'type'         => 'input',
                                                                    'maxlength'    => 255,
                                                                    'required'     => true,
                                                                    'translations' => $hotel->translations,
                                                                    'locales'      => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('name.en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Address</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field'        => 'address',
                                                                    'label'        => '',
                                                                    'type'         => 'input',
                                                                    'maxlength'    => 255,
                                                                    'required'     => true,
                                                                    'translations' => $hotel->translations,
                                                                    'locales'      => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('address.en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Phone</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                       name="phone" id="phone"
                                                                       value="{{ $hotel->phone }}">
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Photo</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" class="form-control"
                                                                       name="photo">
                                                                @error('photo')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="{{ $hotel->photo }}"
                                                                     style="width: 100px; height: 100px; object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 offset-md-0">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">update</button>
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
