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
                            <h2 class="content-header-title float-left mb-0">Partners</h2>

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
                                              action="{{route('partner.update',$partner->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                           @method("PUT")
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
                                                                    <option value="0" @if($partner->status == 0) selected @endif>Header</option>
                                                                    <option value="1" @if($partner->status == 1) selected @endif>Body</option>



                                                                </select>
                                                                @error('status')
                                                                <span class="text-danger">{{$message}}</span>
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
                                                                  <input  type="text"
                                                                        class="form-control" name="title" id="title" value="{{$partner->title}}">
                                                                 @error('title')
                                                                <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                               </div>
                                                           </div>
                                                  </div>

                                                   <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                            <span>Slug</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="text"
                                                                       class="form-control" name="slug" id="slug" value="{{$partner->slug}}">
                                                               @error('slug')
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
                                                                <textarea name="description" class="form-control" id="description"  cols="20" rows="7" required>{{$partner->description}}</textarea>

                                                                <script>


                                                                    CKEDITOR.replace( 'description' ,{
                                                                        language: '{{CKEDITOR()}}',

                                                                    });

                                                                </script>
                                                                @error('description')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Image</span>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <input type="file" class="form-control mt-2"  name="image" id="image">
                                                                @error('image')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <img src="{{$partner->image_url}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Meta Title</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$partner->meta_title}}" name="meta_title"
                                                                       placeholder="Meta Title">
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
                                                                <textarea name="meta_description" rows="5" class="form-control">{{$partner->meta_description}}</textarea>
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
                                                                <img src="{{$partner->meta_img}}" style="width: 100px; height: 100px;object-fit: contain">
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
                <!-- // Basic Horizontal form layout section end -->

                <!-- // Basic Floating Label Form section end -->

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

    $('#title').on('input', function(){
        let name = $(this).val()
        let slug = name.replaceAll(' ','-')
        $('#slug').val(slug.toLowerCase());
    })
    </script>

@endsection
