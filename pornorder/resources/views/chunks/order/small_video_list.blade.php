<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 small-list-container" style="padding: 0">
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
		
@include('elements.pagination')
</div>		

