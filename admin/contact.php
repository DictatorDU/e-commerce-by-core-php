<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include("classes/contact.php");?>
<div class="grid_10">
<div class="box round first grid">
<h2>Update Social Media</h2>
<div class="block">
  <?php
  if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $phone_2 = $_POST["phone_2"];
    $country = $_POST["country"];
    $fax = $_POST["fax"];
    $info = $_POST["info"];
    if(empty($name)){
      echo "Empty Company name";
    }elseif(empty($address)){
      echo "Empty company address";
    }elseif(empty($email)){
      echo "Empty company email";
    }elseif(empty($phone)){
      echo "Empty company phone number";
    }elseif(empty($phone_2)){
      echo "Empty company phone number";
    }elseif(empty($country)){
      echo "Empty country name";
    }elseif(empty($fax)){
      echo "Empty company fax number";
    }elseif(empty($info)){
      echo "Empty company information";
    }else{
      $contactObj->name($name);
      $contactObj->address($address);
      $contactObj->phone($phone);
      $contactObj->country($country);
      $contactObj->email($email);
      $contactObj->fax($fax);
      $contactObj->info($info);
      $contactObj->phone_2($phone_2);
      if($contactObj->upquery()){
        echo "You have successfully update information.";
      }

    }
  }
  ?>
<form action="" method="post">
<?php
foreach ($contactObj->showInfo() as $value) {
?>
<table class="form">
    <tr>
        <td width='15%'>
            <label>Company Name</label>
        </td>
        <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['title']?>" type="text" name="name" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>Company Address</label>
        </td>
          <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['address']?>" type="text" name="address" class="medium" />
        </td>
    </tr>
  	 <tr>
        <td>
            <label>Country</label>
        </td>
          <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['country']?>" type="text" name="country" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>Phone One</label>
        </td>
          <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['phone']?>" type="text" name="phone" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>Phone Two</label>
        </td>
          <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['phone_two']?>" type="text" name="phone_2" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>Fax</label>
        </td>
          <td width='5%'>:</td>
        <td>
            <input value="<?php echo $value['fax']?>" type="text" name="fax" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>E-mail</label>
        </td>
          <td width='2%'>:</td>
        <td>
            <input value="<?php echo $value['email']?>" type="text" name="email" class="medium" />
        </td>
    </tr>
   	 <tr>
        <td>
            <label>Information</label>
        </td>
          <td width='2%'>:</td>
        <td>
            <textarea name="info" rows="6" cols="67"><?php echo $value['some_info']?></textarea>
        </td>
    </tr>
    <tr>
        <td></td>
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
