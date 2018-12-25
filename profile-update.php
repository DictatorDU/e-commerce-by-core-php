<?php include("inc/header.php");
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
?>
<div class="main">
   <div class="content">
     <div class="section group">
       <style media="screen">
         .tbltwo{width: 550px;margin: 0 auto;border:1px solid #f1f1f1;padding: 5px 10px;}
         .tbltwo tr td{text-align: justify;color:#676756cf;padding: 5px 10px;}
         .tbltwo input[type="text"]{width: 350px;font-size: 15px;color: black;padding: 8px;outline: none;margin: 6px 0;    background: #f5f5f55e;border: 2px solid #f1f1f1;}
         .tbltwo input[type='submit']{background: #333;color: #fff;padding: 9px 24px;font-size: 20px;border-radius: 5px;border: 2px solid #fff;}
         .tbltwo input[type='submit']:hover {background: #6b6161;color: #f1f1f1;}
       </style>
       <?php
       $user_id = session::get("customerId");
       class profileClass{
         private $tbl_customer = "tbl_customer";
         private $user_id;
         public function user_id($user_id){
           $this->user_id = $user_id;
         }
         public function query(){
           $sql = "SELECT * FROM $this->tbl_customer WHERE id=:user_id";
           $stmt = db::shopPrepare($sql);
           $stmt->bindParam(":user_id",$this->user_id);
           $stmt->execute();
           return $stmt->fetchAll();
         }
       }
       if(isset($_POST["submit"])){
         $name = $formatObj->validation($_POST["name"]);
         $address = $formatObj->validation($_POST["address"]);
         $city = $formatObj->validation($_POST["city"]);
         $zip = $formatObj->validation($_POST["zip"]);
         $email = $formatObj->validation($_POST["email"]);
         $country = $formatObj->validation($_POST["country"]);
         $phone = $formatObj->validation($_POST["phone"]);

         $nameExpration = "/^([a-zA-Z]+.{5})?([ ])*([a-zA-Z ])+$/";

         if(empty($name)){
           $emptyName = "Name is required";
         }elseif(!preg_match($nameExpration,$name)){
           $invalidName = "Invalid phone number";
         }elseif(empty($address)){
           $emptyAddress = "Address field required";
         }elseif(empty($city)){
           $emptyCity = "City field is required";
         }elseif(empty($zip)){
           $emptyZip = "Zip Code field is required";
         }elseif(empty($email)){
           $emptyEmail = "Email field is required";
         }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
           $invalidEmail = "Invalid email address";
         }elseif(empty($country)){
           $emptyCountry = "Country field is required";
         }elseif(empty($phone)){
           $emptyPhone = "Phone number field is required.";
         }else{
           $user_id = session::get("customerId");
           include("classes/profile-update.php");
           $profileUpObj->user_id($user_id);
           $profileUpObj->email($email);
           $profileUpObj->phone($phone);
           $profileUpObj->name($name);
           $profileUpObj->address($address);
           $profileUpObj->city($city);
           $profileUpObj->zip($zip);
           $profileUpObj->country($country);
           $profileUpObj->query();
             if($profileUpObj->query()){
               header("location:profile.php");
             }else{
               echo "<h5 style='color:red'>Something went wrong.</h5>";
             }
         }
       }
       $profileObj = new profileClass();
       $profileObj->user_id($user_id);
       $profileObj->query();
       foreach ($profileObj->query() as $value) {
       ?>
       <form class="" action="" method="post">
       <table class="tbltwo">
         <tr>
           <td colspan="2"><h2>Edit your profile</h2></td>
         </tr>
          <tr>
            <td width="25%">Name</td>
            <td><input type="text" name="name" value="<?php echo $value["name"];?>"></td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td><input type="text" name="phone" value="<?php echo $value["phone"];?>"></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" value="<?php echo $value["email"];?>"></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $value["address"];?>"></td>
          </tr>
          <tr>
            <td>Zip-code</td>
            <td><input type="text" name="zip" value="<?php echo $value["zip"];?>"></td>
          </tr>
          <tr>
            <td>City</td>
            <td><input type="text" name="city" value="<?php echo $value["city"];?>"></td>
          </tr>
          <tr>
            <td>Country</td>
            <td><input type="text" name="country" value="<?php echo $value["country"];?>"></td>
          </tr>
          <tr>
            <td></td>
            <td><input class="subBtn" type="submit" name='submit' value='Save'></td>
          </tr>
       </table>
     </form>
     <?php } ?>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
