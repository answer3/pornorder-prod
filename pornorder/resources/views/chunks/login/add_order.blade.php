<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 add-order-form-container">	
				<form id="add-order-form">
					<div class="form-group">
						<label for="order-title">Enter order title</label>
						<p class="add-order-descr">Breifly describe videos you need. <span>Example:</span> "Mom fuck lessons", "Male and female mutual masturbation", "Real hommade teen porn"</p>
						<input type="text" class="form-control" id="order-title" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-description">Enter order description</label>
						<p class="add-order-descr">Please explain to community specifically what video you expect to get and which should be executed
						<br>
						<span>Example:</span> "Please advise long videos shot by amateurs with mobile phone at home. 
							Sex should be with nice looking milfs. No professional videos even looking as amateurs are allowed."</p>
						<input type="text" class="form-control" id="order-description" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-tags">Enter tags</label>
						<p class="add-order-descr">Add relevant tags so that users experienced in your niche could find the request and contribute to it.</p>
						<input type="text" class="form-control" id="order-tags" placeholder="">
					</div>
					<div class="form-group">
						<label for="order-video-example">Add video exmaple</label>
						<p class="add-order-descr">Submit at least one video. Video should be example of content you are looking for</p>
						<input type="text" class="form-control video-example" id="order-video-example" placeholder="">
					</div>
					<div class="form-group video-example-dummy" style="display: none; ">
						<p class="add-order-descr">Would you like to add another one?</p>
						<input type="text" class="form-control" placeholder="">
					</div>
					<div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0">
						<div class="col-sm-12" style="padding-left: 0;">
						<div class="main-button-container">
							<a class="save-order-link" href="#"><span class="non-mobile-title">SAVE THE ORDER</span> <span class="mobile-title">SAVE</span></a>
						</div>
						</div>	
					</div>
					<div class="col-sm-6 col-md-6 col-xs-6" style="padding: 0">
						<div class="col-sm-12" style="padding-right: 0;">
						<div class="main-button-container">
							<a class="cancel-order-link" href="#">CANCEL</a>
						</div>
						</div>
					</div>
				</form>	
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


