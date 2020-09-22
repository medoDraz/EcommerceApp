@extends('layouts.admin.app')
@section('title')
    <title>Admin Panel | @lang('site.edit_sub_category')</title>
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
                                        href="{{route('admin.categories.index')}}"> @lang('site.categories') </a>
                                </li>
                                <li class="breadcrumb-item active">@lang('site.edit_sub_category')
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
                                    <h3 class="card-title" id="basic-layout-form"> @lang('site.edit_sub_category') </h3>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            {{-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                                            {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                {{--                                @include('admin.includes.alerts.success')--}}
                                {{--                                @include('admin.includes.alerts.errors')--}}
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.subcategories.update',$subcategory->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('put') }}
                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                        class="ft-home"></i> @lang('site.sub_category_detail') </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <label>@lang('site.categories')</label>
                                                            <select name="parent_id" class="form-control">
                                                                <option value="">@lang('site.all_categories')</option>
                                                                @foreach ($categories as $category)
                                                                    <option class="custom-select" value="{{ $category->id }}" {{ $subcategory->parent_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                @endforeach
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
                                                                       value="{{ $subcategory->name }}">
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
                                                                       value="{{ $subcategory->slug }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               @if($subcategory -> active  == 1 ) checked @endif/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">@lang('site.active')</label>
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
        $('.image').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
