<?php session_start(); ?>
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/angular/angular.js"></script>
  <script src="node_modules/angular-ui-router/release/angular-ui-router.js"></script>
  <script src="js/angularmodules/welcome_module.js"></script>
  <script src="js/angularmodules/categoria_module.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/sweetalert-master/dist/sweetalert.min.js"></script>
  <script src="node_modules/kartiv-fileinput/js/fileinput.min.js"></script>
 <!-- <script type="text/javascript">
    $(document).ready(function() {
    $("#Submit").click(function() {
        var btns = $('#goBack, #printRow');
        btns.hide(function () {
            window.print();
            btns.show();
        });
    });
});
  </script>-->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/welcome_styles.css">
  <link rel="stylesheet" href="node_modules/sweetalert-master/dist/sweetalert.css">
  <link rel="stylesheet" href="node_modules/kartiv-fileinput/css/fileinput.min.css">
  <title>Página principal</title> <!-- Change this title for each page -->
</head>
