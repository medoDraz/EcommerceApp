@extends('layouts.admin.app')
@section('title')
    <title>Admin Panel | @lang('site.clients')</title>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    {{--                    <h3 class="content-header-title"> المتاجر </h3>--}}
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.welcome')}}"><i
                                            class="la la-home"></i> @lang('site.dashboard') </a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('site.clients')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('site.all_clients')</h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('site.first_name')</th>
                                                <th>@lang('site.last_name')</th>
                                                <th>@lang('site.image')</th>
                                                <th>@lang('site.email')</th>
                                                <th>@lang('site.active')</th>
                                                <th>@lang('site.action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($clients)
                                                @foreach($clients as $index=>$client)
                                                    <tr class="text-center">
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{$client -> first_name}}</td>
                                                        <td>{{$client -> last_name}}</td>
                                                        <td><img src="{{ $client->image_path}}" class="img-thumbnail"
                                                                 style="width: 120px;" alt=""></td>
                                                        <td>{{$client->email}}</td>
                                                        <td>{{$client -> getActive()}}</td>

                                                        <td>


                                                            <div class="btn-group float-md-right" role="group"
                                                                 aria-label="Button group with nested dropdown">
                                                                <button
                                                                    class="btn btn-outline-primary dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
                                                                    id="btnGroupDrop1" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="ft-settings icon-left"></i>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                     aria-labelledby="btnGroupDrop1">
                                                                    @if (auth()->user()->hasPermission('clients_active'))
                                                                    <a href="{{ route('admin.clients.editactive',$client -> id) }}"
                                                                       class="px-2">
                                                                        <i class="la  {{$client -> active == 0 ? 'la-eye'  : 'la-eye-slash'}}"></i>
                                                                        {{$client -> active == 0 ? 'تفعيل'  : 'إلغاء تفعيل'}}
                                                                    </a>
                                                                                                                                    @endif
                                                                    @if (auth()->user()->hasPermission('clients_delete'))
                                                                        <form action="{{ route('admin.clients.destroy',$client -> id) }}"
                                                                            method="post" style="display: inline-block;">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('delete') }}
                                                                            <button type="submit" style="color: #1E9FF2;"
                                                                               class="btn btn-link delete px-2 mr-1">
                                                                                <i class="la la-trash"></i>
                                                                                @lang('site.delete')
                                                                            </button>

                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection