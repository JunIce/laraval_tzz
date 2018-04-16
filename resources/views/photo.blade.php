@extends('app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-6 bg-white border rounded photo-box">
            <a class="btn btn-favor" href="#" role="button">
                <span class="oi oi-heart oi-heart-size" title="icon name"></span>
                <span class="do-fava-title">收藏</span>
                <span>{{ $photo->favanum }}</span>
            </a>
            <div class="p-mr-20">
                 <img src="{{ $photo->photoimg }}" alt="{{ $photo->title }}" width="100%">
            </div>
            <p class="p-title p-mr-20">
                {{ $photo->title }}
            </p>
            <div>
                @foreach($photo_tags as $tag)
                    <a href="/label/{{ $tag['tagid'] }}" class="btn btn-sm btn-outline-dark p-info-tag">
                        {{ $tag['tagname'] }}
                    </a>
                @endforeach
            </div>
        </div>
	</div>
</div>
@endsection