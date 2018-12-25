<?php include("inc/header.php");?>
<?php if(isset($_GET["productId"]) && $_GET["productId"] != NULL){
  $id = $_GET["productId"];
  include("classes/preview.php");
  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
          <?php
          class readData{
            private $tbl_product = "tbl_product";
            private $tbl_cat = "tbl_cat";
            private $tbl_brand = "tbl_brand";
            private $id;
            public function id($id){
              $this->id = $id;
            }
            public function query(){
              $sql = "SELECT $this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
                      FROM $this->tbl_product
                      INNER JOIN $this->tbl_cat
                      ON $this->tbl_product.cat_id = $this->tbl_cat.id
                      INNER JOIN $this->tbl_brand
                      ON $this->tbl_product.brand_id = $this->tbl_brand.id
                      WHERE $this->tbl_product.id=:id";
             $stmt = db::shopPrepare($sql);
             $stmt->bindParam(":id",$this->id);
             $stmt->execute();
             return $stmt->fetchAll();
            }
          }
            $readDataObj = new readData();
            $readDataObj->query();
            $readDataObj->id($id);
            foreach ($readDataObj->query() as $value) {
            ?>
            <?php
            if(isset($_POST["submit"])){
              $quantity = $_POST["quantity"];
              $session_id = session_id();
              $pro_name =$value["product_name"];
              $pro_price = $value["price"];
              $total_price = $pro_price * $quantity;
              $img = $value["img"];
              class chkClass{
                private $tbl_name = "tbl_cart";
                private $pro_id;
                private $session_id;
                public function pro_id($id){
                  $this->pro_id = $id;
                }
                public function session_id($session_id){
                  $this->session_id = $session_id;
                }
                public function query(){
                  $sql = "SELECT * FROM $this->tbl_name WHERE product_id=:pro_id AND session_id=:session_id";
                  $stmt = db::shopPrepare($sql);
                  $stmt->bindParam(":pro_id",$this->pro_id);
                  $stmt->bindParam(":session_id",$this->session_id);
                  $stmt->execute();
                  if($stmt->rowCount()>0){
                    return true;
                  }else{
                    return false;
                  }
                }
              }
              $chkObj = new chkClass();
              $chkObj->pro_id($id);
              $chkObj->session_id($session_id);

              if($quantity<0){
                $emptyQuantity = "Plese select at least one product.";
              }elseif($chkObj->query() == true){
                $alreadyExits = "This product already exits in your cart.";
              }else{
                class orderInserClass{
                  private $tbl_name = "tbl_cart";
                  private $pro_id;
                  private $session_id;
                  private $pro_name;
                  private $quantity;
                  private $total_price;
                  private $pro_price;
                  private $img;
                  public function pro_id($id){
                    $this->pro_id = $id;
                  }
                  public function pro_name($pro_name){
                    $this->pro_name = $pro_name;
                  }
                  public function pro_price($pro_price){
                    $this->pro_price = $pro_price;
                  }
                  public function quantity($quantity){
                    $this->quantity = $quantity;
                  }
                  public function total_price($total_price){
                    $this->total_price = $total_price;
                  }
                  public function img($img){
                    $this->img = $img;
                  }
                  public function session_id($session_id){
                    $this->session_id = $session_id;
                  }
                  public function query(){
                    $sql = "INSERT INTO $this->tbl_name(product_id,product_name,price,quantity,total_price,img,session_id)
                    VALUES(:pro_id,:pro_name,:pro_price,:quantity,:total_price,:img,:session_id)";
                    $stmt = db::shopPrepare($sql);
                    $stmt->bindParam(":pro_id",$this->pro_id);
                    $stmt->bindParam(":pro_name",$this->pro_name);
                    $stmt->bindParam(":pro_price",$this->pro_price);
                    $stmt->bindParam(":quantity",$this->quantity);
                    $stmt->bindParam(":total_price",$this->total_price);
                    $stmt->bindParam(":img",$this->img);
                    $stmt->bindParam(":session_id",$this->session_id);
                    return $stmt->execute();
                  }
                }
                $orderObj = new orderInserClass();
                $orderObj->pro_id($id);
                $orderObj->pro_name($pro_name);
                $orderObj->pro_price($pro_price);
                $orderObj->quantity($quantity);
                $orderObj->total_price($total_price);
                $orderObj->img($img);
                $orderObj->session_id($session_id);
                if($orderObj->query()){
                  header("location:cart.php?buy_product=$session_id");
                }else{
                  header("404.php");
                }
              }
            }

            if(isset($_POST["compare"])){
              $session_id = session_id();
              $pro_name =$value["product_name"];
              $pro_price = $value["price"];
              $img = $value["img"];
              $brand = $value["brand_name"];
              $previewObj->pro_id($id);
              $previewObj->pro_name($pro_name);
              $previewObj->pro_price($pro_price);
              $previewObj->brand($brand);
              $previewObj->img($img);
              $previewObj->session_id($session_id);

              if($previewObj->compareChk() == true){
                $comparedalready = "<span style='color:red'>This product already exits in compare list.</span>";
              }else{
                if($previewObj->compareInert()){
                  $compareAdd = "<span style='color:#602D8D'>Added to compare list. Check compare list.</span>";
                 }
              }
            }

            if(isset($_POST["wishlist"])){
              $customer_id = session::get("customerId");
              $pro_name =$value["product_name"];
              $pro_price = $value["price"];
              $img = $value["img"];
              $brand = $value["brand_name"];

              $previewObj->customer_id($customer_id);
              $previewObj->pro_id($id);
              $previewObj->pro_name($pro_name);
              $previewObj->pro_price($pro_price);
              $previewObj->brand($brand);
              $previewObj->img($img);
              $previewObj->session_id($session_id);
              $logined = session::get("customer_login");
              if($logined == true){
              if($previewObj->wishChk() == true){
                $wishedalready = "<span style='color:red'>This product already exits in wish list.</span>";
              }else{
                if($previewObj->wishInert()){
                  $wishAdd = "<span style='color:#602D8D'>Added this product in you wish list.</span>";
                }
              }
            }else{header("location:login.php");}
          }
            ?>
          <?php if(isset($alreadyExits)){echo "<h2 style='color:red;'>".$alreadyExits."</h2>";}?>
					<div class="grid images_3_of_2">
						<img width="180px" src="admin/<?php echo $value["img"];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2 style="color:green;"><?php echo $value["product_name"];?></h2>
					<div class="price">
						<p>Price: <span>$<?php echo $value["price"];?></span></p>
						<p>Category: <span><?php echo $value["cat_name"];?></span></p>
						<p>Brand:<span><?php echo $value["brand_name"];?></span></p>
					</div>
				<div class="add-cart">

					<form action="" method="post">
            <?php if(isset($emptyQuantity)){echo "<span style='color:red;'>".$emptyQuantity."</span>";}?>
						<select class="" name="quantity">
              <option value="1">1</option>
              <option value="2">2</option>
            </select>

						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/><br>
            <?php if(isset($compareAdd)){echo $compareAdd;}?>
            <?php if(isset($wishAdd)){echo $wishAdd;}?>
            <?php if(isset($comparedalready)){echo $comparedalready;}?>
            <?php if(isset($wishedalready)){echo $wishedalready;}?>
            <br>
						<input type="submit" class="buysubmit" name="compare" value="Add to compare list"/>

            <input type="submit" class="buysubmit" name="wishlist" value="Save to wishlist"/>
					</form>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
      <p>
        <?php echo $value["details"];?>
      </p>
	    </div>
	</div>
<?php } ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
              <?php
              include("classes/catagory.php");
              foreach ($readCatObj->catRead() as $value) {
              ?>
				      <li><a href="productbycat.php?catagoryId=<?php echo $value["id"];?>"><?php echo $value["cat_name"];?></a></li>
            <?php } ?>
    			</ul>

 				</div>
 		</div>
 	</div>
	</div>
<?php }else{
  echo "<script>window.location='error/.htaccess';</script>";
} ?>
  <?php include("inc/footer.php");?>
