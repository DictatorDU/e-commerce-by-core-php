<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'classes/others.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">  
        <?php 
        if(isset($_POST['submit'])){
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $googleplus = $_POST['googleplus'];
            if(empty($facebook)){
                echo "<span style='color:red'>Empty Facebook</span>";
            }elseif(empty($twitter)){
                echo "<span style='color:red'>Empty Twitter</span>";
            }elseif(empty($linkedin)){
                echo "<span style='color:red'>Empty LinkedIn</span>"; 
            }elseif(empty($googleplus)){
                echo "<span style='color:red'>Empty Google+</span>";
            }elseif(!filter_var($facebook,FILTER_VALIDATE_URL)){
                echo "<span style='color:red'>Empty Facebook</span>";
            }elseif(!filter_var($twitter,FILTER_VALIDATE_URL)){
                echo "<span style='color:red'>Empty Twitter</span>";
            }elseif(!filter_var($linkedin,FILTER_VALIDATE_URL)){
                echo "<span style='color:red'>Empty LinkedIn</span>";
            }elseif(!filter_var($googleplus,FILTER_VALIDATE_URL)){
                echo "<span style='color:red'>Empty Google+</span>";
            }else{
                $othersObj->facebook($facebook);
                $othersObj->twitter($twitter);
                $othersObj->googleplus($googleplus);
                $othersObj->linkedin($linkedin);
                if($othersObj->socileUp()){
                    echo "<hs style='color:green'>You haves successfully </hs>";
                }else{
                    echo "<hs style='color:red'><strong>Error! </strong>Something went wrong.</hs>";
                }
            }
        }
        ?>             
         <form action="" method="post">
            <?php foreach($othersObj->socileSelect() as $value){ ?>
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $value['fb'] ?>" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $value['twitter'] ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $value['linkedin'] ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="googleplus" value="<?php echo $value['googleplus'] ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
           <?php } ?>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>