<div class="col-lg-3 col-md-3 col-sm-6 suggest-video">
	<div class="suggest-video-inner inner-1">
		<div class="order-owner">
			<div class="owner-container">
				<a href="#" class="owner-avatar">
					<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
				</a>
				<p class="owner-name">by: User Name</p>
				
			</div>
		</div>
		<div class="text-container">
			<p class="text">
				<span class="dotted-text">Order description it is a long established fact that a reader will be distracted by the 
					redable content of the page when looking at this layout. some other hidden string<span class="readmore"> ...</span>
				</span>
				<span class="original-text" style="display: none;">Order description it is a long established fact that a reader will be distracted by the 
					redable content of the page when looking at this layout. some other hidden string
					fbfkjbnkfdnbk rlmnrknprtpbmr rtnlmrtknkrtn lrtnmrtknklrtlnk  rtnrkrtnrtm rtnlmtrmp
				</span>
			</p>
		</div>
	</div>
	<div class="order-tag-container suggest-tags-container">
		<div class="order-tag-list suggest-tags">
			<span>tag1</span>
			<span>tag 2</span>
			<span>tag three</span>
			<span>tag 4</span>
			<span>tag 555</span>
			<span>tag verylongname</span>
		</div>	
	</div>
	<div class="order-counter">
		<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
		<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
		<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
	</div>
	<div class="suggest-video-inner inner-2">
		<div class="suggest-video-tab" style="float: left;">
			<p>SUGGEST</p>
			<p>a video</p>
		</div>
		<div class="follow-order-tab" style="float: right;">
			<p>FOLLOW</p>
			<p>the order</p>
		</div>
	</div>
</div>


<script>
$(document).ready(function() {	
	$(".inner-1 p.text .dotted-text").dotdotdot({
		ellipsis	: '',
		after: "span.readmore"
	});
});

$("span.readmore").mouseover(function() {
	$(".inner-1 p.text .dotted-text").hide();
	$(".inner-1 p.text .original-text").show();
});

$(".inner-1 .text-container").mouseleave(function(){
	console.log('leave');
	$(".inner-1 p.text .dotted-text").show();
	$(".inner-1 p.text .original-text").hide();
	
});

</script>

