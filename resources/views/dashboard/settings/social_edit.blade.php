
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
                            <h2 class="content-header-title float-left mb-0">Social Settings</h2>

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
                                        <form class="form form-vertical" action="{{ route('SocialSettings.update',$setting->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>TikTok</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->tiktok}}" type="text" class="form-control" name="tiktok" placeholder="TikTok URL">
                                                                @error('tiktok')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Douyin (used by TikTok + Douyin icon if TikTok URL is empty)</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->douyin}}" type="text" class="form-control" name="douyin" placeholder="Douyin URL">
                                                                @error('douyin')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Red Book (小红书)</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->redbook}}" type="text" class="form-control" name="redbook" placeholder="Red Book / Xiaohongshu URL">
                                                                @error('redbook')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Wechat</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->wechat}}" type="text" id="wechat" class="form-control" name="wechat" placeholder="WeChat ID or URL">
                                                                @error('wechat')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Line</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->line}}" type="text" id="line" class="form-control" name="line" placeholder="Line ID or URL">
                                                                @error('line')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Twitter</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->twitter}}" type="text" id="first-name-vertical" class="form-control" name="twitter" >
                                                                @error('twitter')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Snap</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->snap}}" type="text" id="first-name-vertical" class="form-control" name="snap" >
                                                                @error('snap')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Instagram</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->instagram}}" type="text" id="first-name-vertical" class="form-control" name="instagram" >
                                                                @error('instagram')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Youtube</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->youtube}}" type="text" id="first-name-vertical" class="form-control" name="youtube" >
                                                                @error('youtube')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            </div>
                                                        </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Google Play</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->google_play}}" type="text" id="first-name-vertical" class="form-control" name="google_play" >
                                                                @error('google_play')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>App Store</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->app_store}}" type="text" id="first-name-vertical" class="form-control" name="app_store" >
                                                                @error('app_store')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                    <span>Telegram</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->telegram}}" type="text" id="first-name-vertical" class="form-control" name="telegram" >
                                                                @error('telegram')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                    <span>Facebook</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input value="{{$setting->facebook}}" type="text" id="first-name-vertical" class="form-control" name="facebook" >
                                                                @error('facebook')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit"
                                                            class="btn btn-primary mr-1 mb-1">save</button>

                                                </div>
                                                </div>


                                        </form>
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


@endsection
