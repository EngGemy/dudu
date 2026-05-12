@extends('dashboard.layouts.app')

@section('title', $blog->title)

@section('schema')
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $blog->title }}",
    "image": "{{ asset('storage/images/blogs/' . $blog->image) }}",
    "datePublished": "{{ $blog->created_at->toIso8601String() }}",
    "dateModified": "{{ $blog->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Person",
        "name": "{{ $blog->author->name }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('storage/logo.png') }}"
        }
    },
    "description": "{{ $blog->meta_description }}"
}
</script>
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <h2 class="content-header-title">{{ $blog->title }}</h2>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                                        <p>{!! $blog->content !!}</p>
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
