@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-9 col-sm-9 col-xs-12">
        @include('elements.order_title',['title'=>'TAG VIDEOS'])
		@include('elements.mobile_video_tabs')
		<div class="videos-list">	
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
	</div>
		@include('elements.mobile_order_panel',['hide'=>true])
		@include('elements.right_order_panel')	
	</div>
<script>	
	$('.mobile-video-tabs .video-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-video-tabs .orders-tab').removeClass('active');
			$('.mobile-order-tabs').hide();
			$('.mobile-order-panel').hide();
			$('.videos-list').show();
		});
		$('.mobile-video-tabs .orders-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-video-tabs .video-tab').removeClass('active');
			$('.mobile-order-tabs').show();
			$('.mobile-order-panel').show();
			$('.videos-list').hide();
		});
</script>
	@endsection



