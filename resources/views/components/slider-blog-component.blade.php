

<div class="hero">
    <div class="container">
        <div class="hero_content">
            <h1 class="txt-shadow">
                {{ $slider->title ?? __('front.site.blog.hero_title') }}
            </h1>
            <p class="txt-shadow">
                {!! $slider->description ?? __('front.site.blog.hero_description') !!}

            </p>
        </div>
    </div>
</div>

<img
    src={{$slider->image_url ?? "./assets/images/blogs-bg.jpeg"  }}
    class="page-header__bg"
    alt=""
/>
