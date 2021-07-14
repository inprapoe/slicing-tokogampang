<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('label.supplier') | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ url('images/landing/tokogampang-logo-white.svg') }}" type="image/x-icon" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css')  }}">

    <!-- daterangepicker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/color.css') }}" rel="stylesheet" type="text/css" />



    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.2.7/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyAKF2eFJnEL1kNWZ-X5PRErBzewx3TLRZ4",
            authDomain: "tokogampang-df960.firebaseapp.com",
            projectId: "tokogampang-df960",
            storageBucket: "tokogampang-df960.appspot.com",
            messagingSenderId: "38089960421",
            appId: "1:38089960421:web:a119e634f75ca13835dd0c",
            measurementId: "G-5WF37ELWZJ"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const analytics = firebase.analytics();
        analytics.logEvent('login', {
            user: 'supplier'
        });
    </script>

    <style>
        /*.custom-is-invalid {
              border: 1px solid #dc3545 !important;
          }*/
        .custom-is-invalid .note-editor {
            border: 1px solid #dc3545 !important;
        }

        .custom-is-invalid .custom-invalid-feedback {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545 !important;
        }

        .div-main-color {
            background: #EB1C24;
        }

        .main-color {
            color: #EB1C24 !important;
        }

        .text-main-color {
            color: white;
        }

        .main-color:hover {
            color: rgba(235, 30, 37, 0.66);
        }

        .swal2-button-right {
            width: auto !important;
            margin: 0 1.4rem 0 auto !important;
        }
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link main-color" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars main-color"></i>
                    </a>
                </li>
            </ul>
            <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-light elevation-4">
            <!-- Sidebar -->
            <div class="sidebar sidebar-light-light">
                <!-- Sidebar user panel (optional) -->
                <a href="{{ route('dashboard.index') }}" class="">
                    <div class="user-panel d-flex" style="border: none!important; margin-top: 10px!important; margin-bottom: 20px!important;">
                        <div class="image">
                            <img class="elevation-1" style="width: 30px; height: auto; box-shadow: none!important;" src="{{ asset('images/landing/tokogampang-logo-red.svg') }}">
                        </div>
                        <div class="info">
                            <img class="" style="width: 150px; height: auto" src="{{ asset('images/landing/tokogampang-text-black.svg') }}">
                        </div>
                    </div>
                </a>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/landing/tokogampang-logo-white.svg') }}" class="img-circle elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">@lang('label.supplier')</a>
                        {{--<a href="{{ route('supplier.upgrade.index') }}">
                        <span class="badge badge-danger">
                            <i class="far fa-star"></i> Upgrade Membership
                        </span>
                        </a>--}}
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        @if(Auth::user()->hasVerifiedEmail())
                        <li class="nav-item">
                            <a href="{{ url('/supplier') }}" class="nav-link {{ (request()->is('supplier')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.mou.index') }}" class="nav-link {{ (request()->is('supplier/mou')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>MoU</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview
                        {{ (request()->is('supplier/products*')) ? 'menu-open' : '' }}
                        ">
                            <a href="#" class="nav-link
                            {{ (request()->is('supplier/products*')) ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Produk
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('supplier.products.index') }}" class="nav-link {{ (request()->is('supplier/products')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('supplier.products.knowledge.index') }}" class="nav-link {{ (request()->is('supplier/products/knowledge*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Produk Knowledge</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if(Auth::user()->userable->hasFullfillmentTypesName(['warehouse', 'trial']))
                        <li class="nav-item">
                            <a href="{{ route('supplier.inbound_requests.index') }}" class="nav-link {{ (request()->is('supplier/inbound_requests*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-download"></i>
                                <p>Inbound Request</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('supplier.outbound_requests.index') }}" class="nav-link {{ (request()->is('supplier/outbound_requests*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>Outbound Request</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('supplier.outbound_rts.index') }}" class="nav-link {{ (request()->is('supplier/outbound_rts*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>Outbound RTS</p>
                            </a>
                        </li>
                        @endif

                        {{--<li class="nav-item">
                            <a href="{{ route('supplier.store.index') }}" class="nav-link {{ (request()->is('supplier/store*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Pembelian</p>
                        </a>
                        </li>--}}

                        <li class="nav-item has-treeview
                        {{ (request()->is('supplier/order-ecommerce*')) ? 'menu-open' : '' }}
                        {{ (request()->is('supplier/orders*')) ? 'menu-open' : '' }}
                        {{ (request()->is('supplier/inhouse-orders*')) ? 'menu-open' : '' }}
                        {{ (request()->is('supplier/tracking-orders*')) ? 'menu-open' : '' }}
                        ">
                            <a href="#" class="nav-link
                            {{ (request()->is('supplier/orders-order-ecommerce*')) ? 'active' : '' }}
                            {{ (request()->is('supplier/orders*')) ? 'active' : '' }}
                            {{ (request()->is('supplier/inhouse-orders*')) ? 'active' : '' }}
                            {{ (request()->is('supplier/tracking-orders*')) ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>
                                    Penjualan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('supplier.orders.index') }}" class="nav-link {{ (request()->is('supplier/orders*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Penjualan</p>
                                    </a>

                                </li>
                                @if(Auth::user()->userable->hasFullfillmentTypesName(['inhouse', 'trial']))
                                <li class="nav-item">
                                    <a href="{{ route('supplier.inhouse-orders.index') }}" class="nav-link {{ (request()->is('supplier/inhouse-orders*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inhouse Penjualan</p>
                                    </a>

                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('supplier.order-ecommerce.index') }}" class="nav-link {{ (request()->is('supplier/order-ecommerce*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penjualan E-Commerce</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('supplier.tracking-orders.index') }}" class="nav-link {{ (request()->is('supplier/tracking-orders*')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tracking Order</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.balances.index') }}" class="nav-link {{ (request()->is('supplier/balances*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Balances</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                        <a href="{{ route('supplier.brands.index') }}"
                        class="nav-link {{ (request()->is('supplier/brand*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Brand</p>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.files.index') }}" class="nav-link {{ (request()->is('supplier/files*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-camera"></i>
                                <p>Media</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('supplier.resellers.index') }}" class="nav-link {{ (request()->is('supplier/reseller*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Marketer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.withdrawrequest.index') }}" class="nav-link {{ (request()->is('supplier/withdrawrequest*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-piggy-bank"></i>
                                <p>Pengajuan Pencairan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.bank-accounts.index') }}" class="nav-link {{ (request()->is('supplier/bank-account*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>Nomor Rekening</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview
                        {{ (request()->is('supplier/profile*')) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link
                            {{ (request()->is('supplier/profile*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>
                                    Profile Setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('supplier.profile.setting') }}" class="nav-link {{ (request()->is('supplier/profile/setting')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Update Profile</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('supplier.profile.password.edit') }}" class="nav-link {{ (request()->is('supplier/profile/password/edit')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ganti Password</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('supplier.profile.messanger.setting') }}" class="nav-link {{ (request()->is('supplier/profile/messanger/setting')) ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Messanger Setting</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('supplier.report.index') }}" class="nav-link {{ (request()->is('supplier/report*')) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('web.faq.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('header')
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <i class="icon fa fa-check"></i> {!! session()->get('message') !!}
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-warning alert-dismissible">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <i class="icon fa fa-warning"></i> {!! session()->get('error') !!}
                        </div>
                        @endif
                    </div>
                </div>
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?php echo date('Y') ?> <a href="https://tokogampang" target="_blank">tokogampang</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <!-- <a href="{{ route('web.faq.index') }}" class="mr-3">FAQ</a> -->
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/helpers.js') }}"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <script>
        @if(Session::has('success'))
        toastr.success("{!! Session::get('success') !!}")
        @endif

        @if(Session::has('info'))
        toastr.info("{!! Session::get('info') !!}")
        @endif
        @if(Session::has('warning'))
        toastr.warning("{!! Session::get('warning')  !!}")
        @endif

        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
    @if(!Auth::user()->hasAgreements(['mou']))
    <script type="text/javascript">
        let showMoU = () => {
            let html = `<div class="bg-gray-100 pt-8 max-h-96 overflow-auto">{!! html_entity_decode($mou->text) !!}</div>`;
            let footer =
                `@if($mou->attachment)
                    <a class="text-xs underline" href="{{ route('agreements.attachment.download', $mou->id) }}">
                        <i class="fas fa-paperclip mr-1"></i> Download file attachment
                    </a>
                @endif
                <div class="flex flex-col pt-8 pb-4">
                    <div>
                        <p class="text-sm mb-3 font-bold">Fullfillment Types :</p>
                        <div class="text-sm ml-8">
                            <input type="checkbox" name="product_owner_types" id="inhouse" value="inhouse">
                            <label for="inhouse">Inhouse Product</label>
                        </div>
                        <div class="text-sm ml-8">
                            <input type="checkbox" name="product_owner_types" id="warehouse" value="warehouse">
                            <label for="warehouse">Warehouse Product</label>
                        </div>
                        <div class="text-sm ml-8">
                            <input type="checkbox" name="product_owner_types" id="trial" value="trial">
                            <label for="trial">Trial</label>
                        </div>
                    </div>
                    <div class="flex flex-col self-end mt-4 lg:mt-0">
                        <p class="text-sm font-bold mb-3">Sign here :</p>
                        <canvas width="200" style="touch-action: none;border:0.5px solid #000;" height="100"></canvas>
                        <div class="flex justify-end mt-1">
                            <button id="clear" class="text-sm"><i class="fas fa-eraser"></i> clear</button>
                        </div>
                    </div>
                </div>`

            let signaturePad;

            Swal.fire({
                title: '{{ $mou->title }}',
                html: html + footer,
                focusConfirm: false,
                showCancelButton: false,
                showCloseButton: false,
                confirmButtonText: "Terima",
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                customClass: {
                    popup: 'w-100',
                    htmlContainer: 'text-left',
                    actions: 'swal2-button-right'
                },
                didOpen: () => {
                    let canvas = $("canvas").get(0);
                    signaturePad = new SignaturePad(canvas, {
                        backgroundColor: 'rgb(255,255,255)',
                        penColor: 'rgb(0, 0, 0)'
                    });
                    $("#clear").on("click", () => signaturePad.clear());
                },
                preConfirm: () => {
                    let fullfillmentTypes = [];

                    $("input:checkbox[name=product_owner_types]:checked").each(function() {
                        fullfillmentTypes.push($(this).val());
                    });

                    return $.ajax({
                            type: 'POST',
                            url: "{{ route('supplier.mou.update') }}",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': 'PUT',
                                'agreement_id': "{{ $mou->id }}",
                                'fullfillment_types': fullfillmentTypes,
                                'signature': signaturePad.isEmpty() ? null : signaturePad.toDataURL("image/jpeg")
                            },
                        })
                        .then(response => {
                            return response
                        })
                        .catch(error => {
                            let message = error.responseJSON.errors;
                            let messageText = "";
                            $.each(message, function(key, value) {
                                messageText += value + "<br>"
                            });
                            Swal.showValidationMessage(messageText);
                        });
                }
            }).then((result) => {
                if (result) {
                    location.reload();
                }
            });
        }

        $(window).on('load', function() {
            showMoU();
        });
    </script>
    @endif
    @if(!Auth::user()->hasAgreements(['privacy_policy','terms_of_service']))
    <script type="text/javascript">
        let showAgreements = () => {
            let html = `
            <p>Sebelum bisa melanjutkan anda harus menyetujui Syarat dan Ketentuan serta Kebijakan Privasi<p>
            <div class="flex text-sm space-x-4 justify-center mt-4">
                <div>
                    <input type="checkbox" name="terms_of_service" id="terms_of_service" value="{{ $tos->id }}">
                    <label for="terms_of_service"> <a class="text-red-tokogampang underline ml-1" href="{{ route('web.agreement.show', ['pages'=>'product_owner', 'type' => 'terms_of_service', 'id' => $tos->id ]) }}">Syarat dan ketentuan</a></label>
                </div>
                <div>
                    <input type="checkbox" name="privacy_policy" id="privacy_policy" value="{{ $pp->id }}">
                    <label for="privacy_policy"> <a class="text-red-tokogampang underline ml-1" href="{{ route('web.agreement.show', ['pages'=>'product_owner', 'type' => 'privacy_policy', 'id' => $pp->id ]) }}">Kebijakan privasi</a></label>
                </div>
            </div>`;

            Swal.fire({
                title: '',
                html: html,
                focusConfirm: false,
                showCancelButton: false,
                showCloseButton: false,
                confirmButtonText: "Terima",
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                customClass: {
                    actions: 'swal2-button-right'
                },
                preConfirm: () => {
                    return $.ajax({
                            type: 'POST',
                            url: "{{ route('supplier.agreement.update') }}",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': 'PUT',
                                'terms_of_service': $('input[name="terms_of_service"]:checked').val(),
                                'privacy_policy': $('input[name="privacy_policy"]:checked').val(),
                            },
                        })
                        .then(response => {
                            return response
                        })
                        .catch(error => {
                            let message = error.responseJSON.errors;
                            let messageText = "";
                            $.each(message, function(key, value) {
                                messageText += value + "<br>"
                            });
                            Swal.showValidationMessage(messageText);
                        });
                }
            }).then((result) => {
                if (result) {
                    location.reload();
                }
            });
        }

        $(window).on('load', function() {
            showAgreements();
        });
    </script>
    @endif
    @yield('scripts')
    @stack('scripts')

</body>

</html>