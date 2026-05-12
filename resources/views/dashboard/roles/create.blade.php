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
                            <h2 class="content-header-title float-left mb-0">Roles</h2>

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
                                              action="{{route('roles.store')}}"
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
                                                                       class="form-control" name="name" value="{{old('name')}}">
                                                                @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input style="margin-top: 15px;margin-bottom:10px;margin-left:15px;border-style: none;border-radius: 10px;width: 115px;height: 33px"  type="button" onclick='selects()' value="Select All"/>
                                                    <input style="margin-top: 15px;margin-bottom:10px;border-style: none;border-radius: 10px;width: 115px;height: 33px;background-color: lightcoral" type="button" onclick='deSelect()' value=" UnSelect All"/>
                                                        <?php $j=0?>
                                                    @foreach (config('global_dash.permissions') as $name => $value)
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header border-bottom mx-2 px-0">
                                                                <h6 class="border-bottom py-1 mb-0 font-medium-2">{{$name}}
                                                                </h6>
                                                            </div>
                                                            <div class="card-body px-75">
                                                                <div class="table-responsive users-view-permission">
                                                                    <table class="table table-borderless">

                                                                        <tbody>

                                                                        <tr>
                                                                            @if(is_array($value))
                                                                                    <?php $i=0?>
                                                                                @foreach ($value as $name => $value)
                                                                            <td>
                                                                                <div class="custom-control custom-checkbox ml-30"><input type="checkbox" id="users-checkbox5{{$i}}{{$j}}" class="custom-control-input" name="permissions[]" value="{{ $name }}">  <label class="custom-control-label" for="users-checkbox5{{$i}}{{$j}}">{{$value}}</label>
                                                                                </div>
                                                                            </td>
                                                                                        <?php $i++ ?>
                                                                                @endforeach
                                                                            @endif

                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            <?php $j++ ?>
                                                    @endforeach
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
