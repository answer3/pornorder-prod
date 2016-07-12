
@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-10 col-sm-10 col-xs-12">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="container-header">TRENDING ORDERS   
					<span class="glyphicon glyphicon-list list-header-icon" aria-hidden="true"></span>
					<!--<a class="more-trendings" href="#">view more trending orders <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>-->
                </h2>
            </div>
        </div>

        <!-- Projects Row -->
        <div class="row order-row-container">
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
					<div class="main-thumb-descr top-title"><p>Order description on top</p></div>
					<div class="main-thumb-descr bottom-title"><p>Some additional bottom description for the order</p></div>
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
			
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
					<div class="main-thumb-descr top-title"><p>Order description on top</p></div>
					<div class="main-thumb-descr bottom-title" ><p>Some additional bottom description for the order</p></div>
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
			
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
					<div class="main-thumb-descr top-title"><p>Order description on top</p></div>
					<div class="main-thumb-descr bottom-title" ><p>Some additional bottom description for the order</p></div>
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
			
			<div class="col-lg-3 col-md-3 col-sm-6 create-order">
				<div class="create-order-inner inner-1"><p>Sick and tired of searching videos you need on the web?</p></div>
				<div class="create-order-inner inner-2"><h2>CREATE AN ORDER</h2></div>
				<div class="create-order-inner inner-3"><p>Our community will continuously<br> collect vids you requested</p></div>
				<div class="create-order-inner inner-4"><p>delivery guaranteed</p></div>
			</div>
        </div>
        <!-- /.row -->

		<div class="row order-row-container">
            <div class="col-lg-12">
                <h2 class="container-header">MOST POPULAR ORDERS   
					<span class="glyphicon glyphicon-list list-header-icon" aria-hidden="true"></span>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
        </div>
        <!-- /.row -->
		
		<div class="row">
            <div class="col-lg-12">
                <h2 class="container-header">NEW ORDERS   
					<span class="glyphicon glyphicon-list list-header-icon" aria-hidden="true"></span>
                </h2>
            </div>
        </div>

        <!-- Projects Row -->
        <div class="row order-row-container">
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="small-thumb-container">
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></p>
							<p class="count">55</p>
						</div>
					</div>
					<div class="order-thumb small-thumb" style="background-image:url('http://uk.fhm.com/media/2015/09/kelly-3.jpg');">
						<div class="small-thumb-info">
							<p><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></p>
							<p class="count">10</p>	
						</div>
					</div>
				</div>		
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 order-item">
				<div class="order-thumb main-thumb" style="background-image: url('http://cdn.europosters.eu/image/750/posters/football-girls-i12197.jpg');">
				</div>
				<div class="order-counter">
					<span class="counter-likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 314</span>
					<span class="counter-suggests"><span class="glyphicon glyphicon-plus little-plus" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 30</span>
					<span class="counter-comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 27</span>
				</div>
				<div class="order-tag-container">
					<div class="order-tag-list">
						<span>tag1</span>
						<span>verylongname tag</span>
						<span>tag three</span>
						<span>more tag</span>
					</div>	
				</div>		
            </div>
        </div>

        <!-- Pagination -->
        <!--<div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>-->
        <!-- /.row -->
	</div>
	<div class="col-lg-2 col-sm-2 sidebar users-right-panel">
		<div class="top-users-category contributors">
			<p class="users-cat-title">TOP CONTRIBUTORS</p>
			<ul class="users-cat-list">
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1 bla bla</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 2</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 3</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 4</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 5</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 6</p></div>	
					</div>	
				</li>
			</ul>
		</div>
		<div class="top-users-category commentors">
			<p class="users-cat-title">TOP COMMENTORS</p>
			<ul class="users-cat-list">
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1 bla bla</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 5</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 6</p></div>	
					</div>	
				</li>
			</ul>
		</div>	
		<div class="top-users-category requestors">
			<p class="users-cat-title">TOP REQUESTORS</p>
			<ul class="users-cat-list">
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1 bla bla</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 1</p></div>	
					</div>
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 5</p></div>	
					</div>	
				</li>
				<li>
					<div class="avatar-container">
						<a href="#" class="avatar">
							<img src="http://www.speakers.com/media/2452/images/wozniak-steve--new.jpg" alt="user">
						</a>
						<div class="username-container"><p>Steve 6</p></div>	
					</div>	
				</li>
			</ul>
		</div>	
	</div>	
	</div>
	@endsection