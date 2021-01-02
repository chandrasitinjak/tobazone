@extends('admin.layouts.app')
@section('content')
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">


<body>
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Order</div>
                                <div class="stat-digit">{{ $countOrder }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Merchant</div>
                                <div class="stat-digit">{{ $countMerchant }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Customer</div>
                                <div class="stat-digit">{{ $countCustomer }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-home text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Homestay</div>
                                <div class="stat-digit">{{ $countHomestay }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="/admin-assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/admin-assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admin-assets/assets/js/main.js"></script>


    <script src="/admin-assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/admin-assets/assets/js/dashboard.js"></script>
    <script src="/admin-assets/assets/js/widgets.js"></script>
    <script src="/admin-assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/admin-assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/admin-assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
@endsection
