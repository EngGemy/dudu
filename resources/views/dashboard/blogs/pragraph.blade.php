
                            @extends('dashboard.layouts.app')
                            @section('style')
                                <style>
                                    .ddddd:hover {
                                        /* Styles for the hover state */
                                        background-color: darkgrey;

                                    }
                                </style>
                            @endsection
                            @section('content')
                                <div class="app-content content">
                                    <div class="content-overlay"></div>
                                    <div class="header-navbar-shadow"></div>
                                    <div class="content-wrapper">
                                        <div class="content-header row">
                                            <div class="content-header-left col-md-9 col-12 mb-2">
                                                <div class="row breadcrumbs-top">

                                                </div>
                                            </div>
                                            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                                                <div class="form-group breadcrum-right">
                                                    <div class="dropdown">
                                                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Blog Pragraph</button>
                                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="card-content">
                                                                        <div class="card-body">

                                                                            <form class="form form-vertical" action="{{route('blog.pragraph.store')}}" method="post" enctype="multipart/form-data">

                                                                                @csrf
                                                                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                                                                <div class="form-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">Title</label>
                                                                                                <input type="text" class="form-control" name="title" id="account-name" placeholder="" required>
                                                                                                @error('title')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">photo</label>
                                                                                                <input type="file" class="form-control" name="image" id="account-name" placeholder="" required>
                                                                                                @error('image')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>

                                                                                        </div>


                                                                                        <div class="col-12">
                                                                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Add</button>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="content-body">

                                            <section id="basic-datatable">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Blog Pragraph</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        @isset($pragraphs)
                                                                            <div id="accordion-payment" class="accordion">
                                                                                @error('title')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @error('image')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @foreach($pragraphs as $pragraph)
                                                                                    <div class="card " style="padding:initial" >
                                                                                        <div class="card-header" id="quest{{$pragraph->id}}" style="margin-bottom: 20px;margin-left: 50px ">
                                                                                            <h5 class="mb-0">
                                                                                                <button class="btn btn-link ddddd" type="button"  data-toggle="collapse" data-target="#quest_content{{$pragraph->id}}" aria-expanded="false" >
                                                                                                    <span style="font-weight: 400; font-size: 1.2rem;color: black" > {{$pragraph->title}} </span>
                                                                                                    <i style="font-size: 19px" class="fas fa-arrow-alt-circle-down"></i>

                                                                                                </button>
                                                                                            </h5>
                                                                                            <div>
                                                                                                <a style="width:35px ;height:35px; display: inline-block;" class="btn btn-success btn-icon btn-circle btn-sm" href="{{ route('blog.pragraph.details.create', $pragraph->id) }}" title="Add Details">
                                                                                                    <i style="font-size: 20px;" class="fas fa-plus"></i>
                                                                                                </a>
                                                                                                <a style="width:35px ;height:35px; display: inline-block;" class="btn btn-primary btn-icon btn-circle btn-sm" href="{{ route('blog.pragraph.details.show', $pragraph->id) }}" title="Show Details">
                                                                                                    <i style="font-size: 20px;" class="fas fa-eye"></i>
                                                                                                </a>
                                                                                                <a style="width: 35px; height:35px; display: inline-block;" class="btn btn-danger btn-icon btn-circle btn-sm" href="{{ route('blog.pragraph.delete', $pragraph->id) }}" onclick="return confirm('Are you sure you want to delete?');" title="Delete">
                                                                                                    <i style="font-size: 20px;" class="fas fa-trash"></i>
                                                                                              </a>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div id="quest_content{{$pragraph->id}}" class="collapse"  data-parent="#accordion-payment"  >
                                                                                            <div class="card-body">
                                                                                                <form class="form form-vertical" action="{{route('blog.pragraph.update',$pragraph->id)}}" method="post" enctype="multipart/form-data">

                                                                                                    @csrf
                                                                                                    <div class="form-group">
                                                                                                        <label for="question{{$pragraph->id}}">username</label>
                                                                                                        <input type="text" name="title" id="question{{$pragraph->id}}" value="{{$pragraph->title}}"   class="form-control">

                                                                                                    </div>


                                                                                                    <div class="form-group">
                                                                                                        <label for="photo{{$pragraph->id}}">photo</label>
                                                                                                        <input type="file" name="image" id="photo{{$pragraph->id}}"   class="form-control">
                                                                                                        <img style="width: 100px;height: 100px;object-fit: contain" src="{{$pragraph->image_url}}">
                                                                                                    </div>
                                                                                                    <div class="col-12" style="text-align: center;padding: 20px" >
                                                                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Edit</button>

                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endisset
                                                                    </div>
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

