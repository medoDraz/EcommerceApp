@extends('layouts.app')
@section('title')
    <title>Colo Shop | cart</title>
@endsection

@section('style')
<style>
	.quantity_selector
	{
		background: #f8fafc;
		border-radius: 5px;
		padding-bottom: 10px;
		margin: 0;
		width: 95px;
	}
	.plus
	{
		margin-right: 8px;
	}
	#quantity_value
	{
		text-align: center;
	}
</style>
@endsection

@section('content')
	<div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active" style="color: #b5aec4;"><i class="fa fa-angle-right" aria-hidden="true"></i>
							cart's
                        </li>
                    </ul>
                </div>
				@if($orders != null)
						<!-- Cart -->

						<div class="cart_section">
							<div class="container">
								<div class="row">
									<div class="col-lg-10 offset-lg-1" style="margin-left: 5.333333%;">
										<div class="cart_container">
											<div class="cart_title">Shopping Cart</div>
											@foreach($orders as $order)
												@foreach($order->products as $pro)
													<div class="cart_items">
														<ul class="cart_list">
															<li class="cart_item clearfix">
																<div class="cart_item_image"><img src="{{$pro->image_path}}" alt=""></div>
																<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
																	<div class="cart_item_name cart_info_col">
																		<div class="cart_item_title">Name</div>
																		<div class="cart_item_text">{{$pro->name}}</div>
																	</div>
																	<div class="cart_item_color cart_info_col">
																		<div class="cart_item_title">Color</div>
																		<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
																	</div>
																	<div class="cart_item_quantity cart_info_col">
																		<div class="cart_item_title">Quantity</div>
																		<div class="cart_item_text">
																			<div class="quantity_selector">
																				<span class="minus" data-order_id="{{$order->id}}" data-product_amount="{{$pro->amount}}"><i class="fa fa-minus" aria-hidden="true"></i></span>
																				<span id="amount" style="display : none" >{{$pro->amount}}</span>
																				<span id="quantity_value_{{$order->id}}">{{$order->amount}}</span>
																				<span class="plus" data-order_id="{{$order->id}}" data-product_amount="{{$pro->amount}}"><i class="fa fa-plus" aria-hidden="true"></i></span>
																			</div>
																		
																		</div>
																	</div>
																	<div class="cart_item_price cart_info_col">
																		<div class="cart_item_title">Price</div>
																		<div class="cart_item_text">${{$pro->sale_price}}</div>
																	</div>
																	<div class="cart_item_total cart_info_col">
																		<div class="cart_item_title">Total</div>
																		<div class="cart_item_text "><small style="font-size: 100%;">$</small><small class="total_{{$order->id}}" style="font-size: 100%;">{{$order->amount * $pro->sale_price}}</small></div>
																	</div>
																</div>
															</li>
														</ul>
													</div>
												@endforeach
											@endforeach
											<!-- Order Total -->
											<div class="order_total">
												<div class="order_total_content text-md-right">
													<div class="order_total_title">Order Total:</div>
													<div class="order_total_amount"><small style="font-size: 100%;">$</small>2000</div>
												</div>
											</div>

											<div class="cart_buttons">
												<button type="button" class="button cart_button_clear">Cancel Order</button>
												<button type="button" class="button cart_button_checkout">Confirm Order</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@else
						<h4> no orders yet</h4>
				@endif
			</div>
		</div>
	</div>
	
	<!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection

@section('script')
    <script >
		$(document).ready(function () {
			if($('.plus').length && $('.minus').length)
			{
				var plus = $('.plus');
				var minus = $('.minus');
				//var value = $('#quantity_value');
				//var amount = $('#amount');

				plus.on('click', function()
				{
					var order_id=$(this).data('order_id');
					var product_amount=$(this).data('product_amount');
					var value = $('#quantity_value_'+order_id);
					var total = $('.total_'+order_id);
					var tot = parseFloat(total.text().replace(/,/g, ''));
					var x = parseFloat(value.text().replace(/,/g, ''));
					if(x < parseInt(product_amount)){
						
						value.text(x + 1);
						total.text(tot * parseFloat(value.text().replace(/,/g, '')));
					}
					
				});

				minus.on('click', function()
				{
					var order_id=$(this).data('order_id')
					var value = $('#quantity_value_'+order_id);
					var total = $('.total_'+order_id);
					var tot = parseFloat(total.text().replace(/,/g, ''));
					var x = parseFloat(value.text().replace(/,/g, ''));
					if(x > 1)
					{
						value.text(x - 1);
						console.log(tot / (parseFloat(value.text().replace(/,/g, ''))+x));
						total.text(tot / parseFloat(value.text().replace(/,/g, '')));
					}
				});
			}
		
			$('.cart_button_clear').click(function (e) {
				var that = $(this);
				e.preventDefault();
				console.log('ddddddddddd');
				swal({
					title: "Are you sure?",
					text: "You want to Cancel The Order!",
					type: "question",
					showCancelButton: true,
					confirmButtonColor: "#ff4961",
					confirmButtonText: "Yes!",
					closeOnConfirm: false
				}).then((isok) => {
					if (isok) {
						that.closest('form').submit();
					} else {
						swal("Your imaginary file is safe!", {icon: "error",});

					}
				});
			});//end of delete
			$('.cart_button_checkout').click(function (e) {
				var that = $(this);
				e.preventDefault();
				console.log('ddddddddddd');
				swal({
					title: "Are you sure?",
					text: "You want to Confirm The Order!",
					type: "question",
					showCancelButton: true,
					confirmButtonColor: "#ff4961",
					confirmButtonText: "Confirm",
					closeOnConfirm: false
				}).then((isok) => {
					if (isok) {
						that.closest('form').submit();
					} else {
						swal("Your imaginary file is safe!", {icon: "error",});

					}
				});
			});//end of delete
        });
	</script>
@endsection