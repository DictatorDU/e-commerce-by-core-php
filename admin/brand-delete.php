<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand Delete</h2>
                <div class="block">
                  <?php
                  if(isset($_GET["delete_brand"]) && $_GET["delete_brand"] != NULL){
                    $id = $_GET["delete_brand"];
                  class delbrand{
                    private $tbl_name = "tbl_brand";
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
                  $delbrandObj = new delbrand();
                  $delbrandObj->id($id);
                  $delbrandObj->query();
                  if($delbrandObj->query()){
                    $_SESSION["del_brand_suc"] = 1;
                    echo "<script>window.location='brand-list.php';</script>";
                  }
                }else{
                  echo "<script>window.location='404.php';</script>";
                }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
