<?php
include("connection/db.php");
include("helper/format.php");
$formatObj = new Format();
include("helper/session.php");
session::init();
include("classes/contact.php");
include("classes/others.php");
?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
  <?php
  $path = $_SERVER['SCRIPT_FILENAME'];
  $c_page = basename($path,".php");
  ?>
  <title><?php if(isset($c_page)){echo $c_page;}?> - Store website</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <style media="screen">
  .logo{float:left;width:30%;}
  .header_top_right{float:left;width:69%;margin-top:35px;}
  </style>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php?buy_product=<?php echo session_id();?>" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="">
                  <?php
                  $session_id = session_id();
                  class chkClassTotal{
                    private $tbl_name = 'tbl_cart';
                    private $session_id;
                    public function session_id($session_id){
                      $this->session_id = $session_id;
                    }
                    public function query(){
                      $sql = "SELECT * FROM $this->tbl_name WHERE session_id=:session_id";
                      $stmt = db::shopPrepare($sql);
                      $stmt->bindParam(":session_id",$this->session_id);
                      $stmt->execute();
                      return $stmt->fetchAll();
                    }
                  }
                  $chkClassObj = new chkClassTotal();
                  $chkClassObj->session_id($session_id);
                  $qn = 0;
                  $totalPrice = 0;
                  foreach ($chkClassObj->query() as $value) {
                    $qn = $qn+$value["quantity"];
                    $totalPrice = $totalPrice+$value["total_price"];
                    $vat = $totalPrice/100*5;
                    $priceResult = $vat+$totalPrice;
                  }
                if(isset($priceResult)){
                  echo "$".$priceResult;
                }else{
                  echo "<span class='no_product'>(Empty)</span>";
                }
                if(isset($qn)){
                  echo " <span class='no_product'>(".$qn.")</span>";
                }else{
                  echo "<span class='no_product'>(0)</span>";
                }
                  ?>
                </span>
							</a>
						</div>
			      </div>
		   <div class="login">
         <?php
         $signined = session::get("customer_login");
         if($signined == true){
         echo '<a href="logout.php?action=logout">Logout</a>';
       }else{
         echo '<a href="login.php">Login</a>';
       }
         ?>
       </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
 <style media="screen">
 ul.dc_mm-orange li a{color:#fff;display:block;float:left;font-size:15px;padding:12px 17px;text-decoration:none;text-shadow:1px 1px 1px #000;text-transform:uppercase;font-family:'Doppio One', sans-serif;border-left:2px groove #636363;}
 #active_menu{color: #FFF;filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#70389c',endColorstr='#602d8d');background: -webkit-gradient(linear,left top,left bottom,from(#70389C),to(#602D8D));background: -moz-linear-gradient(top,#70389C,#602D8D);	background: -o-linear-gradient(top,#70389C,#602D8D);background: -ms-linear-gradient(top,#70389C,#602D8D);}
 </style>
<div class="menu">
  <?php
  $path = $_SERVER['SCRIPT_FILENAME'];
  $c_page = basename($path,".php");
  ?>
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a
      <?php
      $indexArr = array("index");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="index.php">Home</a></li>
	  <li><a
      <?php
      $indexArr = array("cart-del","cart");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="cart.php?buy_product=<?php echo session_id();?>">Cart</a></li>
	  <li><a
      <?php
      $indexArr = array("compare");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="compare.php?compare=<?php echo session_id();?>">Compare</a></li>
    <?php
    $logined = session::get("customer_login");
    $customer_id = session::get("customerId");
    if($logined == true){?>
    <li><a
      <?php
      $indexArr = array("wish-list");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="wish-list.php?customerId=<?php echo $customer_id;?>">Wishlist</a> </li>
    <?php } ?>
    <?php
    if($logined == true){?>
    <li><a
      <?php
      $indexArr = array("profile","profile-update");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="profile.php">PROFILE</a> </li>
    <li><a
      <?php
      $indexArr = array("order-detials","order","success-order");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="order-detials.php">Order</a> </li>
  <?php } ?>
    <li><a
      <?php
      $indexArr = array("payment","offline-payment");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="payment.php">Payment</a> </li>
	  <li><a
      <?php
      $indexArr = array("contact");
      if(in_array($c_page,$indexArr)){echo "id='active_menu'";}
      ?>
      href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
