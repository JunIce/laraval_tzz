@if ($tags)
    <div class="container tag-box">
        <div class="row ">
            <div class='col-1 text-center'>
                <a href="/" class="btn btn-link btn-primary">推荐</a>
            </div>
            @foreach($tags as $tag)
                <div class='col-1 text-center'>
                    <a href="/label/{{ $tag->tagid}}" class="btn ">{{ $tag->tagname }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endif