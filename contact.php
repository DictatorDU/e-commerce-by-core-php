<?php include("inc/header.php");?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> <?php foreach ($contactObj->showInfo() as $value){
            echo $value['some_info'];
           } ?></p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
            <?php
            if(isset($_POST["sub"])){
              $name = $formatObj->validation($_POST['username']);
              $email = $formatObj->validation($_POST['email']);
              $msg = $formatObj->validation($_POST['msg']);

              $exprationName = "/^([a-zA-Z]+.{5})?([ ])*([a-zA-Z ])+$/";
              if(empty($name)){
                echo "<span style='color:red'>Name can not be empty..</span>";
              }elseif(empty($email)){
                echo "<span style='color:red'>Email can not be empty..</span>";
              }elseif(empty($msg)){
                echo "<span style='color:red'>Message can not be empty..</span>";
              }elseif(!preg_match($exprationName,$name)){
                echo "<span style='color:red'>Invalid Name..</span>";
              }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "<span style='color:red'>Invalid Email Address..</span>";
              }else{
                $contactObj->name($name);
                $contactObj->email($email);
                $contactObj->msg($msg);
                if($contactObj->insertQuery()){
                  echo "<span>Thank you for you message.</span>";
                }else{
                  echo "Something went wrong.";
                }
              }
            }
            ?>
				  	<h2>Contact Us</h2>
					    <form action="" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input name="username" type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input name="email" type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="msg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="sub" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
              <?php foreach ($contactObj->showInfo() as $value){ ?>
				     	<h2>Company Information :</h2>
						    	<p><?php echo $value["title"];?></p>
						   		<p><?php echo $value["address"];?></p>
						   		<p><?php echo $value["country"];?></p>
				   		<p>Phone (1): <span><?php echo $value["phone"];?></span></p>
				   		<p>Phone (2): <span><?php echo $value["phone_two"];?></span></p>
				   		<p>Fax: <span><?php echo $value["fax"];?></span></p>
				 	 	<p>Email: <span><?php echo $value["email"];?></span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
            <?php } ?>
				   </div>
				 </div>
			  </div>
    </div>
 </div>
</div>
<?php include("inc/footer.php");?>
