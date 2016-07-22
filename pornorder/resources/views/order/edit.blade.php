@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-9 col-sm-9 col-xs-12">
        @include('elements.order_title',['title'=>'ORDER EDITING - Order title'])

        @include('chunks.order.update_order_form')
		@include('elements.mobile_order_panel')
	</div>
		@include('elements.right_order_panel')
		@include('chunks.video.video_edit_popup')
	</div>
	@endsection



