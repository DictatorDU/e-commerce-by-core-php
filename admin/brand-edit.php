<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand Change</h2>
                <div class="block copyblock">
                  <?php
                  if(isset($_GET['brand_id']) && $_GET["brand_id"] != NULL){
                    $id=$_GET["brand_id"];
                  ?>
                  <?php
                  if(isset($_POST["submit"])){
                    $brand = $_POST["brand"];
                    class upbrand{
                      private $tbl_name = "tbl_brand";
                      private $id;
                      private $brand;
                      public function id($id){
                        $this->id = $id;
                      }
                      public function brand($brand){
                        $this->brand = $brand;
                      }
                      public function query(){
                        $sql = "UPDATE $this->tbl_name SET brand_name=:brand WHERE id=:id";
                        $stmt = db::shopPrepare($sql);
                        $stmt->bindParam(":id",$this->id);
                        $stmt->bindParam(":brand",$this->brand);
                        return $stmt->execute();
                      }
                    }
                    $upbrandObj = new upbrand();
                    $upbrandObj->id($id);
                    $upbrandObj->brand($brand);
                    $upbrandObj->query();
                    if($upbrandObj->query()){
                      $_SESSION["edit_brand_suc"] = 1;
                      echo "<script>window.location='brand-list.php';</script>";
                    }else{
                      echo "<h4 style='color:red'>Something went wrong.</h4>";
                    }
                  }
                  ?>
                  <?php
                  class brandEdit{
                    private $tbl_name = "tbl_brand";
                    private $id;
                    public function id($id){
                      $this->id = $id;
                    }
                    public function query(){
                      $sql = "SELECT * FROM $this->tbl_name WHERE id=:id";
                      $stmt = db::shopPrepare($sql);
                      $stmt->bindParam(":id",$this->id);
                      $stmt->execute();
                      return $stmt->fetchAll();
                    }
                  }
                  $brandEditObj = new brandEdit();
                  $brandEditObj->id($id);
                  $brandEditObj->query();
                  foreach ($brandEditObj->query() as $value) {
                    $editgetResult = $value["brand_name"];
                  }
                  ?>
                  <form action="" method="post">
                     <table class="form">
                         <tr>
                             <td>
                                 <input type="text" value="<?php if(isset($editgetResult)){echo $editgetResult;} ?>" class="medium" name="brand" />
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <input type="submit" name="submit" Value="Change" />
                             </td>
                         </tr>
                     </table>
                     </form>
                   <?php }else{
                     echo "<script>window.location='404.php';</script>";
                   } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
