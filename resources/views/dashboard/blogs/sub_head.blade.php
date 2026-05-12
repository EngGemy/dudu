
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
                                                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Sub Head</button>
                                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="card-content">
                                                                        <div class="card-body">

                                                                            <form class="form form-vertical" action="{{route('blog.sub_head.store')}}" method="post" enctype="multipart/form-data">

                                                                                @csrf
                                                                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                                                                <div class="form-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">Sub Head</label>
                                                                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                                                                                @error('name')
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
                                                                <h4 class="card-title">Sub Head</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        @isset($blog_sub_head)
                                                                            <div id="accordion-payment" class="accordion">
                                                                                @error('name')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror

                                                                                @foreach($blog_sub_head as $sub_head)
                                                                                    <div class="card " style="padding:initial" >
                                                                                        <div class="card-header" id="quest{{$sub_head->id}}" style="margin-bottom: 20px;margin-left: 50px ">
                                                                                            <h5 class="mb-0">
                                                                                                <button class="btn btn-link" type="button"  data-toggle="collapse" data-target="#quest_content{{$sub_head->id}}" aria-expanded="false" >
                                                                                                    <span style="font-weight: 400; font-size: 1.2rem;color: black" > {{implode(' ', array_slice(str_word_count(strip_tags($sub_head->name), 1), 0, 10))}} </span>
{{--                                                                                                    {!! implode(' ', array_slice(str_word_count(strip_tags($blog->description), 1), 0, 20)) !!}--}}
                                                                                                    <i style="font-size: 19px" class="fas fa-arrow-alt-circle-down"></i>

                                                                                                </button>
                                                                                            </h5>
                                                                                            <a style="width:25px " class="btn btn-danger btn-icon btn-circle btn-sm" href="{{route('blog.sub_head.delete', $sub_head->id)}}" onclick="return confirm('Are you sure you want to delete?');" title="Delete') ">
                                                                                                <i style="font-size: 11px"  class="fas fa-trash"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div id="quest_content{{$sub_head->id}}" class="collapse"  data-parent="#accordion-payment"  >
                                                                                            <div class="card-body">
                                                                                                <form class="form form-vertical" action="{{route('blog.sub_head.update',$sub_head->id)}}" method="post" enctype="multipart/form-data">

                                                                                                    @csrf
                                                                                                    <div class="form-group">
                                                                                                        <label for="question{{$sub_head->id}}">Sub Head</label>
                                                                                                        <input type="text" name="name" id="question{{$sub_head->id}}" value="{{$sub_head->name}}"   class="form-control">

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

