<?php include("inc/header.php");?>
<?php
$signined = session::get("customer_login");
if($signined == true){
  header("location:index.php");
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
          <?php
          if(isset($_POST["sign_in"])){
             $logEmail = $_POST['email'];
             $logPassword = $_POST['password'];
             include("classes/login-chk.php");
             $loginchkObj = new loginChk();
             $loginchkObj->login_email($logEmail);
             foreach ($loginchkObj->passChkquery() as $value) {
               $passLogResult = $value["password"];
             }

             if(empty($logEmail)){
               $emptylogMail = "<small style='color:red'>Empty email field</small>";
             }elseif($loginchkObj->login_emailChkquery() == false){
               $notFoundEmail = "<small style='color:red'>Email address not found.</small>";
             }elseif(empty($logPassword)){
               $emptylogPass = "<small style='color:red'>Empty password field</small>";
             }elseif(!filter_var($logEmail,FILTER_VALIDATE_EMAIL)){
               $invalidLogMail = "<small style='color:red'>Invalid E-mail.</small>";
             }elseif($passLogResult != $logPassword){
               $notMatchPass = "<small style='color:red'>Password not match.</small>";
             }else{
               foreach ($loginchkObj->passChkquery() as $value) {
                session::set("customer_login",true);
                session::set("customerId",$value["id"]);
                header("location:payment.php");
               }
             }
          }
          ?>
        <form action="" method="post" id="member">
          <?php
          if(isset($emptylogMail)){echo $emptylogMail;}
          if(isset($emptylogPass)){echo $emptylogPass;}
          if(isset($invalidLogMail)){echo $invalidLogMail;}
          if(isset($notFoundEmail)){echo $notFoundEmail;}
          if(isset($notMatchPass)){echo $notMatchPass;}
          ?>
      	  <input name="email" type="text" <?php if(isset($logEmail)){echo "value='$logEmail'";}else{echo "placeholder='E-mail'";}?>
          class="field">
          <input name="password" type="password" <?php if(isset($logPassword)){echo "value='$logPassword'";}else{echo "placeholder='Password'";}?> class="field">
          <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
          <div class="buttons"><div><button name='sign_in' class="grey">Sign In</button></div></div>
        </form>
          </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
        <?php
        if(isset($_POST["create"])){
          $name = $formatObj->validation($_POST["name"]);
          $address = $formatObj->validation($_POST["address"]);
          $city = $formatObj->validation($_POST["city"]);
          $zip = $formatObj->validation($_POST["zip"]);
          $email = $formatObj->validation($_POST["email"]);
          $country = $formatObj->validation($_POST["country"]);
          $phone = $formatObj->validation($_POST["phone"]);
          $password = $_POST["password"];

          $nameExpration = "/^([a-zA-Z]+.{5})?([ ])*([a-zA-Z ])+$/";
          include("classes/signup.php");
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
          }elseif($signUpClassObj->emailQuery() == true){
             $exitsEmail = "The E-mail address already exits,";
          }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $invalidEmail = "Invalid email address";
          }elseif(empty($country)){
            $emptyCountry = "Country field is required";
          }elseif(empty($phone)){
            $emptyPhone = "Phone number field is required.";
          }elseif($signUpClassObj->phoneQuery() == true){
            $exisPhone = "The phone number already exits.";
          }elseif(empty($password)){
            $emptyPass = "Password field is empty.";
          }elseif(strlen($password)<6){
            $shortPass = "Password is too short.";
          }else{
            class signUpInsert{
              private $tbl_name = "tbl_customer";
              private $email;
              private $phone;
              private $name;
              private $address;
              private $city;
              private $zip;
              private $country;
              private $password;
              public function email($email){
                $this->email = $email;
              }
              public function phone($phone){
                $this->phone = $phone;
              }
              public function name($name){
                $this->name = $name;
              }
              public function address($address){
                $this->address = $address;
              }
              public function city($city){
                $this->city = $city;
              }
              public function zip($zip){
                $this->zip = $zip;
              }
              public function country($country){
                $this->country = $country;
              }
              public function password($password){
                $this->password = $password;
              }

              public function insertQuery(){
                $sql = "INSERT INTO $this->tbl_name(name,address,city,zip,email,country,phone,password)
                VALUES(:name,:address,:city,:zip,:email,:country,:phone,:password)";
                $stmt = db::shopPrepare($sql);
                $stmt->bindValue(":name",$this->name);
                $stmt->bindValue(":address",$this->address);
                $stmt->bindValue(":city",$this->city);
                $stmt->bindValue(":zip",$this->zip);
                $stmt->bindValue(":email",$this->email);
                $stmt->bindValue(":country",$this->country);
                $stmt->bindValue(":phone",$this->phone);
                $stmt->bindValue(":password",$this->password);
                return $stmt->execute();
              }
            }//End of the class

            $signUpInsertObj = new signUpInsert();
            $signUpInsertObj->email($email);
            $signUpInsertObj->phone($phone);
            $signUpInsertObj->name($name);
            $signUpInsertObj->address($address);
            $signUpInsertObj->city($city);
            $signUpInsertObj->zip($zip);
            $signUpInsertObj->country($country);
            $signUpInsertObj->password($password);
            if($signUpInsertObj->insertQuery()){
               class signUpSuccessful{
                 private $tbl_name = "tbl_customer";
                 private $email;
                 public function email($email){
                   $this->email = $email;
                 }
                 public function query(){
                   $sql = "SELECT * FROM $this->tbl_name WHERE email=:email";
                   $stmt = db::shopPrepare($sql);
                   $stmt->bindParam(":email",$this->email);
                   $stmt->execute();
                   return $stmt->fetchAll();
                 }
               }
               $signUpSuccessObj = new signUpSuccessful();
               $signUpSuccessObj->email($email);
               foreach ($signUpSuccessObj->query() as $value) {
                 session::set("customer_login",true);
                 session::set("customerId",$value["id"]);
                 //session::set("customerEmail",$value["email"]);
                 header("location:payment.php");
               }
            }else{
              echo "<small style='color:red'>Something went wrong.</small>";
            }
          }
        }
        ?>
        <span style="color:red;">
        <?php
        if(isset($emptyName)){echo $emptyName;}
        if(isset($invalidName)){echo $invalidName;}
        if(isset($emptyAddress)){echo $emptyAddress;}
        if(isset($emptyCity)){echo $emptyCity;}
        if(isset($emptyZip)){echo $emptyZip;}
        if(isset($emptyEmail)){echo $emptyEmail;}
        if(isset($exitsEmail)){echo $exitsEmail;}
        if(isset($invalidEmail)){echo $invalidEmail;}
        if(isset($emptyCountry)){echo $emptyCountry;}
        if(isset($emptyPhone)){echo $emptyPhone;}
        if(isset($exisPhone)){echo $exisPhone;}
        if(isset($emptyPass)){echo $emptyPass;}
        if(isset($shortPass)){echo $shortPass;}
        ?>
        </span>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input name="name" type="text" <?php if(isset($name)){echo "value='$name'";}else{echo "placeholder='Name'";}?>>
							</div>

							<div>
							   <input type="text" name="city" <?php if(isset($city)){echo "value='$city'";}else{echo "placeholder='City'";}?>>
							</div>

							<div>
								<input type="text" name="zip" <?php if(isset($zip)){echo "value='$zip'";}else{echo "placeholder='Zip-code'";}?>>
							</div>
							<div>
								<input type="text" name="email" <?php if(isset($email)){echo "value='$email'";}else{echo "placeholder='E-mail'";}?>>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" <?php if(isset($address)){echo "value='$address'";}else{echo "placeholder='Address'";}?>>
						</div>
		    		<div>
						<select style="height:33px;" id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
              <?php
              if(isset($country)){
                echo '<option value="'.$country.'">'.$country.'</option>';
              }else{
                echo '<option value=" ">Select a country</option>';
              }
              ?>
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>
		         </select>
				 </div>
	          <div>
	           <input type="text" name="phone"<?php if(isset($phone)){echo "value='$phone'";}else{echo "placeholder='Phone'";}?>>
	          </div>
  				  <div>
              <style media="screen">
                .regi_pass{ font-size:12px;color:#B3B1B1;padding:8px;outline:none;margin:5px 0;width:340px;}
              </style>
  					 <input class='regi_pass' type="password" name="password"<?php if(isset($password)){echo "value='$password'";}else{echo "placeholder='Password'";}?>>
  			  	</div>
		    	</td>
		    </tr>
		    </tbody></table>
		   <div style="margin-top:3px;" class="search"><div><button class="grey" name="create">Create Account</button></div></div>
		    <p  class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include("inc/footer.php");?>
