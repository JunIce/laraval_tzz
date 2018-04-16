@extends('app')

@section('content')
<div class="container">
	<div id="main_list" class="row">
		@foreach($info as $i)
			<div class="col-3 pd-2">
				<div class="bg-primary">
					<a href="{{ $i->titleurl }}" alt="{{ $i->title }}">
						<img src="{{ $i->titlepic }}" alt="{{ $i->title }}" style="width:100%">
					</a>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection
