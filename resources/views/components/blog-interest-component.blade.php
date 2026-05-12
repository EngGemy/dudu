

@foreach($interests as $interest)
<a href="{{route('blog_preview', $interest->slug)}}" class="card">
    <figure>
        <img src="{{ $interest->image_url }}" alt="interest" />
    </figure>

    <figcaption>
        <h3>{{$interest->title}}</h3>
    </figcaption>
</a>
@endforeach
