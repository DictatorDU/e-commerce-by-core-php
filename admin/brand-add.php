<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                 <?php
                 if(isset($_POST["submit"])){
                   $brand = $formatObj->validation($_POST["brand"]);

                 if(empty($brand)){
                   $emptyCat = "Brand field empty";
                 }else{
                 class addcatClass{
                   private $tbl_name = "tbl_brand";
                   private $brand;
                   public function brand($brand){
                     $this->brand = $brand;
                   }
                   public function query(){
                     $sql = "INSERT INTO $this->tbl_name(brand_name) VALUES(:brand)";
                     $stmt = db::shopPrepare($sql);
                     $stmt->bindParam(":brand",$this->brand);
                     return $stmt->execute();
                   }
                 }
                 $catObj = new addcatClass();
                 $catObj->brand($brand);
                 if($catObj->query()){
                   echo "<h4 style='color:green'>You have successfully added '".$brand."' brand name.</h4>";
                 }else{
                   echo "<h4 style='color:red;'>Something went wrong.Not added.</h4>";
                 }
                }
               }
                 ?>
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" class="medium" name="brand" />
                            </td>
                        </tr>
				            		<tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
