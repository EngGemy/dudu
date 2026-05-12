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
                            <h2 class="content-header-title float-left mb-0">Tours</h2>

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
                                              action="{{route('iteration.update')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="tour_id" value="{{$id}}">

                                            <div class="form-body ">
                                                <div class="row">
                                                    <table id="bigTable" style="margin-bottom: 20px;">
                                                        <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Main Title</th>
                                                            <th>Image</th>
                                                            <th>Description</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if($iterations)
                                                            @foreach($iterations as $key=>$value)
                                                                <tr>
                                                                    <input type="hidden" name="iterations_id[]" value="{{$value->id}}">
                                                                    <td>
                                                                        <input placeholder="day 1" value="{{$value->title}}" class="form-control" type="text"
                                                                               name="big_title[]" required/>
                                                                    </td>
                                                                    <td>
                                                                        <input placeholder="Arrival to Cairo Airport" value="{{$value->content}}" class="form-control"
                                                                               type="text" name="big_content[]" required/>
                                                                    </td>
                                                                    <td>
                                                                        <img style="width: 100px;height: 100px;object-fit: contain" src="{{$value->photo}}">
                                                                        <input class="form-control" type="file" name="big_image[]" />
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control" name="big_description[]">{{$value->description}}</textarea>
                                                                    </td>
                                                                    <td>
                                                                        <table class="small-table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Title</th>
                                                                                <th>Image</th>
                                                                                <th>Description</th>
                                                                                <th></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($value->iteration_attributes as $val)

                                                                                <tr>
                                                                                    <input type="hidden" name="iterations_attributes_id[{{$key}}][]" value="{{$val->id}}">
                                                                                    <td>
                                                                                        <input placeholder="dinner" value="{{$val->title}}" class="form-control"
                                                                                               type="text" name="small_title[{{$key}}][]" required/>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="{{$val->photo}}"
                                                                                             style="width: 100px;height: 100px;object-fit: contain">
                                                                                        <input placeholder="Image" class="form-control" type="file"
                                                                                               name="small_image[{{$key}}][]" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control" name="small_description[{{$key}}][]">{{$val->description}}</textarea>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="remove-row">Remove</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <button class="add-small-row">Add Small Row</button>
                                                                    </td>
                                                                    <td>
                                                                        <button class="remove-row">Remove</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                    <button id="addBigRow">Add Big Row</button>
                                                </div>


                                                <div style="margin-top: 30px" class="col-md-12 offset-md-0">
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
    <script src="{{asset('dashboard/js/iteraion.js')}}"></script>


@endsection
