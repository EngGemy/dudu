
@foreach($destinations as $destination)
<a href="{{route('blog_preview', $destination->slug)}}" class="card">
    <figure>
        <img src="{{ $destination->image_url }}" alt="city" />
    </figure>

    <figcaption>
        <h3>{{$destination->title  }}</h3>
    </figcaption>
</a>
@endforeach
