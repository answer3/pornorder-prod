@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-10 col-sm-10 col-xs-12">
        @include('elements.order_title',['title'=>'New order title here'])

        <div class="row order-row-container">
			@include('chunks.video.video_item',['when_video'=>true])
			@for ($i = 0; $i < 2; $i++)
				@include('chunks.video.video_item')
			@endfor
			
			@include('chunks.video.suggest_video')
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
		
		<div class="row">
			@include('chunks.order.order_comments_block')
			@include('chunks.order.suggested_by_system')
		</div>
	</div>
		@include('elements.right_panel')	
	</div>
	@endsection



