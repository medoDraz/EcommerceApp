@extends('layouts.app')
@section('title')
    <title>Colo Shop | home</title>
@endsection
@section('content')
    <!-- Slider -->

    <div class="main_slider" style="background-image:url(images/slider_1.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h6>Spring / Summer Collection 2017</h6>
                        <h1>Get up to 30% Off New Arrivals</h1>
                        <div class="red_button shop_now_button"><a href="/product_details">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(images/banner_1.jpg)">
                        <div class="banner_category">
                            <a href="/category">women's</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(images/banner_2.jpg)">
                        <div class="banner_category">
                            <a href="/category">accessories's</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(images/banner_3.jpg)">
                        <div class="banner_category">
                            <a href="/category">men's</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                data-filter="*">all
                            </li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                data-filter=".Women">women's
                            </li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                data-filter=".Accessories">accessories
                            </li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                data-filter=".Men">men's
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid"
                         data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    @foreach($products as $product)
                        <!-- Product 1 -->
                            <div class="product-item {{$product->category->name}}">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="{{$product->image_path}}" alt="">
                                    </div>
									@if($product_favorites != null)
									@foreach($product_favorites as $favorite)
										<div class="favorite favorite_left @if($favorite->product_id == $product->id) active @endif" data-url="{{ route('addfavorite') }}" data-product_id="{{ $product->id }}"></div>
                                    @endforeach
									@else
                                        <div class="favorite favorite_left " data-url="{{ route('addfavorite') }}" data-product_id="{{ $product->id }}"></div>
                                    @endif
									
									<div
                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                        <span>-$20</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="/product_details/{{$product->id}}">{{$product->name}}</a></h6>
                                        <div class="product_price">{{$product->sale_price}}<span>$590.00</span></div>
										<input type="hidden" id="total_price" name="total_price" value="{{$product->sale_price}}"/>
                                    </div>
                                </div>
								
                                <div class="red_button add_to_cart_button" data-url="{{ route('addproductcard') }}" data-product_id="{{ $product->id }}">
									<a href="" class="add_product_card" data-url="{{ route('addproductcard') }}" data-total_price="{{ $product->sale_price }}" data-product_id="{{ $product->id }}">add to cart</a>
								</div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="images/deal_ofthe_week.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>
                        <div class="red_button deal_ofthe_week_button"><a href="#">shop now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Best Sellers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_slider_container">
                        <div class="owl-carousel owl-theme product_slider">

                            <!-- Slide 1 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="images/product_1.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div
                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                            <span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Fujifilm X100T 16 MP
                                                    Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_2.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div
                                            class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center">
                                            <span>new</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Samsung CF591 Series
                                                    Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_3.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Blue Yeti USB Microphone
                                                    Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_4.png" alt="">
                                        </div>
                                        <div
                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                            <span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">DYMO LabelWriter 450
                                                    Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_5.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Pryma Headphones, Rose
                                                    Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product discount">
                                        <div class="product_image">
                                            <img src="images/product_6.png" alt="">
                                        </div>
                                        <div class="favorite favorite_left"></div>
                                        <div
                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                            <span>-$20</span></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Fujifilm X100T 16 MP
                                                    Digital Camera (Silver)</a></h6>
                                            <div class="product_price">$520.00<span>$590.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 7 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item women">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_7.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Samsung CF591 Series
                                                    Curved 27-Inch FHD Monitor</a></h6>
                                            <div class="product_price">$610.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 8 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item accessories">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_8.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Blue Yeti USB Microphone
                                                    Blackout Edition</a></h6>
                                            <div class="product_price">$120.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 9 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_9.png" alt="">
                                        </div>
                                        <div
                                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                            <span>sale</span></div>
                                        <div class="favorite favorite_left"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">DYMO LabelWriter 450
                                                    Turbo Thermal Label Printer</a></h6>
                                            <div class="product_price">$410.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 10 -->

                            <div class="owl-item product_slider_item">
                                <div class="product-item men">
                                    <div class="product">
                                        <div class="product_image">
                                            <img src="images/product_10.png" alt="">
                                        </div>
                                        <div class="favorite"></div>
                                        <div class="product_info">
                                            <h6 class="product_name"><a href="/product_details">Pryma Headphones, Rose
                                                    Gold & Grey</a></h6>
                                            <div class="product_price">$180.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Navigation -->

                        <div
                            class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div
                            class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
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

    <!-- Blogs -->

    <div class="blogs">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title">
                        <h2>Latest Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row blogs_container">
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 blog_item_col">
                    <div class="blog_item">
                        <div class="blog_background" style="background-image:url(images/blog_3.jpg)"></div>
                        <div
                            class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="blog_title">Here are the trends I see coming this fall</h4>
                            <span class="blog_meta">by admin | dec 01, 2017</span>
                            <a class="blog_more" href="#">Read more</a>
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
                            swal("Done!", data.message, "success");
							document.getElementById("checkout_items").innerHTML = order_count+1;
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
    </script>
@endsection
