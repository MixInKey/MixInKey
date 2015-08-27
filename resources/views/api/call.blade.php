@extends('layouts.master')

@section('content')
@foreach($response['results'] as $result)
<div class="text-center">
		<div class="col-md-6">
				<img class="thumbnail" src="{{ $result['images']['large']['url'] }}">
				<p>
					{{ $result['id'] }} {{ $result['name'] }}
				</p>
		</div>
</div>
@endforeach
<iframe src='http://embed.beatport.com/player/?id=5500589&type=track' width='100%' height='166' scrolling='no' frameborder='0'></iframe>
@stop
