@extends('layouts.app')
@section('title')
    <title>Colo Shop | {{$category->name}}'s Collection</title>
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
							{{$category->name}}'s
                        </li>
                    </ul>
                </div>

                <!-- Sidebar -->

                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
                        </div>
                        <ul class="sidebar_categories">
                            @foreach($categories as $cat)
                                <li class="@if($cat->id == $category->id) active @endif">
									<a href="/category/{{$cat->id}}">@if($cat->id == $category->id)
										<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									@endif {{$cat->name}}</a>
								</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Range Filtering -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Filter by Price</h5>
                        </div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>
                        <div class="filter_button"><span>filter</span></div>
                    </div>

                </div>

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->

                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn"
                                                    data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span>
                                                </li>
                                                <li class="type_sorting_btn"
                                                    data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>
                                                    <span>Product Name</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>6</span></li>
                                                <li class="num_sorting_btn"><span>12</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">
                                    @if($products->count() > 0)
                                        @foreach($products as $product)
                                            <div class="product-item {{$product->category->name}}">
                                                <div class="product discount product_filter">
                                                    <div class="product_image">
                                                        <img src="{{$product->image_path}}" alt="">
                                                    </div>
                                                    <div class="favorite favorite_left"></div>
                                                    <div
                                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                                        <span>-$20</span></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><a
                                                                href="/product_details">{{$product->name}}</a></h6>
                                                        <div class="product_price">{{$product->sale_price}}
                                                            <span>$590.00</span></div>
                                                    </div>
                                                </div>
                                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h4>Sorry there is not products in This Category</h4>
                                    @endif
                                </div>

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                    {{--                                    <ul class="product_sorting">--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <span>Show:</span>--}}
                                    {{--                                            <span class="num_sorting_text">04</span>--}}
                                    {{--                                            <i class="fa fa-angle-down"></i>--}}
                                    {{--                                            <ul class="sorting_num">--}}
                                    {{--                                                <li class="num_sorting_btn"><span>01</span></li>--}}
                                    {{--                                                <li class="num_sorting_btn"><span>02</span></li>--}}
                                    {{--                                                <li class="num_sorting_btn"><span>03</span></li>--}}
                                    {{--                                                <li class="num_sorting_btn"><span>04</span></li>--}}
                                    {{--                                            </ul>--}}
                                    {{--                                        </li>--}}
                                    {{--                                    </ul>--}}
                                    {{--                                    <span class="showing_results">Showing 1–3 of 12 results</span>--}}
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page_1" class="page_next"><a href="#"><i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                    </div>

                                </div>

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
            $('.cat').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = ($(this).attr("data-id"));
                // console.log(id);
                $.ajax({
                    type: "GET",
                    url: "/category_ajax/" + id,
                    success: function (results) {
                        console.log(results.data);
                        if (results.data.length == 0) {
                            console.log('results');
                            $('.product-grid').empty();
                            $('.product-grid').append(`<h3>Sorry there is not products in This Category</h3>`)
                        } else {
                            $('.product-grid').empty();
                            $.each(results.data, function (index, value) {
                                console.log(value);

                                $('.product-grid').append('<div class="product-item  '+ value.category.name +'"> <div class="product discount product_filter"> <div class="product_image"> <img src="'+ value.image_path +'" alt=""> </div> <div class="favorite favorite_left"></div> <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"> <span>-$20</span></div> <div class="product_info"> <h6 class="product_name"><a href="/product_details"> '+ value.name +' </a></h6> <div class="product_price">'+ value.sale_price +' <span>$590.00</span></div> </div> </div> <div class="red_button add_to_cart_button"><a href="#">add to cart</a> </div></div>');
                            });

                        }
                    }
                });
            });
        });
    </script>
@endsection
