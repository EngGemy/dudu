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
                            <h2 class="content-header-title float-left mb-0">Travel Service</h2>
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
                                              action="{{ route('travel_service.store') }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Status</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="status">
                                                                    <option value="" disabled selected>Select Status</option>
                                                                    <option value="0">Accommodation</option>
                                                                    <option value="1">Transportation</option>
                                                                    <option value="2">Flight_Reservation</option>
                                                                    <option value="3">Visa_Formalities</option>
                                                                    <option value="4">Tour_Guidance</option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Title</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field'        => 'title',
                                                                    'label'        => '',
                                                                    'type'         => 'input',
                                                                    'maxlength'    => 255,
                                                                    'required'     => true,
                                                                    'translations' => collect(),
                                                                    'locales'      => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('title.en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Description</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field'        => 'description',
                                                                    'label'        => '',
                                                                    'type'         => 'textarea',
                                                                    'rows'         => 7,
                                                                    'required'     => true,
                                                                    'translations' => collect(),
                                                                    'locales'      => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('description.en')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Main Image</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control mt-2"
                                                                       name="main_image" id="main_image">
                                                                @error('main_image')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Icon</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control mt-2"
                                                                       name="icon" id="icon">
                                                                @error('icon')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 offset-md-0">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">save</button>
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

@section('scripts')
    <script>
        @foreach(['en', 'zh', 'zh-Hant'] as $locale)
            CKEDITOR.replace('description_{{ $locale }}', { language: '{{ CKEDITOR() }}' });
        @endforeach
    </script>
@endsection
