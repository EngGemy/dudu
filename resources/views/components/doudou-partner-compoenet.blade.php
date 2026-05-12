

@foreach ($partner_gallary as $partner)
    
<div class="swiper-slide w-auto p-2">
    <div class="img-shadow rounded-xl p-3">
      <img
        src="{{$partner->image_url}}"
        class="size-28 object-contain object-center lg:size-40"
        alt=""
      />
    </div>
  </div>

@endforeach
