<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" X-Content-Type-Options="nosniff" http-equiv="Content-Type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Website</title>
      <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <?php include("partials/_head.php") ?>
</head>
<body>
  <?php 
  session_start();
  if(isset($_SESSION['user']))
  {

  }
  else
  {
    header("location:../views/login.php");
  }
  ?>
<div class="container-scroller"> 
<!--============ NAVBAR ===========-->
<?php include("partials/_navbar.php") ?>
<div class="container-fluid page-body-wrapper">
<?php include("partials/_sidebar.php")?>
</div>

</div>
<!--============ PLUGIN ===========-->
<!-- plugins:js -->
<?php include("partials/_plugin.php") ?>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  
  <!-- End custom js for this page-->
<!--============ END PLUGIN ===========-->
<!--============ FOOTER ===========-->
<?php include("partials/_footer.php") ?>
<!--============ ENDFOOTER ===========-->
</body>
</html>