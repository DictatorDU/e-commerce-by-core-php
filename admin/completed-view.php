<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(isset($_GET["complete_view"]) && $_GET["complete_view"] != NULL){
  $shipt_id = $_GET["complete_view"];
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
                <div class="block">
                  <style media="screen">
                    .divOne{width: 602px;min-height:360px;float: left;}
                    .divtwo{width: 602px;min-height:360px;float: right;border: 1px solid #e0d8d8;}
                    .tblOne{width: 600px;padding:5px 10px ;outline: 0;}
                    .tblTwo{width: 600px;padding:5px 10px ;outline: 0;}
                    .tblOne .tdColon{width: 5%;}
                    .tblOne .tdIn{width: 20%;}
                    .tblOne tr{border: 2px solid #e0d8d8;}
                    .tblOne tr:hover{background: #f1f1f1;}
                    .tblOne td{font-size: 18px;padding: 5px 10px;height: 35px;}
                    .tblTwo td{font-size: 18px;padding: 5px 10px;text-align: center;height: 35px;}
                    .tblOne .header{background: #e0d8d8;border-radius: 5px;}
                    .divtwo .header{background: #e0d8d8;}
                    .tblOne .header:hover{background: #e0d8d8;}
                    .tblOne .header td{text-align: center;}
                    .divtwo .subDivOne{width: 299px;height: 300px;float:left;border-right: 1px solid #e0d8d8}
                    .divtwo .subDivTwo{width: 299px;height: 40px;float:right;}
                    .divtwo .subDivTwo .tblThree{width: 300px;}
                    .divtwo .subDivTwo .tblThree tr td{padding: 5px 5px;}
                    .divtwo .subDivTwo .tblThree .colontwo{width: 5%;}
                    .divtwo .subDivTwo .tblThree .indicator{width: 43%;}
                    .proImg{margin-left: 23%;}
                    .show_more{text-align: right;}
                    .shipt {text-align: right;background: red;display: inline-block;color: #fff;padding: 5px 10px;border-radius: 3px;float: right;font-size: 20px;}
                  </style>
                   <div class="divOne">
                     <table class="tblOne">
                       <tr class="header">
                         <td colspan="3">Customer Details</td>
                       </tr>
                       <?php
                       include("classes/complete.php");
                       $completeObj->shipt_id($shipt_id);
                       foreach ($completeObj->completeviewlist() as $value) {
                         $customerName = $value["name"];
                       ?>
                       <tr>
                         <td class='tdIn'>Name</td>
                         <td class='tdColon'>:</td>
                         <td><?php echo $value["name"];?></td>
                       </tr>
                       <tr>
                         <td>E-mail</td>
                         <td>:</td>
                         <td><?php echo $value["email"];?></td>
                       </tr>
                       <tr>
                         <td>Phone</td>
                         <td>:</td>
                         <td><?php echo $value["phone"];?></td>
                       </tr>
                       <tr>
                         <td>address</td>
                         <td>:</td>
                         <td><?php echo $value["address"];?></td>
                       </tr>
                       <tr>
                         <td>Zip-code</td>
                         <td>:</td>
                         <td><?php echo $value["zip"];?></td>
                       </tr>
                       <tr>
                         <td>City</td>
                         <td>:</td>
                         <td><?php echo $value["city"];?></td>
                       </tr>
                       <tr>
                         <td>Country</td>
                         <td>:</td>
                         <td><?php echo $value["country"];?></td>
                       </tr>
                     <?php } ?>
                     </table>
                   </div>
                   <div class="divtwo">
                      <table class="tblTwo">
                        <tr>
                          <td class="header">Product Details</td>
                        </tr>
                      </table>
                      <?php
                      foreach ($completeObj->completeviewlist() as $value) {
                        $product_id = $value["product_id"];
                        ?>
                      <div class="subDivOne">
                          <img class='proImg' width="150px" src="<?php echo $value['img'];?>" alt="">
                      </div>
                      <div class="subDivTwo">
                          <table class="tblThree">
                            <tr>
                              <td class="indicator">Product Name</td>
                              <td class="colontwo">:</td>
                              <td><?php echo $value['product_name'];?></td>
                            </tr>
                            <tr>
                              <td>Quantity</td>
                              <td>:</td>
                              <td><?php echo $value['quantity'];?></td>
                            </tr>
                            <tr>
                              <td>Total Price (+VAT)</td>
                              <td>:</td>
                              <td>$ <?php echo $value['total_price'];?></td>
                            </tr>
                            <?php } ?>
                            <?php
                            foreach ($completeObj->brandAndCat() as $value) {
                            ?>
                            <tr>
                              <td>Brand</td>
                              <td>:</td>
                              <td><?php echo $value["brand_name"]?></td>
                            </tr>
                            <tr>
                              <td>Catagory</td>
                              <td>:</td>
                              <td><?php echo $value["cat_name"]?></td>
                            </tr>
                          <?php } ?>
                          </table>
                      </div>
                   </div>
            </div>
        </div>
<?php }else{echo "<script>window.location='404.php';</script>";} ?>
<?php include 'inc/footer.php';?>
