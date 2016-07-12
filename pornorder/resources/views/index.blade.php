@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-10 col-sm-10 col-xs-12">
        @include('elements.section_header',['title'=>'Trending orders'])

        <!-- Projects Row -->
        <div class="row order-row-container">
			@for ($i = 0; $i < 3; $i++)
				@include('chunks.order.order_item')
			@endfor
			
			@include('chunks.order.create_order')
        </div>
        <!-- /.row -->

        @include('elements.section_header',['title'=>'Most popular orders'])

        <div class="row order-row-container">
            @for ($i = 0; $i < 4; $i++)
				@include('chunks.order.order_item')
			@endfor
        </div>
        <!-- /.row -->
		
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