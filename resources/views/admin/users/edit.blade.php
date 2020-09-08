@extends('layouts.admin.app')
@section('title')
    <title>@lang('site.edit_admin') {{$user->first_name}}</title>
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
                                        href="{{route('admin.users.index')}}"> @lang('site.admins') </a>
                                </li>
                                <li class="breadcrumb-item active">@lang('site.edit_admin') {{$user->first_name}}
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
                                    <h3 class="card-title" id="basic-layout-form"> @lang('site.add_admin') </h3>
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
                                        <form class="form" action="{{route('admin.users.update',$user->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('put') }}
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
                                                        <img src="{{$user->image_path}}"
                                                             style="width: 150px"
                                                             class="img-thumbnail image-preview" alt="">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-body">

                                                <h4 class="form-section"><i
                                                        class="ft-home"></i> @lang('site.admin_detail') </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('site.first_name')</label>
                                                            <input type="text" id="first_name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="first_name"
                                                                   value="{{$user->first_name}}">

                                                            @error("first_name")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('site.last_name')</label>
                                                            <input type="text" id="last_name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="last_name"
                                                                   value="{{$user->last_name}}">

                                                            @error("last_name")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('site.email')</label>
                                                            <input type="email" id="email"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="email"
                                                                   value="{{$user->email}}">

                                                            @error("email")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{--                                                    <div class="col-md-6">--}}
                                                    {{--                                                        <div class="form-group">--}}
                                                    {{--                                                            <label for="projectinput1">البريد الالكترونى</label>--}}
                                                    {{--                                                            <input type="email" id="email"--}}
                                                    {{--                                                                   class="form-control"--}}
                                                    {{--                                                                   placeholder="  "--}}
                                                    {{--                                                                   name="email"--}}
                                                    {{--                                                                   value="{{old('email')}}">--}}

                                                    {{--                                                            @error("email")--}}
                                                    {{--                                                            <span class="text-danger">{{ $message }}</span>--}}
                                                    {{--                                                            @enderror--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('site.password')</label>
                                                            <input type="password" id="password"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{$user->password}}"
                                                                   name="password"
                                                                   min="6">

                                                            @error("password")
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{--                                                    <div class="col-md-6">--}}
                                                    {{--                                                        <div class="form-group mt-1">--}}
                                                    {{--                                                                                                                <input type="checkbox" value="1"--}}
                                                    {{--                                                                                                                       name="active"--}}
                                                    {{--                                                                                                                       id="switcheryColor4"--}}
                                                    {{--                                                                                                                       class="switchery" data-color="success"--}}
                                                    {{--                                                                                                                       checked/>--}}
                                                    {{--                                                                                                                <label for="switcheryColor4"--}}
                                                    {{--                                                                                                                       class="card-title ml-1">الحالة</label>--}}

                                                    {{--                                                            @error("category.active")--}}
                                                    {{--                                                            <span class="text-danger"> </span>--}}
                                                    {{--                                                            @enderror--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}


                                                </div>

                                            </div>
                                            @php
                                                $models = ['users','categories','sub_categories','products'];
                                                $maps = ['create', 'read', 'update', 'delete','active'];
                                            @endphp

                                            <h4 class="form-section"><i
                                                    class="la la-list-alt"></i>@lang('site.permissions')</h4>
                                            <select class="select2 form-control" name="permissions[]"
                                                    multiple="multiple">
                                                @foreach($models   as $index =>  $model)
                                                    <optgroup label="@lang('site.' . $model)">
                                                        @foreach ($maps as $map)
                                                            <option value="{{ $model . '_' . $map }}" {{ $user->haspermission($model . '_' . $map) ? 'selected' : ''}}>@lang('site.' . $map) @lang('site.' . $model)</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>

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
