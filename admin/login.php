<?php include("connection/db.php");?>
<?php
include("helper/session.php");
session::admin_init();
session::chkSessionStared();
?>
<?php include("helper/format.php");?>
<?php $formatObj = new Format();?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
    <?php
    if(isset($_POST["submit"])){
      $email = $formatObj->validation($_POST["email"]);
      $password = $_POST["password"];

      class chkInput{
        private $tbl_name = "tbl_admin";
        private $email;
        public function emailFun($email){
          $this->email = $email;
        }
        public function emailChkquery(){
          $sql = "SELECT email FROM $this->tbl_name WHERE email=:email";
          $stmt = db::shopPrepare($sql);
          $stmt->bindParam(':email',$this->email);
          $stmt->execute();
          if($stmt->rowCount()>0){
            return true;
          }else{
            return false;
          }
        }
        public function passChkquery(){
          $sql = "SELECT * FROM $this->tbl_name WHERE email=:email";
          $stmt = db::shopPrepare($sql);
          $stmt->bindParam(':email',$this->email);
          $stmt->execute();
          return $stmt->fetchAll();
        }
      }

      $chkInputObj = new chkInput();
      $chkInputObj->emailFun($email);
      $chK_email_result = $chkInputObj->emailChkquery();
      $passResult = $chkInputObj->passChkquery();
      foreach ($passResult as $value) {
        $chK_pass_result = $value["password"];
      }

      if(empty($email)){
        $emptyEmail = "Email field required";
      }elseif(empty($password)){
        $emptyPass = "Password field required.";
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $invalidEmail = "Invalid email address";
      }elseif($chK_email_result == false){
        $notFoundUser = "Email not found";
      }elseif($chK_pass_result != $password){
        $notFoundPass = "Password not match";
      }else{
        class loginClass{
          private $tbl_name = "tbl_admin";
          private $email;
          private $password;

          public function getUseremail($email){
            $this->email = $email;
          }
          public function getPassword($password){
            $this->password = $password;
          }

          public function loginQuery(){
            $sql = "SELECT * FROM $this->tbl_name WHERE email=:email AND password=:password LIMIT 1";
            $stmt = db::shopPrepare($sql);
            $stmt->bindParam(":email",$this->email);
            $stmt->bindParam(":password",$this->password);
            $stmt->execute();
            $resutl = $stmt->fetch(PDO::FETCH_OBJ);
            return $resutl;
            if($resutl){
              session::admin_init();
            }
          }
        }

        $loginObj = new loginClass();
        $loginObj->getUseremail($email);
        $loginObj->getPassword($password);

        $loginResult = $loginObj->loginQuery();
        if($loginResult){
          session::admin_init();
          session::set('login',true);
          session::set('userID',$loginResult->id);
          session::set('email',$loginResult->email);
          session::set('role',$loginResult->level);
          session::set('username',$loginResult->username);
          header("location:index.php");
        }else{
          $_SESSION["loginFail"] = 1;
          session::sessionDestroy();
          header("location:login.php");
        }
      }
    }
    ?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
        <span style="color:red;">
        <?php if(isset($emptyEmail)){echo $emptyEmail;}?>
        <?php if(isset($invalidEmail)){echo $invalidEmail;}?>
        <?php if(isset($notFoundUser)){echo $notFoundUser;}?>
        </span>
				<input type="text" placeholder="Email" name="email"/>
			</div>
			<div>
        <span style="color:red;">
        <?php if(isset($notFoundPass)){echo $notFoundPass;}?>
        <?php if(isset($emptyPass)){echo $emptyPass;}?>
         </span>
				<input type="password" placeholder="Password" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
