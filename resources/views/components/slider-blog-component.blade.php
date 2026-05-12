

<div class="hero">
    <div class="container">
        <div class="hero_content">
            <h1 class="txt-shadow">
                {{$slider->title   ?? "Default Title"}}
            </h1>
            <p class="txt-shadow">
                {!! $slider->description   ?? "Default Description"!!}

            </p>
        </div>
    </div>
</div>

<img
    src={{$slider->image_url ?? "./assets/images/blogs-bg.jpeg"  }}
    class="page-header__bg"
    alt=""
/>
