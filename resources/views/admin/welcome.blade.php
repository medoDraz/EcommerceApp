@extends('layouts.admin.app')

@section('title')
    <title>Admin Panel | @lang('site.home')</title>
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Candlestick Multi Level Control Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-users font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.admins')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 info">{{$admins_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$admins_count}}%" aria-valuenow="{{$admins_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-user font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.clients')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 danger">{{$clients_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$clients_count}}%" aria-valuenow="{{$clients_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12  border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-bulb font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.categories')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 success">{{$categories_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$categories_count}}%" aria-valuenow="{{$categories_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row border-bottom-blue-grey py-1" style="border-color: #eceff1">
                                    </div>

                                    <div class="row py-1">
                                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-camera font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.sub_categories')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 info">{{$subcategories_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$subcategories_count}}%" aria-valuenow="{{$subcategories_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 border-right-blue-grey border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-bag font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.products')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 danger">{{$products_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$products_count}}%" aria-valuenow="{{$products_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12  border-right-lighten-5">
                                            <div class="media d-flex p-2">
                                                <div class="align-self-center">
                                                    <i class="icon-tag font-large-1 blue-grey d-block mb-1"></i>
                                                    <span class="text-muted text-right">@lang('site.tags')</span>
                                                </div>
                                                <div class="media-body text-right">
                                                    <span class="font-large-2 text-bold-300 success">{{$tags_count}}</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$tags_count}}%" aria-valuenow="{{$tags_count}}"
                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Active Order</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        {{-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                                        {{-- <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                    </ul>
{{--                                    <td>--}}
{{--                                        <button class="btn btn-sm round btn-danger btn-glow"><i--}}
{{--                                                class="la la-close font-medium-1"></i> Cancel all--}}
{{--                                        </button>--}}
{{--                                    </td>--}}
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Amount BTC</th>
                                            <th>BTC Remaining</th>
                                            <th>Price</th>
                                            <th>USD</th>
                                            <th>Fee (%)</th>
                                            <th>Cancel</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>2018-01-31 06:51:51</td>
                                            <td class="success">Buy</td>
                                            <td><i class="cc BTC-alt"></i> 0.58647</td>
                                            <td><i class="cc BTC-alt"></i> 0.58647</td>
                                            <td>11900.12</td>
                                            <td>$ 6979.78</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2018-01-31 06:50:50</td>
                                            <td class="danger">Sell</td>
                                            <td><i class="cc BTC-alt"></i> 1.38647</td>
                                            <td><i class="cc BTC-alt"></i> 0.38647</td>
                                            <td>11905.09</td>
                                            <td>$ 4600.97</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2018-01-31 06:49:51</td>
                                            <td class="success">Buy</td>
                                            <td><i class="cc BTC-alt"></i> 0.45879</td>
                                            <td><i class="cc BTC-alt"></i> 0.45879</td>
                                            <td>11901.85</td>
                                            <td>$ 5460.44</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2018-01-31 06:51:51</td>
                                            <td class="success">Buy</td>
                                            <td><i class="cc BTC-alt"></i> 0.89877</td>
                                            <td><i class="cc BTC-alt"></i> 0.89877</td>
                                            <td>11899.25</td>
                                            <td>$ 10694.6</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2018-01-31 06:51:51</td>
                                            <td class="danger">Sell</td>
                                            <td><i class="cc BTC-alt"></i> 0.45712</td>
                                            <td><i class="cc BTC-alt"></i> 0.45712</td>
                                            <td>11908.58</td>
                                            <td>$ 5443.65</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2018-01-31 06:51:51</td>
                                            <td class="success">Buy</td>
                                            <td><i class="cc BTC-alt"></i> 0.58647</td>
                                            <td><i class="cc BTC-alt"></i> 0.58647</td>
                                            <td>11900.12</td>
                                            <td>$ 6979.78</td>
                                            <td>0.2</td>
                                            <td>
                                                <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div>
@endsection
