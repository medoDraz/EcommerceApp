@extends('layouts.admin.app')
@section('title')
    <title>@lang('site.add_product')</title>
@endsection
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.welcome')}}"><i
                                            class="la la-home"></i> @lang('site.dashboard') </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.products.index')}}"> @lang('site.products') </a>
                                </li>
                                <li class="breadcrumb-item active">@lang('site.add_product')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" id="basic-layout-form"> @lang('site.add_product') </h3>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            {{--                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                {{--                                @include('admin.includes.alerts.success')--}}
                                {{--                                @include('admin.includes.alerts.errors')--}}
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.products.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label> @lang('site.image') </label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="file" name="image" class="photo">
                                                            <span class="file-custom"></span>
                                                        </label>
                                                        @error('image')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <img src="{{asset('/uploads/product_images/default.png')}}"
                                                             style="width: 150px"
                                                             class="img-thumbnail image-preview" alt="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                        class="ft-home"></i> @lang('site.product_detail') </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <label>@lang('site.categories')</label>
                                                            <select name="category_id" class="form-control">
                                                                <option value="">@lang('site.all_categories')</option>
                                                                @foreach ($categories as $category)
                                                                    <option class="custom-select"
                                                                            value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <label>@lang('site.sub_categories')</label>
                                                            <select name="subcategory_id" class="form-control">
                                                                <option
                                                                    value="">@lang('site.all_sub_categories')</option>
                                                                {{--                                                                @foreach ($categories as $category)--}}
                                                                {{--                                                                    <option class="custom-select" value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
                                                                {{--                                                                @endforeach--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="projectinput1">@lang('site.' . $locale . '.name')</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="{{ $locale }}[name]"
                                                                       value="{{ old($locale . '.name') }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="projectinput1">@lang('site.' . $locale . '.description')</label>
                                                                <textarea type="text"
                                                                          class="form-control"
                                                                          placeholder="  "
                                                                          name="{{ $locale }}[description]"
                                                                          value="{{ old($locale . '.description') }}"></textarea>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="projectinput1">@lang('site.' . $locale . '.slug')</label>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="  "
                                                                       name="{{ $locale }}[slug]"
                                                                       value="{{ old($locale . '.slug') }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('site.purchase_price')</label>
                                                            <input type="number"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="purchase_price"
                                                                   step="0.01"
                                                                   value="{{ old( 'purchase_price') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('site.sale_price')</label>
                                                            <input type="number"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="sale_price"
                                                                   step="0.01"
                                                                   value="{{ old( 'sale_price') }}">
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">@lang('site.amount')</label>
                                                        <input type="number"
                                                               class="form-control"
                                                               placeholder="  "
                                                               name="amount"
                                                               value="{{ old( 'amount') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">@lang('site.active')</label>

                                                        @error("active")
                                                        <span class="text-danger"> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('site.cancel')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> @lang('site.save')
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>

        $(document).ready(function () {

            // $(".dropdown-toggle").dropdown();

            $('select[name="category_id"]').on('change', function () {
                var categoryId = $(this).val();
                console.log(categoryId);


                if (categoryId) {


                    $.ajax({
                        url: '/admin/subcategory/' + categoryId,
                        type: "GET",
                        dataType: "json",

                        success: function (data) {
                            console.log(data);
                            $('select[name="subcategory_id"]').empty();

                            $('select[name="subcategory_id"]').append('<option value="">@lang('site.all_sub_categories')</option>');
                            $.each(data, function (key, value) {

                                $('select[name="subcategory_id"]').append('<option value="' + value['id'] + '">  ' + value['name'] + '  </option>');

                            });
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }

            });
        });


        $('.image').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
