<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('assets'); ?>css/css.css" />
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
</script>
<script src="https://code.angularjs.org/1.2.6/angular-route.min.js"></script>
<script src="<?php echo $this->config->item('assets'); ?>js/main.js"></script>
</head>

<body ng-app="myApp" ng-controller="MainCtrl">
<div class="wrapper">

<!-- Preloading templates from templateCache -->
<!-- VIEW CONTAINER -->
<div ng-view></div>

<footer class="clear"><p><a href="#">Privacy Policy</a>   <a href="#">Terms & Conditions</a></p>

</footer>
</div>
</body>
</html>