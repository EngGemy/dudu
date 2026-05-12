
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
                                                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Comment</button>
                                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="card-content">
                                                                        <div class="card-body">

                                                                            <form class="form form-vertical" action="{{route('blog.comments.store')}}" method="post" enctype="multipart/form-data">

                                                                                @csrf
                                                                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                                                                <div class="form-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">username</label>
                                                                                                <input type="text" class="form-control" name="username" id="account-name" placeholder="" required>
                                                                                                @error('username')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">photo</label>
                                                                                                <input type="file" class="form-control" name="photo" id="account-name" placeholder="" required>
                                                                                                @error('photo')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">rate</label>
                                                                                                <input type="number" class="form-control" name="rate" id="account-name" placeholder="" required>
                                                                                                @error('rate')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">date</label>
                                                                                                <input type="date" class="form-control" name="date" id="account-name" placeholder="" required>
                                                                                                @error('date')
                                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                                @enderror

                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="first-name-vertical">comment</label>
                                                                                                <textarea class="form-control"  name="comment" required></textarea>

                                                                                                @error('comment')
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
                                                                <h4 class="card-title">Comments</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        @isset($comments)
                                                                            <div id="accordion-payment" class="accordion">
                                                                                @error('username')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @error('rate')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @error('comment')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @error('date')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @error('photo')
                                                                                <span class=" text-danger">{{$message}}</span>
                                                                                @enderror
                                                                                @foreach($comments as $comment)
                                                                                    <div class="card " style="padding:initial" >
                                                                                        <div class="card-header" id="quest{{$comment->id}}" style="margin-bottom: 20px;margin-left: 50px ">
                                                                                            <h5 class="mb-0">
                                                                                                <button class="btn btn-link ddddd" type="button"  data-toggle="collapse" data-target="#quest_content{{$comment->id}}" aria-expanded="false" >
                                                                                                    <span style="font-weight: 400; font-size: 1.2rem;color: black" > {{$comment->username}} </span>
                                                                                                    <i style="font-size: 19px" class="fas fa-arrow-alt-circle-down"></i>

                                                                                                </button>
                                                                                            </h5>
                                                                                            <a style="width:25px " class="btn btn-danger btn-icon btn-circle btn-sm" href="{{route('blog.comments.delete', $comment->id)}}" onclick="return confirm('Are you sure you want to delete?');" title="Delete') ">
                                                                                                <i style="font-size: 11px"  class="fas fa-trash"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                        <div id="quest_content{{$comment->id}}" class="collapse"  data-parent="#accordion-payment"  >
                                                                                            <div class="card-body">
                                                                                                <form class="form form-vertical" action="{{route('blog.comments.update',$comment->id)}}" method="post" enctype="multipart/form-data">

                                                                                                    @csrf
                                                                                                    <div class="form-group">
                                                                                                        <label for="question{{$comment->id}}">username</label>
                                                                                                        <input type="text" name="username" id="question{{$comment->id}}" value="{{$comment->username}}"   class="form-control">

                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="rate{{$comment->id}}">rate</label>
                                                                                                        <input type="number" name="rate" id="rate{{$comment->id}}" value="{{$comment->rate}}"   class="form-control">

                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="date{{$comment->id}}">date</label>
                                                                                                        <input type="date" name="date" id="date{{$comment->id}}" value="{{$comment->date}}"   class="form-control">

                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="photo{{$comment->id}}">photo</label>
                                                                                                        <input type="file" name="photo" id="photo{{$comment->id}}"   class="form-control">
                                                                                                        <img style="width: 100px;height: 100px;object-fit: contain" src="{{$comment->photo}}">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="answer{{$comment->id}}">comment</label>
                                                                                                        <textarea class="form-control" id="answer{{$comment->comment}}"  name="comment" cols="30" rows="10"> {{$comment->comment}}</textarea>


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

