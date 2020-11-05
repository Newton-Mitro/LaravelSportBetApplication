<!DOCTYPE html>
<html>
@php
    $setting = \App\Setting::find(1);
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/holidays.png')}}">
    <title>{{config('app.name','Application Name')}} - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark card-header">

        </span>
        <div class="container">
            <a href="{{ url('') }}" class="navbar-brand">
                <img src="{{ asset('images/holidays.png')}}" alt="AdminLTE Logo"
                     class="brand-image "
                     style="opacity: .8">
                <span class="brand-text font-weight-strong text-warning"><strong>Sports</strong><strong
                            class="text-white">Bet</strong></span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item {{(Request::segment(1)=='')?'active':''}}">
                        <a href="{{ url('') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item {{(Request::segment(2)=='deposit')?'active':''}}">
                                <a class="nav-link " href="{{route('create.deposit')}}"><i
                                            class="fas fa-piggy-bank"></i>
                                    Deposit</a>
                            </li>
                            <li class="nav-item {{(Request::segment(2)=='withdraw')?'active':''}}">
                                <a class="nav-link " href="{{route('create.withdraw')}}"><i
                                            class="fas fa-hand-holding-usd"></i>
                                    Withdraw</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="float-right">
        <span>{{date('d M y')}}</span> | <span id="MyClockDisplay"
                                               class="clock"
                                               onload="showTime()"></span></span></a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item ">
                            <a class="nav-link {{(Request::segment(2)=='profile')?'active':''}}"
                               href="{{ route('profile') }}"><i class="fas fa-coins"></i>
                                <strong>
                                    {{Auth::user()->balance}}</strong> <span>tk.</span></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{(Request::segment(1)=='login')?'active':''}}"
                               href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item ">
                                <a class="nav-link {{(Request::segment(1)=='register')?'active':''}}"
                                   href="{{ route('register') }}"><i class="fab fa-pied-piper-alt"></i>
                                    Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
@if (Route::has('login'))
    @auth
        <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('profile') }}" class="brand-link align-middle">
                    @if(Auth::user()->avatar == null)
                        <img src="{{ asset('images/holidays.png')}}" alt="user photo"
                             class="brand-image img-circle"
                             style="opacity: .8" height="50px">
                    @else
                        <img src="{{ Auth::user()->avatar }}" alt="user photo"
                             class="brand-image img-circle"
                             style="opacity: .8">
                    @endif
                    <span class="brand-text font-weight-strong"><strong>{{Auth::user()->name}}</strong></span>

                </a>


                <!-- Sidebar -->
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">


                            <li class="nav-header">User Wallet</li>
                            <li class="nav-item">
                                <a href="{{route('profile')}}"
                                   class="nav-link {{(Request::segment(2)=='profile')?'active':''}}">
                                    <i class="far fa-id-badge"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('reset.password',Auth::user()->id)}}"
                                   class="nav-link {{(Request::segment(2)=='reset')?'active':''}}">
                                    <i class="far fa-id-badge"></i>
                                    <p>
                                        Reset Password
                                    </p>
                                </a>
                            </li>
                            {{--\App\Models\Club::find(Auth::user()->club_id)->club_name--}}

                            <li class="nav-header">Club Details</li>

                            <li class="nav-item">
                                <a href="{{route('club.create')}}"
                                   class="nav-link {{(Request::segment(2)=='club' and Request::segment(3)=='create')?'active':''}}">
                                    <i class="fas fa-chess"></i>
                                    <p>
                                        Create Club
                                    </p>
                                </a>
                            </li>
                            @if(Auth::user()->club !=null)
                                <li class="nav-item">
                                    <a href="{{route('user.club.index',['id'=>Auth::user()->club->id])}}"
                                       class="nav-link">
                                        <i class="fab fa-centos"></i>
                                        <p>
                                            {{(Auth::user()->club->club_name)}}
                                        </p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-header">User Deposit</li>
                            <li class="nav-item">
                                <a href="{{route('create.deposit')}}"
                                   class="nav-link {{(Request::segment(2)=='deposit' and Request::segment(3)=='create')?'active':''}}">
                                    <i class="fas fa-piggy-bank"></i>
                                    <p>
                                        Make Deposit Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('deposit.history')}}"
                                   class="nav-link {{(Request::segment(2)=='deposit' and Request::segment(3)=='history')?'active':''}}">
                                    <i class="fab fa-cotton-bureau"></i>
                                    <p>
                                        Deposit History
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">User Withdraw</li>
                            <li class="nav-item">
                                <a href="{{route('create.withdraw')}}"
                                   class="nav-link {{(Request::segment(2)=='withdraw' and Request::segment(3)=='create')?'active':''}}">
                                    <i class="fas fa-hand-holding-usd"></i>
                                    <p>
                                        Make Withdraw Request
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('withdraw.history')}}"
                                   class="nav-link {{(Request::segment(2)=='withdraw' and Request::segment(3)=='history')?'active':''}}">
                                    <i class="fas fa-handshake"></i>
                                    <p>
                                        Withdraw History
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">User History</li>
                            <li class="nav-item">
                                <a href="{{route('transaction.history')}}"
                                   class="nav-link {{(Request::segment(2)=='transactions')?'active':''}}">
                                    <i class="fab fa-d-and-d"></i>
                                    <p>
                                        All Transaction History
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('betting.history')}}"
                                   class="nav-link {{(Request::segment(2)=='bets')?'active':''}}">
                                    <i class="fas fa-horse"></i>
                                    <p>
                                        Betting History
                                    </p>
                                </a>
                            </li>
                            <form action="{{route('logout')}}" method="post" class="border-top">@csrf
                                <button type="submit" class="nav-link border-0 bg-white text-muted ">
                                    <i class="nav-icon fas fa-sign-out-alt text-muted"></i> <span>Logout</span>
                                </button>
                            </form>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        @endauth
    @endif
    <div class="content-wrapper">
        <div class="content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>


    <footer class="main-footer card-header text-white position-relative">
        <div id="imo" class="text-center"  onclick="window.open('https://call.imo.im/bangladesh.club');">
            <span style="font-size: 10px" class="text-success text-bold"  >{{$setting->phone}}</span>
        </div>
        <div class="container m-auto text-center p-3">
            <img class="img-thumbnail" src="{{ asset('dist/img/bkash.jpg')}}" alt="" width="10%">
            <img class="img-thumbnail" src="{{ asset('dist/img/rocket.png')}}" alt="" width="10%">
            <img class="img-thumbnail" src="{{ asset('dist/img/nagad.png')}}" alt="" width="10%">
        </div>
        <div class="text-center">

            <a href="{{ url('/home') }}">

                <h4 class="font-weight-strong font-weight-bolder text-warning"><strong>Sports</strong> <strong
                            class="text-white">Bet</strong></h4>
            </a>
            <strong>Copyright &copy; 2020 <a href="{{ url('/home') }}">Sports Bet</a>.</strong> All rights
            reserved. <br><strong class="text-danger">Caution!</strong> We strongly discourage to use this site who are
            not 18+ and also site administrator is not liable to any kind of issues created by user.
        </div>
    </footer>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
    $(document).ready(function(){
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>
<script>
    $('#lfm').filemanager('image');
    // var route_prefix = "/public/filemanager";
    // $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    })
</script>
@if ($message = Session::get('success'))
    <script>
        toastr.success('{{$message}}');
    </script>
@elseif($message = Session::get('info'))
    <script>
        toastr.info('{{$message}}');
    </script>
@elseif($message = Session::get('warning'))
    <script>
        toastr.warning('{{$message}}');
    </script>
@elseif($message = Session::get('danger'))
    <script>
        toastr.warning('{{$message}}');
    </script>
@endif






<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>

</body>
</html>