<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Catagory Delete</h2>
                <div class="block">
                  <?php
                  if(isset($_GET["delete_catagory"]) && $_GET["delete_catagory"] != NULL){
                    $id = $_GET["delete_catagory"];
                  class delCat{
                    private $tbl_name = "tbl_cat";
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
                  $delCatObj = new delCat();
                  $delCatObj->id($id);
                  $delCatObj->query();
                  if($delCatObj->query()){
                    $_SESSION["del_cat_suc"] = 1;
                    echo "<script>window.location='catagory-list.php';</script>";
                  }
                }else{
                  echo "<script>window.location='404.php';</script>";
                }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
