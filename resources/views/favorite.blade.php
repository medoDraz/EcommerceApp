@extends('layouts.app')
@section('title')
    <title>Colo Shop | Favorite's Collection</title>
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
							Favorite's
                        </li>
                    </ul>
                </div>

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->
					<h1>My Favorite Products:</h1>
                  
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <!-- Product Grid -->

                                <div class="product-grid">
                                    @if($products != null)
                                        @foreach($products as $product)
                                            <div class="product-item">
                                                <div class="product discount product_filter">
                                                    <div class="product_image">
                                                        <img src="{{$product->product->image_path}}" alt="">
                                                    </div>
                                                    <div class="favorite favorite_left active" data-url="{{ route('addfavorite') }}" data-product_id="{{ $product->product->id }}"></div>
                                                    <div
                                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span>-$20</span></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><a
                                                                href="/product_details">{{$product->product->name}}</a></h6>
                                                        <div class="product_price">{{$product->product->sale_price}}
                                                            <span>$590.00</span></div>
                                                    </div>
                                                </div>
                                                <div class="red_button add_to_cart_button" >
													<a href="" class="add_product_card" data-url="{{ route('addproductcard') }}" data-total_price="{{ $product->product->sale_price }}" data-product_id="{{ $product->product->id }}">add to cart</a>
												</div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h4>Sorry there is not products in Your Favorite</h4>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
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
<script src="{{asset('assets/front/js/categories_custom.js')}}"></script>
    <script >
        $(document).ready(function () {
			if($('.favorite').length)
			{
				var favs = $('.favorite');

				favs.each(function()
				{
					var fav = $(this);
					var active = false;
					if(fav.hasClass('active'))
					{
						active = true;
					}

					fav.on('click', function()
					{
						let url = $(this).data('url');
						let product_id = $(this).data('product_id');
						let user_id = $('meta[name=user-id]').attr('content');
						var favorite_count=parseInt(document.getElementById("favorite_items").innerText);
						let data = {
							'_token': $('meta[name=csrf-token]').attr('content'),
							'product_id' : product_id,
							'client_id' :user_id,
						};
						$.ajax({
							url: url,
							method: 'post',
							data: data,
							success: function (data) {
								//console.log(data.messages.length);
								
								if (data.success === true) {
									swal("Done!", data.message, "success");
									if(data.save == 1){
										document.getElementById("favorite_items").innerHTML = favorite_count+1;
									}else{
										document.getElementById("favorite_items").innerHTML = favorite_count-1;
									}
									
									if(active)
									{
										fav.removeClass('active');
										active = false;
									}
									else
									{
										fav.addClass('active');
										active = true;
									}
								} else {
									//swal.toast("Error!", data.message, "error");
									const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
									  toast: true,
									  position: 'top-end',
									  showConfirmButton: false,
									  timer: 3000
									});
									Toast.fire({
									  type: 'error',
									  title: data.message
									});
								}
							}
						});
						
					});
				});
			}
			
			$('.add_product_card').on('click', function (e) {
           
				e.preventDefault();
				let url = $(this).data('url');
				let product_id = $(this).data('product_id');
				let user_id = $('meta[name=user-id]').attr('content');
				let price = $(this).data('total_price');
				//console.log(user_id);
				var order_count=parseInt(document.getElementById("checkout_items").innerText);
				
                let data = {
					'_token': $('meta[name=csrf-token]').attr('content'),
					'client_id' :user_id,
					'product_id' : product_id,
					'amount' : 1,
					'total_price' : price,
					
				};
                
                 console.log(order_count);
                $.ajax({
					url: url,
					method: 'post',
					data: data,
					success: function (data) {
						//console.log(data.messages.length);
						
						if (data.success === true) {
                            swal({
								title: data.message,
								type: "success",
								showConfirmButton: false,
								timer: 3000
							});
							document.getElementById("checkout_items").innerHTML = order_count+1;
                        } else {
                            //swal.toast("Error!", data.message, "error");
							swal({
								title: data.message,
								type: "error",
								showConfirmButton: false,
								timer: 3000
							});
							
                        }
					}
				});
            });
        });
    </script>
@endsection
