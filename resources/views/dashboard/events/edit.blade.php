@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Events</h2>

                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">

                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal"
                                              action="{{route('events.update',$event->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body dd">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Title</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field' => 'name',
                                                                    'label' => '',
                                                                    'type' => 'input',
                                                                    'maxlength' => 255,
                                                                    'required' => true,
                                                                    'translations' => $event->translations,
                                                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('name.en')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Active</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">

                                                                    <input type="checkbox" @if($event->is_active ==1) checked @endif class="custom-control-input" id="customSwitch4" name="is_active">
                                                                    <label class="custom-control-label" for="customSwitch4"></label>
                                                                </div>

                                                                @error('is_active')
                                                                <span class="text-danger">{{$message}}</span>
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
                                                                    'field' => 'description',
                                                                    'label' => '',
                                                                    'type' => 'textarea',
                                                                    'rows' => 7,
                                                                    'required' => true,
                                                                    'translations' => $event->translations,
                                                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                <script>
                                                                    @foreach(['en','zh','zh-Hant'] as $loc)
                                                                    CKEDITOR.replace('description_{{ $loc }}', { language: '{{ CKEDITOR() }}' });
                                                                    @endforeach
                                                                </script>
                                                                @error('description.en')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-12" style="margin-top: 20px">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Exclusions</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="container2">

                                                                    <div class="custom-inputs">

                                                                        <div style="width: 100%">
                                                                            <button class="add_form_field2"><i class="fas fa-plus-circle"></i> </button>
                                                                        </div>

                                                                    </div>
                                                                    @php
                                                                        $exclusionValues = json_decode($event->event_exclusions->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
                                                                    @endphp
                                                                    @if($event->event_exclusions and !empty($exclusionValues))
                                                                        @foreach($exclusionValues as $val)

                                                                            <div class="custom-inputs"><input type="text" value="{{$val}}"   class="form-control custom-2"  name="exclusions[]" style="display: inline-flex">
                                                                                <a href="#" class="delete_field2"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif





                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="margin-top: 20px">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Inclusions</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="container3">

                                                                    <div class="custom-inputs">

                                                                        <div style="width: 100%">
                                                                            <button class="add_form_field3"><i class="fas fa-plus-circle"></i> </button>
                                                                        </div>

                                                                    </div>
                                                                    @php
                                                                        $inclusionValues = json_decode($event->event_inclusions->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
                                                                    @endphp
                                                                    @if($event->event_inclusions and !empty($inclusionValues))
                                                                        @foreach($inclusionValues as $val)

                                                                            <div class="custom-inputs"><input type="text" value="{{$val}}"   class="form-control custom-2"  name="inclusions[]" style="display: inline-flex">
                                                                                <a href="#" class="delete_field3"><i class="fas fa-trash"></i></a>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif





                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Main Photo</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input  type="file"
                                                                        class="form-control" name="photo" >
                                                                @error('photo')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="{{$event->photo}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Locations</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" name="locations[]" id="locations" multiple>

                                                                    @foreach($cities as $city)
                                                                        <option @if($overviews && $overviews->locations && in_array($city->id, json_decode($overviews->locations))) selected @endif value="{{$city->id}}" >{{$city->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>website</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="text"
                                                                        class="form-control" name="website" @isset($overviews->website) value="{{$overviews->website}}" @endisset required>
                                                                @error('website')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>phone</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="text"
                                                                        class="form-control" name="phone" @isset($overviews->phone) value="{{$overviews->phone}}" @endisset required>
                                                                @error('phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Email</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="email"
                                                                        class="form-control" name="email" @isset($overviews->email) value="{{$overviews->email}}" @endisset required>
                                                                @error('phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Start Date</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="date"
                                                                        class="form-control" name="start_date" @isset($overviews->start_date) value="{{$overviews->start_date}}" @endisset required>
                                                                @error('start_date')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>End Date</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="date"
                                                                        class="form-control" name="end_date" @isset($overviews->end_date) value="{{$overviews->end_date}}" @endisset required>
                                                                @error('end_date')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Statues</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="statues">

                                                                    <option @if(isset($overviews->statues) && $overviews->statues =='everyday') selected @endif value="everyday">Everyday</option>
                                                                    <option @if(isset($overviews->statues) && $overviews->statues =='monday') selected @endif value="monday">Every Monday</option>
                                                                    <option @if(isset($overviews->statues) && $overviews->statues =='friday') selected @endif value="friday">Every Friday</option>


                                                                </select>
                                                                @error('statues')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Cancellation</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="cancellation">

                                                                    <option @if(isset($overviews->cancellation) && $overviews->cancellation =='free') selected @endif value="free">Free </option>
                                                                    <option @if(isset($overviews->cancellation) && $overviews->cancellation =='pro') selected @endif value="pro">pro rata</option>
                                                                    <option @if(isset($overviews->cancellation) && $overviews->cancellation =='flat') selected @endif value="flat"> flat rate</option>
                                                                    <option @if(isset($overviews->cancellation) && $overviews->cancellation =='short') selected @endif value="short"> short-rate</option>


                                                                </select>
                                                                @error('cancellation')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Meta Title</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field' => 'meta_title',
                                                                    'label' => '',
                                                                    'type' => 'input',
                                                                    'maxlength' => 255,
                                                                    'translations' => $event->translations,
                                                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('meta_title')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Meta Description</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field' => 'meta_description',
                                                                    'label' => '',
                                                                    'type' => 'textarea',
                                                                    'rows' => 5,
                                                                    'translations' => $event->translations,
                                                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                @error('meta_description')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Meta Image</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" class="form-control" name="meta_img"
                                                                       placeholder="Meta Image">
                                                                @error('meta_img')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="{{$event->meta_img}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 offset-md-0">
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
                <!-- // Basic Horizontal form layout section end -->

                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script  src="//maps.google.com/maps/api/js?libraries=places&key=AIzaSyClpYC9kBHWhxuz08xtbt7bEG93n4FzNzk&region=sa&language=ar&sensor=true"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>

    <script>
        $(document).ready(function() {

            $('#locations').select2({
                placeholder: 'choose Locations',
                allowClear: true, // Adds a clear button

            });


        });
    </script>
    <script>
        $(document).ready(function() {
            var max_fields      = 10;
            var wrapper         = $(".container2");
            var add_button      = $(".add_form_field2");

            var x = 1;
            $(add_button).click(function(e){

                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append('<div class="custom-inputs">' +
                        '<input type="text" class="form-control custom-2" name="exclusions[]">' +
                        '<a href="#" class="delete_field2"><i class="fas fa-trash"></i></a></div>'
                    ); //add input box
                }
                else
                {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete_field2", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
        $(document).ready(function() {
            var max_fields      = 10;
            var wrapper         = $(".container3");
            var add_button      = $(".add_form_field3");

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append('<div class="custom-inputs">' +
                        '<input type="text" class="form-control custom-2" name="inclusions[]">' +
                        '<a href="#" class="delete_field3"><i class="fas fa-trash"></i></a></div>'
                    ); //add input box
                }
                else
                {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete_field3", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>


@endsection
