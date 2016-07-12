@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-10 col-sm-10 col-xs-12">
        @include('elements.section_header',['title'=>'Trending orders','hide_icon'=>true])

        <div class="row order-row-container">
			@for ($i = 0; $i < 3; $i++)
				@include('chunks.order.order_item')
			@endfor
			
			@include('chunks.order.create_order')
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.order.order_item')
			@endfor
        </div>
		
		<div class="row order-row-container">
			@for ($i = 0; $i < 4; $i++)
				@include('chunks.order.order_item')
			@endfor
        </div>
		
				        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination-block pagination">
                    <li>
                        <a class="prev" href="#">Prev</a>
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
                        <a href="#">...</a>
                    </li>
                    <li>
                        <a href="#">10</a>
                    </li>
                    <li>
                        <a class="next" href="#">Next</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        @include('elements.section_header',['title'=>'Most popular orders'])

        <div class="row order-row-container">
            @for ($i = 0; $i < 4; $i++)
				@include('chunks.order.order_item')
			@endfor
        </div>
		
		@include('elements.section_header',['title'=>'New orders'])

        <!-- Projects Row -->
        <div class="row order-row-container">
            @for ($i = 0; $i < 3; $i++)
				@include('chunks.order.order_item')
			@endfor
			
            @include('chunks.order.order_item',['show_tags'=>true])
        </div>

	</div>
		@include('elements.right_panel')	
	</div>
	@endsection

