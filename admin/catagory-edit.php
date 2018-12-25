<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Catagory Change</h2>
                <div class="block copyblock">
                  <?php
                  if(isset($_GET['cat_id']) && $_GET["cat_id"] != NULL){
                    $id=$_GET["cat_id"];
                  ?>
                  <?php
                  if(isset($_POST["submit"])){
                    $catagory = $_POST["catagory"];
                    class upCat{
                      private $tbl_name = "tbl_cat";
                      private $id;
                      private $catagory;
                      public function id($id){
                        $this->id = $id;
                      }
                      public function catagory($catagory){
                        $this->catagory = $catagory;
                      }
                      public function query(){
                        $sql = "UPDATE $this->tbl_name SET cat_name=:catagory WHERE id=:id";
                        $stmt = db::shopPrepare($sql);
                        $stmt->bindParam(":id",$this->id);
                        $stmt->bindParam(":catagory",$this->catagory);
                        return $stmt->execute();
                      }
                    }
                    $upCatObj = new upCat();
                    $upCatObj->id($id);
                    $upCatObj->catagory($catagory);
                    $upCatObj->query();
                    if($upCatObj->query()){
                      $_SESSION["edit_cat_suc"] = 1;
                      echo "<script>window.location='catagory-list.php';</script>";
                    }else{
                      echo "<h4 style='color:red'>Something went wrong.</h4>";
                    }
                  }
                  ?>
                  <?php
                  class catEdit{
                    private $tbl_name = "tbl_cat";
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
                  $catEditObj = new catEdit();
                  $catEditObj->id($id);
                  $catEditObj->query();
                  foreach ($catEditObj->query() as $value) {
                    $editgetResult = $value["cat_name"];
                  }
                  ?>
                  <form action="" method="post">
                     <table class="form">
                         <tr>
                             <td>
                                 <input type="text" value="<?php if(isset($editgetResult)){echo $editgetResult;} ?>" class="medium" name="catagory" />
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
