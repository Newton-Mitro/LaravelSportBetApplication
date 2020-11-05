
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo e(asset('images/holidays.png')); ?>">
    <title><?php echo e(config('app.name','Application Name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<?php
    $setting = \App\Setting::find(1);
?>
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo e(url('')); ?>" class="nav-link">Visit Frontend Site</a>
            </li>
        </ul>
        <form action="<?php echo e(route('logout')); ?>" method="post" class="ml-auto"><?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-dark text-left" style="width: 100%">
                <i class="nav-icon fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo e(route('home')); ?>" class="brand-link">
            <img src="<?php echo e(asset('images/holidays.png')); ?>"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"><?php echo e(config('app.name','App Title')); ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo e((auth()->user()->avatar == null) ? (asset('images/nature.png') ): (auth()->user()->avatar)); ?>"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?php echo e(route('user.show',['id'=>auth()->user()->id])); ?>"
                       class="d-block"><?php echo e(auth()->user()->name); ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <?php if(Auth::user()->role_id == 1): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e((Request::segment(1)=='home')?'active':''); ?>">
                                <i class="nav-icon fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('slider.index')); ?>" class="nav-link <?php echo e((Request::segment(1)=='sliders')?'active':''); ?>">
                                <i class="nav-icon fas fa-home"></i> Sliders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('team.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='teams')?'active':''); ?>">
                                <i class="nav-icon fab fa-mailchimp"></i> Teams/Players
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('sport.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='sports')?'active':''); ?>">
                                <i class="nav-icon fas fa-table-tennis"></i> Sports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('match.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='matches')?'active':''); ?>">
                                <i class="nav-icon fas fa-chess"></i> Matches
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bettingQuestion.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bettingQuestions')?'active':''); ?>">
                                <i class="nav-icon fab fa-fedora"></i> Betting Questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bettingChoice.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bettingChoices')?'active':''); ?>">
                                <i class="nav-icon fas fa-jedi"></i> Betting Choices
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('club.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='clubs')?'active':''); ?>">
                                <i class="nav-icon fab fa-accusoft"></i> Clubs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('deposit.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='deposits')?'active':''); ?>">
                                <i class="nav-icon fas fa-hand-holding-usd"></i> Deposit Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('withdraw.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='withdraws')?'active':''); ?>">
                                <i class="nav-icon fas fa-money-bill-alt"></i> Withdraws Requests
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('transaction.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='transactions')?'active':''); ?>">
                                <i class="nav-icon fas fa-handshake"></i> All Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bet.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bets')?'active':''); ?>">
                                <i class="nav-icon fas fa-trophy"></i> Bet History
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='users')?'active':''); ?>">
                                <i class="nav-icon fab fa-teamspeak"></i> All User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('setting.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('create.phone')); ?>" class="nav-link">
                                <i class="fas fa-blender-phone"></i> Add Phone Numbers
                            </a>
                        </li>
                        <?php elseif(Auth::user()->role_id == 2): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e((Request::segment(1)=='home')?'active':''); ?>">
                                <i class="nav-icon fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('slider.index')); ?>" class="nav-link <?php echo e((Request::segment(1)=='sliders')?'active':''); ?>">
                                <i class="nav-icon fas fa-home"></i> Sliders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('team.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='teams')?'active':''); ?>">
                                <i class="nav-icon fab fa-mailchimp"></i> Teams/Players
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('sport.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='sports')?'active':''); ?>">
                                <i class="nav-icon fas fa-table-tennis"></i> Sports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('match.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='matches')?'active':''); ?>">
                                <i class="nav-icon fas fa-chess"></i> Matches
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bettingQuestion.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bettingQuestions')?'active':''); ?>">
                                <i class="nav-icon fab fa-fedora"></i> Betting Questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bettingChoice.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bettingChoices')?'active':''); ?>">
                                <i class="nav-icon fas fa-jedi"></i> Betting Choices
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('club.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='clubs')?'active':''); ?>">
                                <i class="nav-icon fab fa-accusoft"></i> Clubs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('deposit.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='deposits')?'active':''); ?>">
                                <i class="nav-icon fas fa-hand-holding-usd"></i> Deposit Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('withdraw.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='withdraws')?'active':''); ?>">
                                <i class="nav-icon fas fa-money-bill-alt"></i> Withdraws Requests
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('transaction.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='transactions')?'active':''); ?>">
                                <i class="nav-icon fas fa-handshake"></i> All Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bet.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bets')?'active':''); ?>">
                                <i class="nav-icon fas fa-trophy"></i> Bet History
                            </a>
                        </li>
                        <li class="nav-item border-bottom border-secondary mt-2 mb-2"></li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='users')?'active':''); ?>">
                                <i class="nav-icon fab fa-teamspeak"></i> All User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('setting.index')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('create.phone')); ?>" class="nav-link">
                                <i class="fas fa-blender-phone"></i> Add Phone Numbers
                            </a>
                        </li>
                    <?php elseif(Auth::user()->role_id == 5): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('team.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='teams')?'active':''); ?>">
                                <i class="nav-icon fab fa-mailchimp"></i> Teams/Players
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('sport.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='sports')?'active':''); ?>">
                                <i class="nav-icon fas fa-table-tennis"></i> Sports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('match.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='matches')?'active':''); ?>">
                                <i class="nav-icon fas fa-chess"></i> Matches
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('bettingQuestion.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='bettingQuestions')?'active':''); ?>">
                                <i class="nav-icon fab fa-fedora"></i> Betting Questions
                            </a>
                        </li>
                    <?php elseif(Auth::user()->role_id == 3): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('deposit.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='deposits')?'active':''); ?>">
                                <i class="nav-icon fas fa-hand-holding-usd"></i> Deposit Requests
                            </a>
                        </li>
                    <?php elseif(Auth::user()->role_id == 4): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('withdraw.index')); ?>"
                               class="nav-link <?php echo e((Request::segment(1)=='withdraws')?'active':''); ?>">
                                <i class="nav-icon fas fa-money-bill-alt"></i> Withdraws Requests
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $__env->yieldContent('content'); ?>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <a href="" target="_blank">Developer: Denton Studio</a>
        </div>
        <strong>Copyright &copy; 2020</strong> All rights
        reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo e(asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo e(asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo e(asset('plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('plugins/toastr/toastr.min.js')); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo e(asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
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
<?php if($message = Session::get('success')): ?>
    <script>
        toastr.success('<?php echo e($message); ?>');
    </script>
<?php elseif($message = Session::get('info')): ?>
    <script>
        toastr.info('<?php echo e($message); ?>');
    </script>
<?php elseif($message = Session::get('warning')): ?>
    <script>
        toastr.warning('<?php echo e($message); ?>');
    </script>
<?php elseif($message = Session::get('danger')): ?>
    <script>
        toastr.warning('<?php echo e($message); ?>');
    </script>
<?php endif; ?>


<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\eBet\resources\views/layouts/admin.blade.php ENDPATH**/ ?>