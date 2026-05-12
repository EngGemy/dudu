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
                                              action="{{route('tours.update',$tour->id)}}"
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
                                                                    'translations' => $tour->translations,
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
                                                                <span>Publish</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">

                                                                    <input type="checkbox" @if($tour->publish ==1) checked @endif class="custom-control-input" id="customSwitch5" name="publish">
                                                                    <label class="custom-control-label" for="customSwitch5"></label>
                                                                </div>

                                                                @error('publish')
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

                                                                    <input type="checkbox" @if($tour->is_active ==1) checked @endif class="custom-control-input" id="customSwitch4" name="is_active">
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
                                                                    'translations' => $tour->translations,
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
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Tip Info</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                @include('dashboard._partials.locale-tabs', [
                                                                    'field' => 'tip_info',
                                                                    'label' => '',
                                                                    'type' => 'textarea',
                                                                    'rows' => 7,
                                                                    'required' => true,
                                                                    'translations' => $tour->translations,
                                                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                                                ])
                                                                <script>
                                                                    @foreach(['en','zh','zh-Hant'] as $loc)
                                                                    CKEDITOR.replace('tip_info_{{ $loc }}', { language: '{{ CKEDITOR() }}' });
                                                                    @endforeach
                                                                </script>
                                                                @error('tip_info.en')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Price/Offer</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input  type="number"
                                                                        class="form-control"  placeholder="price " name="price" value="{{$tour->price}}">
                                                                @error('price')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input  type="number"
                                                                        class="form-control" placeholder="price Offer" name="price_offer" value="{{$tour->price_offer}}">
                                                                @error('price_offer')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Review</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="number"
                                                                        class="form-control" name="reviews" value="{{$tour->reviews}}">
                                                                @error('reviews')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Rate</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input  type="number"
                                                                        class="form-control" name="rate" value="{{$tour->rate}}">
                                                                @error('rate')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Category</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" id="category" name="categories[]" multiple >
                                                                    <option>choose  Category</option>
                                                                    @foreach($categories as $category)
                                                                        <option @if(in_array($category->id,$tour->categories->pluck('id')->toArray())) selected @endif value="{{$category->id}}" >{{$category->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                        @if($category->childrens)
                                                                            @foreach($category->childrens as $child)
                                                                                <option @if(in_array($child->id,$tour->categories->pluck('id')->toArray())) selected @endif value="{{$child->id}}" > -- {{$child->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Hotel</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" id="hotel" name="hotel_id" >
                                                                    <option>choose  Hotel</option>
                                                                    @foreach($hotels as $hotel)
                                                                        <option @if($tour->hotel_id == $hotel->id) selected @endif value="{{$hotel->id}}" >{{$hotel->translate(app()->getLocale(), true)->name ?? ''}}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Services</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" name="services[]" id="services" multiple>

                                                                    @foreach($services as $service)
                                                                        <option @if($tour->services ) @if(in_array($service->id,$tour->services->pluck('id')->toArray())) selected @endif @endif value="{{$service->id}}" >{{$service->translate(app()->getLocale(), true)->title ?? ''}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Tips Package</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" name="tour_tips[]" id="mySelect" multiple>

                                                                    @foreach($tips as $tip)
                                                                        <option @if($tour->tour_tips and json_decode($tour->tour_tips->values)!=null)@if(in_array($tip->id,json_decode($tour->tour_tips->values))) selected @endif @endif value="{{$tip->id}}" >{{$tip->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Exclusions</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" name="exclusions[]" id="myExclusion" multiple>

                                                                    @foreach($exclusions as $exclusion)
                                                                        <option @if($tour->tour_exclusions and json_decode($tour->tour_exclusions->values) != null) @if(in_array($exclusion->id,json_decode($tour->tour_exclusions->values))) selected @endif @endif value="{{$exclusion->id}}" >{{$exclusion->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Inclusions</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select  class="form-control" name="inclusions[]" id="myInclusion" multiple>

                                                                    @foreach($inclusions as $inclusion)
                                                                        <option @if($tour->tour_inclusions and json_decode($tour->tour_inclusions->values)!=null) @if(in_array($inclusion->id,json_decode($tour->tour_inclusions->values))) selected @endif @endif  value="{{$inclusion->id}}" >{{$inclusion->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Highlights</span>
                                                            </div>
                                                            <div class="col-md-8" style="background-color: #f9f9f9;padding: 15px">

                                                                <div id="listContainer">
                                                                    @if($tour->tour_highlights and count($tour->tour_highlights) >0)
                                                                        @foreach($tour->tour_highlights as $key=>$value)

                                                                            <div class="list">
                                                                                <input type="hidden" name="tour_highlights_id[]" value="{{$value->id}}">
                                                                                <input type="text"  value="{{$value->translate(app()->getLocale(), true)->name ?? ''}}" name="highlight_names[]" class="list-name" placeholder="Enter  name" />
                                                                                <ul class="item-list">
                                                                                    @php
                                                                                        $highlightValues = json_decode($value->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
                                                                                    @endphp
                                                                                    @foreach($highlightValues as $val)
                                                                                    <li>

                                                                                                <input type="text" value="{{$val}}" name="highlight_values[{{$key}}][]" class="item-name" placeholder="Enter  value" />
                                                                                                <button  class="delete-item">Delete</button>



                                                                                    </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                <button  class="add-item">Add Item</button>
                                                                                <button  class="delete-list">Delete List</button>
                                                                            </div>

                                                                        @endforeach
                                                                    @endif
                                                                </div>

                                                                <button id="addList">Add List</button>
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
                                                                        class="form-control" name="start_date" value="{{$overviews->start_date}}" required>
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
                                                                        class="form-control" name="end_date" value="{{$overviews->end_date}}" required>
                                                                @error('end_date')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="margin-top: 20px">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Features</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="container1">

                                                                    <div class="custom-inputs">

                                                                        <div style="width: 100%">
                                                                            <button class="add_form_field"><i class="fas fa-plus-circle"></i> </button>
                                                                        </div>

                                                                    </div>
                                                                    @php
                                                                        $featureValues = json_decode($tour->tour_features->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
                                                                    @endphp
                                                                    @if($tour->tour_features and !empty($featureValues))
                                                                        @foreach($featureValues as $val)

                                                                            <div class="custom-inputs"><input type="text" value="{{$val}}"   class="form-control custom-2"  name="features[]" style="display: inline-flex">
                                                                                <a href="#" class="delete_field"><i class="fas fa-trash"></i></a>
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
                                                                <img src="{{$tour->photo}}" style="width: 100px; height: 100px;object-fit: contain">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Duration</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input  type="number"
                                                                        class="form-control" placeholder="Days" name="days" @isset( $overviews->days) value="{{$overviews->days}}" @endisset  >
                                                                @error('days')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input  type="number"
                                                                        class="form-control" placeholder="Nights" name="nights"  @isset( $overviews->days) value="{{$overviews->nights}}" @endisset>
                                                                @error('nights')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Location From / To</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="location_from">
                                                                    <option>Select City</option>
                                                                    @foreach($cities as $city)
                                                                        <option  @if(isset($overviews->location_from) && $overviews->location_from ==$city->id) selected @endif value="{{$city->id}}"> {{$city->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('location_from')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="location_to">
                                                                    <option>Select City</option>
                                                                    @foreach($cities as $city)
                                                                        <option @if(isset($overviews->location_to) && $overviews->location_to ==$city->id) selected @endif value="{{$city->id}}"> {{$city->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('location_to')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Tour Type</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="tour_type">
                                                                    <option>Select Tour Type</option>
                                                                    @foreach($types as $type)
                                                                        <option @if(isset($overviews->tour_type) && $overviews->tour_type ==$type->id) selected @endif value="{{$type->id}}"> {{$type->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tour_type')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Tour Group Size</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="tour_group">
                                                                    <option>Select Tour Type</option>
                                                                    @foreach($groups as $group)
                                                                        <option  @if(isset($overviews->tour_group) && $overviews->tour_group ==$group->id) selected @endif value="{{$group->id}}"> {{$group->translate(app()->getLocale(), true)->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tour_group')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Availability</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="availability">

                                                                    <option @if(isset($overviews->availability) && $overviews->availability =='everyday') selected @endif value="everyday">Everyday</option>
                                                                    <option @if(isset($overviews->availability) && $overviews->availability =='monday') selected @endif value="monday">Every Monday</option>
                                                                    <option @if(isset($overviews->availability) && $overviews->availability =='friday') selected @endif value="friday">Every Friday</option>
                                                                    <option @if(isset($overviews->availability) && $overviews->availability =='month') selected @endif value="month">Every Month</option>
                                                                    <option @if(isset($overviews->availability) && $overviews->availability =='week') selected @endif value="week">Every Year</option>

                                                                </select>
                                                                @error('availability')
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

                                                                    <option @if(isset($overviews->cancellation)&& $overviews->cancellation =='free') selected @endif value="free">Free </option>
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
                                                                <span>Map</span>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="select-location-span">يمكنك تحريك Pin على الخريطة للعنوان الذي تريدة</span>
                                                                <input type="hidden" readonly="readonly" name="long_address" @if(Session::has('long_address'))value="{{Session::get('long_address')}}" @endif id="lng" class="" />
                                                                <input type="hidden" readonly="readonly" name="lat_address" @if(Session::has('lat_address'))value="{{Session::get('lat_address')}}" @endif id="lat" class="" />

                                                                <div id="map" style="width:100%;margin:15px auto 0px; height:250px;"></div>
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
                                                                    'translations' => $tour->translations,
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
                                                                    'translations' => $tour->translations,
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
                                                                <img src="{{$tour->meta_img}}" style="width: 100px; height: 100px;object-fit: contain">
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

    <script  src="//maps.google.com/maps/api/js?libraries=places&key=AIzaSyCuTilAfnGfkZtIx0T3qf-eOmWZ_N2LpoY&region=sa&language=ar&sensor=true"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#category').select2({
                placeholder: 'choose Tips Package',
                allowClear: true, // Adds a clear button

            });
            $('#mySelect').select2({
                placeholder: 'choose Tips Package',
                allowClear: true, // Adds a clear button

            });
            $('#hotel').select2({
                placeholder: 'choose Hotel',
                allowClear: true, // Adds a clear button

            });
            $('#services').select2({
                placeholder: 'choose services',
                allowClear: true, // Adds a clear button

            });

            $('#myExclusion').select2({
                placeholder: 'choose Exclusions',
                allowClear: true, // Adds a clear button

            });
            $('#myInclusion').select2({
                placeholder: 'choose Inclusions',
                allowClear: true, // Adds a clear button

            });
        });
    </script>
    <script>
        $(document).ready(function (){
            $(document).on('change', '#category', function () {


                let id = $('#category').val();

                $.ajax({
                    type: 'GET',
                    url:'options/' + id ,
                    success: function (data) {
                        // the next thing you want to do\

                        let datas=data.categories;
                        var $options = $('.options_infos');
                        $options.empty();
                        $options.append('<option value=""> choose the SubCategory </option>');
                        datas.forEach(option =>{
                            $options.append('<option value="'+option.id+'" > '+ option.name +'  </option>');
                        })
                    }
                });




            });
        });
    </script>
    <script>
        $(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            function showPosition(position) {
                var lat = position.coords.latitude,
                    lng = position.coords.longitude,
                    latlng = new google.maps.LatLng(lat, lng),
                    image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';


                //zoomControl: true,
                //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,

                var mapOptions = {
                        center: new google.maps.LatLng(lat, lng),
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        panControl: true,
                        panControlOptions: {
                            position: google.maps.ControlPosition.TOP_RIGHT
                        },
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.LARGE,
                            position: google.maps.ControlPosition.TOP_left
                        }
                    },
                    map = new google.maps.Map(document.getElementById('map'), mapOptions),
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        /*icon: image*/
                    });

                var input = document.getElementById('addresspicker_map');
                var autocomplete = new google.maps.places.Autocomplete(input, {
                    types: ["geocode"]
                });

                autocomplete.bindTo('bounds', map);
                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
                    infowindow.close();
                    var place = autocomplete.getPlace();
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }

                    moveMarker(place.name, place.geometry.location);
                    $('#lat').val(place.geometry.location.lat());
                    $('#lng').val(place.geometry.location.lng());
                });
                google.maps.event.addListener(map, 'click', function (event) {
                    $('#lat').val(event.latLng.lat());
                    $('#lng').val(event.latLng.lng());
                    infowindow.close();
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        "latLng": event.latLng
                    }, function (results, status) {
                        console.log(results, status);
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results);
                            var lat = results[0].geometry.location.lat(),
                                lng = results[0].geometry.location.lng(),
                                placeName = results[0].address_components[0].long_name,
                                latlng = new google.maps.LatLng(lat, lng);

                            moveMarker(placeName, latlng);
                            $("#addresspicker_map").val(results[0].formatted_address);
                        }
                    });
                });

                function moveMarker(placeName, latlng) {
                    /*marker.setIcon(image);*/
                    marker.setPosition(latlng);
                    infowindow.setContent(placeName);
                    //infowindow.open(map, marker);
                }
            }
        });
    </script>


@endsection
