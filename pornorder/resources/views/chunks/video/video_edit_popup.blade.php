<div class="modal-popup" id="edit-video">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<form id="video-edit">
			<div class="form-group">
				<label for="order-title">Video URL</label>
				<input type="text" class="form-control" id="video-url" placeholder="">
			</div>
			<div class="form-group">
				<label for="order-title">Update video title to fit order better</label>
				<input type="text" class="form-control" id="video-title" placeholder="">
			</div>
			<div class="form-group">
				<label for="order-title">Specify tags</label>
				<input type="text" class="form-control" id="video-tags" placeholder="">
			</div>
			<div class="form-group">
				<label for="order-title">Pick thumbnail</label>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 edit-video-thumbs-continer">
					<div class="video-edit-thumb active" style="background-image: url('http://206.190.129.101/t/32/68/60/9-320x240.jpg')">
					
					</div>
					<div class="video-edit-thumb" style="background-image: url('http://206.190.129.101/t/32/68/60/9-320x240.jpg')">
					
					</div>
				</div>	
			</div>
			<div class="col-sm-2 col-md-2 col-xs-2"></div>
				<div class="col-sm-8 col-md-8 col-xs-8 main-button-col">
					<div class="main-button-container">
						<a class="confirm-link" href="#">CONFIRM</a>
					</div>
				</div>
				<div class="col-sm-2 col-md-2 col-xs-2"></div>
			</div>
		</form>
	</div>	
</div>
<script>
$('#video-tags').tokenfield({
				autocomplete: {
					source: ['blonde','sex','pornstar','amateur'],
					delay: 100
				},
				showAutocompleteOnFocus: true
			});
			
$('.video-edit-thumb').click(function(){
	$('.video-edit-thumb').removeClass('active');
	$(this).addClass('active');
});			
</script>

