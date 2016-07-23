<div class="row mobile-order-tabs" style="{{ (isset($hide) and $hide)? 'display:none' : '' }}" >
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mobile-order-tab-item related-tab active">
				<h2 class="container-header">
					<span>TRENDING</span>
				</h2>
				</div>
			</div>	
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mobile-order-tab-item new-tab">
				<h2 class="container-header">
					<span>NEW</span>
				</h2>
				</div>	
			</div>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mobile-order-panel" style="{{ (isset($hide) and $hide)? 'display:none' : '' }}">
		<div class="top-orders-category related-orders">
			<p class="order-cat-title">RELATED TRENDING ORDERS</p>
			
			@for ($i = 0; $i < 4; $i++)
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
		<div class="top-orders-category new-orders">
			<p class="order-cat-title">RELATED NEW ORDERS</p>
			
			@for ($i = 0; $i < 4; $i++)
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
$('.mobile-order-tabs .related-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-order-tabs .new-tab').removeClass('active');
			$('.related-orders').show();
			$('.new-orders').hide();
		});
		$('.mobile-order-tabs .new-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-order-tabs .related-tab').removeClass('active');
			$('.related-orders').hide();
			$('.new-orders').show();
		});
</script>