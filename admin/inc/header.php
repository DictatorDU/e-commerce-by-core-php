<?php
include("connection/db.php");
include("helper/format.php");
$formatObj = new Format();
include("helper/session.php");
session::admin_init();
session::chkSession();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <?php
    $path = $_SERVER['SCRIPT_FILENAME'];
    $c_page = basename($path,".php");
    ?>
    <title><?php if(isset($c_page)){echo $c_page;}?> - Admin of Store </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
<style media="screen">
<style media="screen">
.box.first {
  min-height: 484px;
}
</style>
</head>
<body>
<div class="container_12">
<div class="grid_12 header-repeat">
  <div id="branding">
      <div class="floatleft logo">
          <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Training with live project</h1>
					<p>www.trainingwithliveproject.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <?php
                            if(isset($_GET["action"]) && $_GET["action"] == "logout"){
                                 session::sessionDestroy();
                            }
                            ?>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
    <?php
    $path = $_SERVER['SCRIPT_FILENAME'];
    $c_page = basename($path,".php");
    ?>
    <ul class="nav main">
      <style media="screen">
        #menu{
          background: #204562;
        }
      </style>
        <li class="ic-dashboard"><a
          <?php $indexArr = array("index")?>
          <?php if(in_array($c_page,$indexArr)){echo "id='menu'";}?>
          href="index.php"><span>Dashboard</span></a>
        </li>
        <li class="ic-form-style"><a
          <?php $profileArr = array("profile")?>
          <?php if(in_array($c_page,$profileArr)){echo "id='menu'";}?>
          href="#"><span>User Profile</span></a>
        </li>
				<li class="ic-typography"><a
          <?php $cngPassArr = array("changepassword")?>
          <?php if(in_array($c_page,$cngPassArr)){echo "id='menu'";}?>
           href="changepassword.php"><span>Change Password</span></a>
         </li>
				<li class="ic-grid-tables"><a
          <?php $orderArr = array("order-same-customer","order-view","order")?>
          <?php if(in_array($c_page,$orderArr)){echo "id='menu'";}?>
          <?php
          include("classes/header.php");
          ?>
          href="order.php"><span>Order (<?php echo $headerObj->order_count();?>)</span></a>
        </li>
        <li class="ic-charts"><a
          <?php $shiptArr = array("shipted","shipted-view")?>
          <?php if(in_array($c_page,$shiptArr)){echo "id='menu'";}?>
          href="shipted.php"><span>Shipted (<?php echo $headerObj->shiptCount();?>)</span></a>
        </li>
        <li class="ic-charts"><a
          <?php $completeArr = array("complete","completed-view")?>
          <?php if(in_array($c_page,$completeArr)){echo "id='menu'";}?>
          href="complete.php"><span>Completed</span></a>
        </li>
        <li class="ic-charts"><a
          <?php $websiteArr = array("website")?>
          <?php if(in_array($c_page,$websiteArr)){echo "id='menu'";}?>
          href="website.php"><span>Visit Website</span></a>
        </li>
    </ul>
        </div>
        <div class="clear">
        </div>
