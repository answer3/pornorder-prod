
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 add-order-form-container">	
				<form id="add-order-form">
					<div class="form-group">
						<label for="order-title">Order title</label>
						<input type="text" class="form-control" id="order-title" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-description">Order description</label>
						<input type="text" class="form-control" id="order-description" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-tags">Enter tags</label>
						<input type="text" class="form-control" id="order-tags" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-video-example">Add video</label>
						<input type="text" class="form-control video-example" id="order-video-example" placeholder="">
					</div>
					<div class="form-group video-example-dummy" style="display: none; ">
						<p class="add-order-descr">Would you like to add another one?</p>
						<input type="text" class="form-control" placeholder="">
					</div>
				</form>	
			</div>
			
		@include('chunks.order.small_video_list')
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 add-order-form-container order-save-buttons-container">		
					<div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0">
						<div class="col-sm-12">
						<div class="main-button-container">
							<a class="save-order-link" href="#"><p><span style="float: left;" class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> SAVE CHANGES</p></a>
						</div>
						</div>	
					</div>
					<div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0">
						<div class="col-sm-12">
						<div class="main-button-container">
							<a class="cancel-order-link" href="#"><p><span style="float: left;" class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> DISCART CHANGES</p></a>
						</div>
						</div>
					</div>
			</div>		
		
<script>
			$('#order-tags').tokenfield({
				autocomplete: {
					source: ['blonde','sex','pornstar','amateur'],
					delay: 100
				},
				showAutocompleteOnFocus: true
			});
			
			$(document).on('blur','input.video-example:last', function(){
				console.log('this');
				if($(this).val().length>0){			
					var elem = $('.video-example-dummy').clone();
					var input = elem.find('input');
					input.addClass('video-example');
					elem.insertBefore('.video-example-dummy').removeClass('video-example-dummy').show();
				}
			});
</script>


