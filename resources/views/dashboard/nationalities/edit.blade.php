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
                            <h2 class="content-header-title float-left mb-0">Nationalities</h2>

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
                                              action="{{route('nationalities.update',$nationality->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="text"
                                                                       class="form-control" name="title" value="{{$nationality->title}}">
                                                                @error('title')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
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
@endsection
