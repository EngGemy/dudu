@extends('dashboard.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/dropzone/dist/min/dropzone.min.css') }}">
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
                            <h2 class="content-header-title float-left mb-0">Add Post</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="advanced-layouts">
                    <div class="row match-height">
                        <!-- Post Details -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Post Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-title">Title</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="post-title" class="form-control" placeholder="Enter post title" name="title" value="Sample Post Title">
                                                        @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-content">Content</label>
                                                    <div class="col-md-10">
                                                        <textarea id="post-content" rows="10" class="form-control summernote" name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</textarea>
                                                        @error('content')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- SEO Section -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-meta-title">Meta Title</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="post-meta-title" class="form-control" placeholder="Enter meta title" name="meta_title" value="Sample Meta Title">
{{--                                                        @error('meta_title')--}}
{{--                                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                                        @enderror--}}
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-meta-description">Meta Description</label>
                                                    <div class="col-md-10">
                                                        <textarea id="post-meta-description" rows="3" class="form-control" name="meta_description" placeholder="Enter meta description">Sample meta description for the post.</textarea>
                                                        @error('meta_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-meta-keywords">Meta Keywords</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="post-meta-keywords" class="form-control" placeholder="Enter meta keywords" name="meta_keywords" value="sample, post, keywords">
                                                        @error('meta_keywords')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Media Section -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-featured-image">Featured Image</label>
                                                    <div class="col-md-10">
                                                        <div class="upload-zone">
                                                            <div class="dz-message" data-dz-message>
                                                                <span class="dz-message-text">Drag and drop a file here or click</span>
                                                                <span class="dz-message-or">or</span>
                                                                <button class="btn btn-primary">SELECT</button>
                                                            </div>
                                                        </div>
                                                        @error('featured_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-gallery">Gallery</label>
                                                    <div class="col-md-10">
                                                        <input type="file" id="post-gallery" class="form-control" name="gallery[]" multiple>
                                                        @error('gallery')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Video Section -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-video">Video URL</label>
                                                    <div class="col-md-10">
                                                        <input type="url" id="post-video" class="form-control" placeholder="Enter video URL" name="video_url" value="https://www.youtube.com/watch?v=example">
                                                        @error('video_url')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Tags and Categories -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-tags">Tags</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="post-tags" class="form-control" placeholder="Enter tags" name="tags" value="sample, blog, post">
                                                        @error('tags')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label">Categories</label>
                                                    <div class="col-md-10">
                                                        <select class="form-select js-select2" name="categories[]" multiple="multiple" data-placeholder="Select Categories">
                                                            <option value="uncategorized">Uncategorized</option>
                                                            <option value="covid">Covid</option>
                                                            <option value="seo">SEO</option>
                                                            <option value="website">Website</option>
                                                        </select>
                                                        @error('categories')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Post Date and Status -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-date">Date</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="post-date" class="form-control date-picker" name="date" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="14-05-2024">
                                                        @error('date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label" for="post-status">Status</label>
                                                    <div class="col-md-10">
                                                        <select id="post-status" class="form-select js-select2" name="status" data-placeholder="Select Status">
                                                            <option value="published" selected>Published</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="draft">Draft</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Miscellaneous -->
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label">Allow Comments</label>
                                                    <div class="col-md-10">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="allow-comments" name="allow_comments" checked>
                                                            <label class="form-check-label" for="allow-comments"></label>
                                                        </div>
                                                        @error('allow_comments')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <label class="col-md-2 col-form-label">Allow Pings</label>
                                                    <div class="col-md-10">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="allow-pings" name="allow_pings" checked>
                                                            <label class="form-check-label" for="allow-pings"></label>
                                                        </div>
                                                        @error('allow_pings')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Submit -->
                                                <div class="row mb-1">
                                                    <div class="col-md-10 offset-md-2">
                                                        <button type="submit" class="btn btn-primary">Publish Post</button>
                                                        <a href="#" class="btn btn-outline-secondary">Save to Draft</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEO and Settings -->
                        <div class="col-md-4">
                            <!-- SEO Settings -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">SEO Settings</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="mb-1">
                                                <label class="form-label" for="seo-title">SEO Title</label>
                                                <input type="text" id="seo-title" class="form-control" placeholder="Enter SEO title" name="seo_title" value="Sample SEO Title">
                                                @error('seo_title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="seo-description">SEO Description</label>
                                                <textarea id="seo-description" rows="3" class="form-control" name="seo_description" placeholder="Enter SEO description">Sample SEO description for the post.</textarea>
                                                @error('seo_description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="seo-keywords">SEO Keywords</label>
                                                <input type="text" id="seo-keywords" class="form-control" placeholder="Enter SEO keywords" name="seo_keywords" value="sample, seo, keywords">
                                                @error('seo_keywords')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary me-1">Save SEO Settings</button>
                                                <a href="#" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Publish Settings -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Publish Settings</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="mb-1">
                                                <label class="form-label" for="post-status">Status</label>
                                                <select id="post-status" class="form-select js-select2" name="status" data-placeholder="Select Status">
                                                    <option value="published" selected>Published</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="draft">Draft</option>
                                                </select>
                                                @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="post-visibility">Visibility</label>
                                                <select id="post-visibility" class="form-select js-select2" name="visibility" data-placeholder="Select Visibility">
                                                    <option value="public" selected>Public</option>
                                                    <option value="private">Private</option>
                                                    <option value="password-protected">Password Protected</option>
                                                </select>
                                                @error('visibility')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary me-1">Save Publish Settings</button>
                                                <a href="#" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Miscellaneous Settings -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Miscellaneous Settings</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="mb-1">
                                                <label class="form-label" for="post-format">Post Format</label>
                                                <select id="post-format" class="form-select js-select2" name="post_format" data-placeholder="Select Post Format">
                                                    <option value="standard" selected>Standard</option>
                                                    <option value="video">Video</option>
                                                    <option value="gallery">Gallery</option>
                                                    <option value="audio">Audio</option>
                                                </select>
                                                @error('post_format')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="post-template">Post Template</label>
                                                <select id="post-template" class="form-select js-select2" name="post_template" data-placeholder="Select Post Template">
                                                    <option value="default" selected>Default</option>
                                                    <option value="full-width">Full Width</option>
                                                    <option value="sidebar-left">Sidebar Left</option>
                                                    <option value="sidebar-right">Sidebar Right</option>
                                                </select>
                                                @error('post_template')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary me-1">Save Miscellaneous Settings</button>
                                                <a href="#" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </form>
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

@section('scripts')
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('node_modules/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('node_modules/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-select2').select2({
                placeholder: 'Select an option',
                allowClear: true
            });
            $('.summernote').summernote({
                height: 200
            });
            $('.date-picker').datepicker({
                format: 'dd-mm-yyyy'
            });
        });
    </script>
@endsection
