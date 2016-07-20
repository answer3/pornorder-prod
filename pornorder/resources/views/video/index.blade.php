@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-9 col-sm-9 col-xs-12">
        @include('elements.order_title',['title'=>'TAG VIDEOS'])

        <div class="row order-row-container">
			@include('chunks.video.video_item',['when_video'=>true])
			@for ($i = 0; $i < 3; $i++)
				@include('chunks.video.video_item')
			@endfor
			
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.video.video_item')
			@endfor
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.video.video_item')
			@endfor
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.video.video_item')
			@endfor
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.video.video_item')
			@endfor
        </div>
		
		@include('elements.pagination')
	</div>
		@include('elements.right_order_panel')	
	</div>
	@endsection



