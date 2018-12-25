<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                 <?php
                 if(isset($_POST["submit"])){
                   $catagory = $formatObj->validation($_POST["catagory"]);

                 if(empty($catagory)){
                   $emptyCat = "Catagory field empty";
                 }else{
                 class addcatClass{
                   private $tbl_name = "tbl_cat";
                   private $catagory;
                   public function catagory($catagory){
                     $this->catagory = $catagory;
                   }
                   public function query(){
                     $sql = "INSERT INTO $this->tbl_name(cat_name) VALUES(:catagory)";
                     $stmt = db::shopPrepare($sql);
                     $stmt->bindParam(":catagory",$this->catagory);
                     return $stmt->execute();
                   }
                 }
                 $catObj = new addcatClass();
                 $catObj->catagory($catagory);
                 if($catObj->query()){
                   echo "<h4 style='color:green'>You have successfully added '".$catagory."' catagory name.</h4>";
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
                                <input type="text" class="medium" name="catagory" />
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
