
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
                            <div class="btn-back">
                                <a style="float: left" href="{{route('tours.index')}}" class="btn btn-primary  "><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </div>
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
                                              action="{{route('gallary.update')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body ">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input type="hidden" value="{{$id}}" name="tour_id">

                                                        @isset($galleries)
                                                            <div class="form-group">




                                                                <div class="row" >
                                                                    @foreach($galleries as $image)

                                                                        <div class="col-md-2" style="text-align: center">
                                                                            <img style="object-fit: contain;height:130px; width:130px;" src="{{$image->photo}}"><br>
                                                                            <a  href="{{route('gallary.destroy',$image->id)}}" class="btn btn-danger"  onclick="return confirm('do you want to delete this photo?');"> <i class="fas fa-trash"></i>

                                                                            </a>

                                                                        </div>

                                                                    @endforeach
                                                                </div>


                                                            </div>
                                                        @endisset

                                                    </div>

                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="sponsor-info">


                                                        <div class="form-group">

                                                            <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                                <div class="dz-message ">upload
                                                                </div>
                                                            </div>
                                                        </div>


                                                        @error('documentplans')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror


                                                    </div>
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
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{asset('dashboard/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>

    <script>
        var uploadedDocumentMap={}
        Dropzone.options.dpzMultipleFiles= {
            paramName: "dzfile",
            chunking: true, // Enable chunking
            forceChunking: true,
            parallelUploads:1,
            maxThumbnailFilesize:10,
            retryChunks: true,
            parallelChunkUploads:true,
            maxFiles: 5,
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: "Your browser does not support withdrawals",
            dictInvalidFileType: 'This type of file cannot be uploaded',
            dictCancelUpload: "cancel upload",
            dictCancelUploadConfirmation: "Are you sure to cancel?",
            dictRemoveFile: "delete picture",
            dictMaxFilesExceeded: " You cannot upload more than 5",
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"

            },
            url: "{{route('gallary.storegallary')}}",
            success: function (file, response) {
                $('form').append('<input type="hidden" name="documentplans[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name

            },
            removedfile: function (file) {
                file.previewElement.remove();
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            }
            ,
            init: function () {
                @if(isset($event) && $event->document)
                var files =
                    {!! json_encode($event->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="documentplans[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>



@endsection
