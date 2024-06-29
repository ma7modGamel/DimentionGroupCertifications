<meta charset="utf-8">
<title>{{ config('app.name') }}</title>
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
<meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
<meta name="robots" content="noindex,nofollow">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href='{{asset("admin/assets/images/logo/logo.png")}}'>



<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/fontawesome-free/css/all.min.css")}}'>
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}'>
<!-- iCheck -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}'>
<!-- JQVMap -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/jqvmap/jqvmap.min.css")}}'>
<!-- Theme style -->
<link rel="stylesheet" href='{{asset("admin/assets/dist/css/adminlte.min.css")}}'>
<link rel="stylesheet" href='https://rvera.github.io/image-picker/image-picker/image-picker.css'>
<!-- overlayScrollbars -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}'>
<!-- Daterange picker -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/daterangepicker/daterangepicker.css")}}'>
<!-- summernote -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/summernote/summernote-bs4.min.css")}}'>

<!-- DataTables -->
<link rel="stylesheet" href='{{asset("admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}'>
<link rel="stylesheet" href='{{asset("admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}'>
<link rel="stylesheet" href='{{asset("admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}'>
<link rel="stylesheet" href='{{asset("admin/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css")}}'>

<style>
  .body {
    width: 100%;
    background: #fff;
    overflow: hidden;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    flex-direction: row-reverse;
  }
  .login-page {
    /*background-image: url({{asset("admin/assets/images/banner_bg-copy1-copy1.webp")}});*/
     background-image: url({{asset("admin/assets/images/certificate2.png")}});
    background-size: cover;
    background-position: center;
    position: relative;
    z-index: 1;
    width: calc(100% - 421px);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    position: relative;
    z-index: 1;
  }
  .login-box {
    width: unset !important;
    min-height: 100vh;
    display: block;
    padding: 173px 55px 55px 55px;
  }
  .elementor-background-overlay {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    position: absolute;
    background-color: transparent;
    opacity: .65;
    transition: background .3s,border-radius .3s,opacity .3s;
  }
  .content-wrapper > .content {
    padding: 0 .5rem;
    min-height: 600px;
  }
  table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
    border-bottom-width: 0;
    text-align: center;
    vertical-align: middle;
  }
  ul.thumbnails.image_picker_selector li .thumbnail img {
    width: 100px;
  }
</style>

  
<!--js includes-->
<!--JQuery-->
<script src='{{asset("admin/assets/plugins/jquery/jquery.min.js")}}'></script>
<!-- Bootstrap 4 -->
<script src='{{asset("admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}'></script>

<!-- jQuery UI 1.11.4 -->
<script src='{{asset("admin/assets/plugins/jquery-ui/jquery-ui.min.js")}}'></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src='{{asset("admin/assets/plugins/chart.js/Chart.min.js")}}'></script>
<!-- Sparkline -->
<script src='{{asset("admin/assets/plugins/sparklines/sparkline.js")}}'></script>
<!-- JQVMap -->
<script src='{{asset("admin/assets/plugins/jqvmap/jquery.vmap.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js")}}'></script>
<!-- jQuery Knob Chart -->
<script src='{{asset("admin/assets/plugins/jquery-knob/jquery.knob.min.js")}}'></script>
<!-- daterangepicker -->
<script src='{{asset("admin/assets/plugins/moment/moment.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/daterangepicker/daterangepicker.js")}}'></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src='{{asset("admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}'></script>
<!-- Summernote -->
<script src='{{asset("admin/assets/plugins/summernote/summernote-bs4.min.js")}}'></script>
<!-- overlayScrollbars -->
<script src='{{asset("admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{asset("admin/assets/dist/js/adminlte.js")}}'></script>
<!-- AdminLTE for demo purposes -->

<script src='{{asset("admin/assets/dist/js/pages/dashboard.js")}}'></script>

<!-- DataTables  & Plugins -->
<script src='{{asset("admin/assets/plugins/datatables/jquery.dataTables.min.js")}}'></script></script>
<script src='{{asset("admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/jszip/jszip.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/pdfmake/pdfmake.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/pdfmake/vfs_fonts.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-buttons/js/buttons.print.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/sweetalert2/sweetalert2.min.js")}}'></script>
<script src='{{asset("admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}'></script>
<script src='https://rvera.github.io/image-picker/image-picker/image-picker.js'></script>
<script src='https://rvera.github.io/image-picker/js/jquery.masonry.min.js'></script>
<!-- AdminLTE App -->