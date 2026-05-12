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
                            <h2 class="content-header-title float-left mb-0">Services</h2>
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
                                              action="{{route('services.update',$service->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'title',
                                                            'label' => 'Title',
                                                            'type' => 'input',
                                                            'required' => true,
                                                            'translations' => $service->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'slug',
                                                            'label' => 'Slug',
                                                            'type' => 'input',
                                                            'placeholder' => 'URL slug',
                                                            'translations' => $service->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'description',
                                                            'label' => 'Description',
                                                            'type' => 'textarea',
                                                            'rows' => 7,
                                                            'required' => true,
                                                            'translations' => $service->translations,
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
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Icon</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file"
                                                                       class="form-control" name="icon" >
                                                                @error('icon')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="{{$service->icon_url}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'meta_title',
                                                            'label' => 'Meta Title',
                                                            'type' => 'input',
                                                            'placeholder' => 'Meta Title',
                                                            'translations' => $service->translations,
                                                        ])
                                                    </div>

                                                    <div class="col-12">
                                                        @include('dashboard._partials.locale-tabs', [
                                                            'field' => 'meta_description',
                                                            'label' => 'Meta Description',
                                                            'type' => 'textarea',
                                                            'rows' => 5,
                                                            'translations' => $service->translations,
                                                        ])
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
                                                                <img src="{{$service->meta_img}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 offset-md-0">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">update</button>
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
@endsection
