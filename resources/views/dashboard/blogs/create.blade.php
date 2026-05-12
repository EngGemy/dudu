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
                            <h2 class="content-header-title float-left mb-0">Blogs</h2>

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
                                              action="{{route('blogs.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'title',
                                                            'label' => 'Title',
                                                            'type' => 'input',
                                                            'required' => true,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'slug',
                                                            'label' => 'Slug',
                                                            'type' => 'input',
                                                            'placeholder' => 'URL slug',
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label for="tours" class="col-md-4 col-form-label">Tours</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="tours[]" id="tours" multiple>
                                                                    @foreach($tours as $tour)
                                                                        <option value="{{$tour->id}}" @if(is_array(old('tours')) && in_array($tour->id, old('tours'))) selected @endif>{{get_lang($tour,'name')}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label for="tags" class="col-md-4 col-form-label">Tags</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="tags[]" id="tags" multiple>
                                                                    @foreach($tags as $tag)
                                                                        <option value="{{$tag->id}}" @if(is_array(old('tags')) && in_array($tour->id, old('tags'))) selected @endif>{{get_lang($tag,'name')}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <label for="tours" class="col-md-4 col-form-label">Services</label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="services[]" id="services" multiple>
                                                                    @foreach($services as $service)
                                                                        @php
                                                                            $statusLabel = \App\Enum\TravelServiceStatus::from($service->status)->label();
                                                                        @endphp
                                                                        <option value="{{$service->id}}" @if(is_array(old('services')) && in_array($service->id, old('services'))) selected @endif>{{$statusLabel}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Category</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="category">
                                                                    <option value="" disabled selected>Select category</option>
                                                                    <option value="0">tips</option>
                                                                    <option value="1">destination</option>
                                                                    <option value="2">interest</option>
                                                                    <option value="3">trading</option>


                                                                </select>
                                                                @error('category')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'description',
                                                            'label' => 'Description',
                                                            'type' => 'textarea',
                                                            'rows' => 7,
                                                            'required' => true,
                                                        ])
                                                        <script>
                                                            @foreach(['en', 'zh', 'zh-Hant'] as $locale)
                                                                CKEDITOR.replace('description_{{ $locale }}', {
                                                                    language: '{{ CKEDITOR() }}',
                                                                });
                                                            @endforeach
                                                        </script>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'head',
                                                            'label' => 'Header',
                                                            'type' => 'textarea',
                                                            'rows' => 7,
                                                            'required' => true,
                                                        ])
                                                        <script>
                                                            @foreach(['en', 'zh', 'zh-Hant'] as $locale)
                                                                CKEDITOR.replace('head_{{ $locale }}', {
                                                                    language: '{{ CKEDITOR() }}',
                                                                });
                                                            @endforeach
                                                        </script>
                                                    </div>

{{--                                                    <div class="col-12" style="margin-top: 20px">--}}
{{--                                                        <div class="form-group row">--}}
{{--                                                            <div class="col-md-4">--}}
{{--                                                                <span>Sub Headers</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-8">--}}
{{--                                                                <div class="container1">--}}
{{--                                                                    <div class="custom-inputs">--}}
{{--                                                                        <div style="width: 100%"><input type="text"  @if(old('subheaders')) value="{{old('subheaders')[0]}}" @endif  class="form-control custom-2"  name="subheaders[]" style="display: inline-flex">--}}
{{--                                                                            <button class="add_form_field"><i class="fas fa-plus-circle"></i> </button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    @if(old('subheaders')  and count(old('subheaders')) >1)--}}
{{--                                                                        @for($i=1; $i<count(old('subheaders')); $i++)--}}

{{--                                                                            <div class="custom-inputs"><input type="text" value="{{old('subheaders')[$i]}}"   class="form-control custom-2"  name="subheaders[]" style="display: inline-flex">--}}
{{--                                                                                <a href="#" class="delete_field"><i class="fas fa-trash"></i></a>--}}
{{--                                                                            </div>--}}
{{--                                                                        @endfor--}}
{{--                                                                    @endif--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                                                    <div class="col-12" style="margin-top: 20px">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Sub Headers</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="container1">
                                                                    <div class="custom-inputs" style="display: flex; align-items: center; width: 100%;">
                                                                        <input type="text"
                                                                               @if(old('subheaders')) value="{{old('subheaders')[0]}}" @endif
                                                                               class="form-control custom-2"
                                                                               name="subheaders[]"
                                                                               style="flex-grow: 1; margin-right: 10px;">
                                                                        <button class="add_form_field">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </div>
                                                                    @if(old('subheaders') && count(old('subheaders')) > 1)
                                                                        @for($i=1; $i<count(old('subheaders')); $i++)
                                                                            <div class="custom-inputs" style="display: flex; align-items: center; width: 100%;">
                                                                                <input type="text" value="{{old('subheaders')[$i]}}" class="form-control custom-2" name="subheaders[]" style="flex-grow: 1;">
                                                                                <a href="#" class="delete_field" style="margin-left: 10px;">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </a>
                                                                            </div>
                                                                        @endfor
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'meta_title',
                                                            'label' => 'Meta Title',
                                                            'type' => 'input',
                                                            'placeholder' => 'Meta Title',
                                                        ])
                                                    </div>
                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'meta_description',
                                                            'label' => 'Meta Description',
                                                            'type' => 'textarea',
                                                            'rows' => 5,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Image</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control mt-2"  name="image" id="image">
                                                                @error('image')
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
                                                                    <div class="col-md-8">
                                                                        <input type="file" class="form-control" name="meta_img"
                                                                               placeholder="Meta Image">
                                                                        @error('meta_img')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>
    <script>
        // Add new sub-header input field
        $(document).ready(function() {
            var max_fields = 10; // Maximum number of input fields
            var wrapper = $(".container1");
            var add_button = $(".add_form_field");

            var x = 1; // Initial number of input fields
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++; // Increment the number of input fields
                    $(wrapper).append(
                        '<div class="custom-inputs" style="display: flex; align-items: center; width: 100%;"><input type="text" class="form-control custom-2" name="subheaders[]" style="flex-grow: 1;"><button class="delete_field""><i class="fas fa-trash" style="margin-right: 3px;"></i></button></div>'
                    );
                }
            });

            // Remove sub-header input field
            $(wrapper).on("click", ".delete_field", function(e) {
                e.preventDefault();
                $(this).parent("div").remove();
                x--;
            });
        });
    </script>

    <script type="text/javascript">
        function selects(){
            var ele=document.getElementsByName('permissions[]');
            for(var i=0; i<ele.length; i++){
                if(ele[i].type=='checkbox')
                    ele[i].checked=true;
            }
        }
        function deSelect(){
            var ele=document.getElementsByName('permissions[]');
            for(var i=0; i<ele.length; i++){
                if(ele[i].type=='checkbox')
                    ele[i].checked=false;

            }
        }
    </script>


    <script>
        $('#title_en').on('input', function(){
            let name = $(this).val()
            let slug = name.replaceAll(' ','-').replace(/[^a-zA-Z0-9\-]/g, '').toLowerCase()
            $('#slug_en').val(slug);
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#tours').select2({
                placeholder: 'Choose Tours',
                allowClear: true, // Adds a clear button

            });
        });

        $(document).ready(function() {
            $('#services').select2({
                placeholder: 'Choose Services',
                allowClear: true, // Adds a clear button

            });
        });
        $(document).ready(function() {
            $('#tags').select2({
                placeholder: 'Choose Tags',
                allowClear: true, // Adds a clear button

            });
        });
    </script>


@endsection
