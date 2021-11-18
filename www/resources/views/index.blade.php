@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') Dashboard   @endslot
        @slot('title_li') Welcome to {{config('constants.APP_NAME')}} Dashboard   @endslot
    @endcomponent

    <div class="row">


        @component('common-components.dashboard-widget')

            @slot('title') Pending Orders  @endslot
            @slot('iconClass') mdi mdi-cart  @endslot
            @slot('price') 1,368  @endslot

        @endcomponent

            @component('common-components.dashboard-widget')

                @slot('title') Processed Order  @endslot
                @slot('iconClass') mdi mdi-cart  @endslot
                @slot('price') 1,368  @endslot

            @endcomponent
            @component('common-components.dashboard-widget')

                @slot('title') Total Order @endslot
                @slot('iconClass') mdi mdi-cart  @endslot
                @slot('price') 1,368  @endslot

            @endcomponent
            @component('common-components.dashboard-widget')

                @slot('title') Total Collection @endslot
                @slot('iconClass') mdi mdi-cart  @endslot
                @slot('price') 1,368  @endslot

            @endcomponent


    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sales Report</h4>

                    <div id="line-chart" class="apex-charts"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Revenue</h4>

                    <div id="column-chart" class="apex-charts"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Transactions</h4>

                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Id no.</th>
                                <th scope="col">Billing Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col" colspan="2">Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>15/01/2020</td>
                                <td>
                                    <a href="#" class="text-body font-weight-medium">#SK1235</a>
                                </td>
                                <td>Werner Berlin</td>
                                <td>$ 125</td>
                                <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>16/01/2020</td>
                                <td>
                                    <a href="#" class="text-body font-weight-medium">#SK1236</a>
                                </td>
                                <td>Robert Jordan</td>
                                <td>$ 118</td>
                                <td><span class="badge badge-soft-danger font-size-12">Chargeback</span></td>
                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>17/01/2020</td>
                                <td>
                                    <a href="#" class="text-body font-weight-medium">#SK1237</a>
                                </td>
                                <td>Daniel Finch</td>
                                <td>$ 115</td>
                                <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                            <tr>
                                <td>18/01/2020</td>
                                <td>
                                    <a href="#" class="text-body font-weight-medium">#SK1238</a>
                                </td>
                                <td>James Hawkins</td>
                                <td>$ 121</td>
                                <td><span class="badge badge-soft-warning font-size-12">Refund</span></td>
                                <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <ul class="pagination pagination-rounded justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
    <!-- plugin js -->
    <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection
