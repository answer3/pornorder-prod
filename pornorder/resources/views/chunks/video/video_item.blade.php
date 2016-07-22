<div class="col-lg-3 col-md-3 col-sm-6 video-item">
	<p class="video-title">Video title here</p>
		<div class="video-main" style="background-image: url('http://pics.pornburst.xxx/misc/model2-118.jpg');">
			@if(isset($edit_links) and $edit_links)
				<span class="edit-video"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
				<span class="remove-video"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></span>
				<!--<span class="when-video">1 hour ago </span>-->
			@endif
			
			<span class="when-video">1 hour ago </span>
			@if(isset($when_video) and $when_video)
				<!--<span class="when-video">1 hour ago </span>-->
			@endif
			<!--<span class="duration">07:07</span>	-->	
		</div>
	<p class="video-details">
		<span class="from-site">xHamster</span>
		<span class="video-by-user">by: User 123</span>
		@if(isset($when_video) and $when_video)
			<!--<span class="video-by-user">by: User 123</span>-->
		@else
			<!--<span class="when">2 hours ago</span>-->
		@endif
	</p>
</div>

