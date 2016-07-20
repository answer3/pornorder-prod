<div class="col-lg-3 col-sm-3 col-md-3 sidebar order-right-panel">
		<div class="top-orders-category">
			<p class="order-cat-title">RELATED TRENDING ORDERS</p>
			
			@for ($i = 0; $i < 3; $i++)
				<div class="col-lg-12 col-md-12 col-sm-12 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
					<div class="contents">
						<div class="main-thumb-descr top-title"><p>Order description on top</p></div>
						<div class="main-thumb-descr bottom-title"><p>Some additional bottom description for the order</p></div>
					</div>
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				@if (isset($show_tags) and $show_tags)
					@include('chunks.order.order_bottom_tags')
				@else
					@include('chunks.order.order_bottom_thumbs')
				@endif		
            </div>
			@endfor
		</div>
		<div class="top-orders-category">
			<p class="order-cat-title">RELATED NEW ORDERS</p>
			
			@for ($i = 0; $i < 3; $i++)
				<div class="col-lg-12 col-md-12 col-sm-12 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
					<div class="contents">
						<div class="main-thumb-descr top-title"><p>Order description on top</p></div>
						<div class="main-thumb-descr bottom-title"><p>Some additional bottom description for the order</p></div>
					</div>
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				@if (isset($show_tags) and $show_tags)
					@include('chunks.order.order_bottom_tags')
				@else
					@include('chunks.order.order_bottom_thumbs')
				@endif		
            </div>
			@endfor
		</div>
	</div>
<script>
	$(document).ready(function(){
		var panelHeight = $('.order-right-panel').height();
		var orderItemHeight = $('.order-right-panel .order-item').height();
		
		var ratio = panelHeight/orderItemHeight;
		var elementsInCat = Math.floor((ratio-2)/2);
		
		$('.top-orders-category').each(function(){
			var index = 1;
			$(this).find('.order-item').each(function(){
				if(index>elementsInCat){
					$(this).hide();
				}
				index++;
			});
		});
	});
</script>	

