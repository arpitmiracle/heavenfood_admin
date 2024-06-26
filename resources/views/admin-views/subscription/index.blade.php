@extends('layouts.admin.app')

@section('title',translate('Package_list'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->

        <div class="page-header">
            <h1 class="page-header-title">
                <img src="{{asset('/public/assets/admin/img/bill.png')}}" alt="" class="w-24 mr-2">
                {{ translate('messages.subcription_package_list') }}
                <span class="badge badge-soft-dark ml-2 px-2 badge-pill" id="itemCount" >{{$total}}</span>
            </h1>
        </div>

        <!-- End Page Header -->
        <!--  -->
        {{-- <div class="row g-3 mb-3">
            <div class="col-xl-3 col-sm-6">
                <div class="resturant-card bg--1">
                    <h4 class="title">{{  $total_sub}}</h4>
                    <span class="subtitle">{{translate('messages.Total_Subscription')}} </span>
                    <img class="resturant-icon w-35x" src="{{asset('/public/assets/admin/img/subscription-list/1.svg')}}" alt="resturant">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="resturant-card bg--2">

                    <h4 class="title">{{ $active }}</h4>
                    <span class="subtitle">{{translate('messages.Active_Subscription')}}</span>
                    <img class="resturant-icon w-35x" src="{{asset('/public/assets/admin/img/subscription-list/2.svg')}}" alt="resturant">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="resturant-card bg--4">

                    <h4 class="title">{{ $suspended }}</h4>
                    <span class="subtitle"> {{ translate('messages.Suspendend_Subscription')}}</span>
                    <img class="resturant-icon w-35x" src="{{asset('/public/assets/admin/img/subscription-list/3.svg')}}" alt="resturant">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="resturant-card bg--3">
                    <h4 class="title">{{ $expire_soon }}</h4>
                    <span class="subtitle">{{translate('Expiring Soon')}}</span>
                    <img class="resturant-icon w-35x" src="{{asset('/public/assets/admin/img/subscription-list/4.svg')}}" alt="resturant">
                </div>
            </div>
        </div> --}}
        <!--  -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header py-2 border-0">
                <div class="search--button-wrapper justify-content-end">
                    <span class="card-title"></span>
                    <form >
                        <!-- Search -->
                        <div class="input--group input-group input-group-merge input-group-flush">
                            <input id="datatableSearch_" type="search" name="search" class="form-control" value="{{request()->get('search')}}"
                                    placeholder="{{ translate('Ex:_search_by_package_name') }}" aria-label="Search">
                            <button type="submit" class="btn btn--secondary">
                                <i class="tio-search"></i>
                            </button>
                            @if(request()->get('search'))
                            <button type="reset" class="btn btn--primary ml-2 bg-0177CD" onclick="location.href = '{{route('admin.subscription.list')}}'">{{translate('messages.reset')}}</button>
                            @endif
                        </div>
                        <!-- End Search -->
                    </form>


                    <!-- Unfold -->
                    <div class="hs-unfold mr-2">
                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                            data-hs-unfold-options='{
                                "target": "#usersExportDropdown",
                                "type": "css-animation"
                            }'>
                            <i class="tio-download-to mr-1"></i> {{translate('messages.export')}}
                        </a>

                        <div id="usersExportDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">{{translate('messages.download_options')}}</span>
                            <a id="export-excel" class="dropdown-item"  href="{{ route('admin.subscription.package_list_export', ['type' => 'excel', request()->getQueryString()]) }}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/components/excel.svg"
                                        alt="Image Description">
                                {{translate('messages.excel')}}
                            </a>
                            <a id="export-csv" class="dropdown-item"  href="{{ route('admin.subscription.package_list_export', ['type' => 'csv', request()->getQueryString()]) }}">
                                <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="{{asset('public/assets/admin')}}/svg/components/placeholder-csv-format.svg"
                                        alt="Image Description">
                                {{translate('messages.csv')}}
                            </a>
                        </div>
                    </div>
                    <!-- End Unfold -->
                    <a class="btn btn--primary" href="{{ route('admin.subscription.create') }}">
                        <i class="tio-add"></i> {{ translate('messages.add_subcription_package') }}
                    </a>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                       data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 25,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "paging":false
                   }'>
                    <thead class="thead-light">
                    <tr>
                        <th class="">
                            {{ translate('messages.sl') }}
                        </th>
                        <th class="table-column-pl-0">{{translate('Package_Name')}}</th>
                        <th>{{translate('messages.Pricing')}}</th>
                        <th>{{translate('messages.duration') }}</th>
                        <th>{{translate('messages.total_sell')}}</th>
                        <th class="text-center">{{translate('messages.status')}}</th>
                        <th class="text-center">{{translate('messages.actions')}}</th>
                    </tr>
                    </thead>

                    <tbody id="set-rows">
                        @include('admin-views.subscription.partials._table')
                    </tbody>
                </table>
            </div>
            @if(count($packages) === 0)
            <div class="empty--data">
                <img src="{{asset('/public/assets/admin/img/empty.png')}}" alt="public">
                <h5>
                    {{translate('no_data_found')}}
                </h5>
            </div>
            @endif
            <!-- End Table -->
            <div class="page-area px-4 pb-3">
                <div class="d-flex align-items-center justify-content-end">
                                        {{-- <div>
                        1-15 of 380
                    </div> --}}
                    <div>
                        {{-- {!! $packages->links() !!} --}}
                {!! $packages->appends(request()->query())->links('pagination::bootstrap-4') !!}

                        {{--<nav id="datatablePagination" aria-label="Activity pagination"></nav>--}}
                    </div>
                </div>
            </div>
            <!-- End Footer -->

        </div>
        <!-- End Card -->
    </div>
@endsection

@push('script_2')
    <script>
        function status_change_alert(url, message, e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ translate('Are_you_sure?') }}',
                text: message,
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#FC6A57',
                cancelButtonText: '{{ translate('no') }}',
                confirmButtonText: '{{ translate('yes') }}',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    location.href=url;
                }
            })
        }
        $(document).on('ready', function () {
            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            $('.js-nav-scroller').each(function () {
                new HsNavScroller($(this)).init()
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });


            // INITIALIZATION OF DATATABLES
            // =======================================================
            var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'd-none'
                    },
                    {
                        extend: 'excel',
                        className: 'd-none'
                    },
                    {
                        extend: 'csv',
                        className: 'd-none'
                    },
                    {
                        extend: 'pdf',
                        className: 'd-none'
                    },
                    {
                        extend: 'print',
                        className: 'd-none'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                        '<img class="mb-3 w-7rem" src="{{asset('public/assets/admin')}}/svg/illustrations/sorry.svg" alt="Image Description">' +
                        '<p class="mb-0">{{ translate('No_data_to_show') }}</p>' +
                        '</div>'
                }
            });


            $('#datatableSearch').on('mouseup', function (e) {
                var $input = $(this),
                    oldValue = $input.val();

                if (oldValue == "") return;

                setTimeout(function () {
                    var newValue = $input.val();

                    if (newValue == "") {
                        // Gotcha
                        datatable.search('').draw();
                    }
                }, 1);
            });

            $('#toggleColumn_name').change(function (e) {
                datatable.columns(1).visible(e.target.checked)
            })

            $('#toggleColumn_price').change(function (e) {
                datatable.columns(2).visible(e.target.checked)
            })

            $('#toggleColumn_validity').change(function (e) {
                datatable.columns(3).visible(e.target.checked)
            })

            $('#toggleColumn_total_sell').change(function (e) {
                datatable.columns(4).visible(e.target.checked)
            })

            $('#toggleColumn_status').change(function (e) {
                datatable.columns(5).visible(e.target.checked)
            })

            $('#toggleColumn_actions').change(function (e) {
                datatable.columns(6).visible(e.target.checked)
            })

            // INITIALIZATION OF TAGIFY
            // =======================================================
            $('.js-tagify').each(function () {
                var tagify = $.HSCore.components.HSTagify.init($(this));
            });
        });
    </script>

@endpush
