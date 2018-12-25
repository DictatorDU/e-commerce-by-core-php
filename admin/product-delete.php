<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Delete Product</h2>
                <div class="block">
                  <?php
                  if(isset($_GET["productId"]) && $_GET["productId"] != NULL){
                    $id = $_GET["productId"];
                    class deleteClass{
                      private $tbl_name = "tbl_product";
                      private $id;
                      public function id($id){
                        $this->id = $id;
                      }
                      public function query(){
                        $sql = "DELETE FROM $this->tbl_name WHERE id=:id";
                        $stmt = db::shopPrepare($sql);
                        $stmt->bindParam(":id",$this->id);
                        return $stmt->execute();
                      }
                    }
                    $deleteObj = new deleteClass();
                    $deleteObj->id($id);
                    $deleteObj->query();
                    if($deleteObj->query()){
                      $_SESSION["productUpSuc"] = 1;
                      echo "<script>window.location='product-list.php';</script>";
                    }else{
                      echo "<h4 style='color:red'>Something went wrong.</h4>";
                    }
                  }else{
                    echo "<script>window.location='404.php';</script>";
                  }
                  ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
