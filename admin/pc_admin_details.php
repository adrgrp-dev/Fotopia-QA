<?php
ob_start();

include "connection1.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Login Check
if(isset($_REQUEST['loginbtn']))
{
	header("location:index.php?failed=1");
}


function email($y,$z)
{
	/* Exception class. */
	require 'C:\PHPMailer\src\Exception.php';

	/* The main PHPMailer class. */
	require 'C:\PHPMailer\src\PHPMailer.php';

	/* SMTP class, needed if you want to use SMTP. */
	require 'C:\PHPMailer\src\SMTP.php';

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	//$mail->Username = 'sidambara.selvan@adrgrp.com'; //paste one generated by Mailtrap
	//$mail->Password = 'Selvan1#$'; //paste one generated by Mailtrap
	$mail->Username = 'test.deve@adrgrp.com';
	$mail->Password = 'adrgrp@123';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	//$mail->Port = 465;
	//From email address and name
	$mail->From = "test.deve@adrgrp.com";
	$mail->FromName = "Fotopia";

	//To address and name
	// $mail->addAddress("ssselvan.83@gmail.com", "Selvan");
	// //$mail->addAddress("lakshminarayanan@adrgrp.com","Lakshmi"); //Recipient name is optional
	// //$mail->addAddress("srivatsan@adrgrp.com","Srivatsan");
	// $mail->addAddress("bharathwaj.v@adrgrp.com","Bharath");
	 $mail->addAddress($z);


	//Address to which recipient will reply
	$mail->addReplyTo("test.deve@adrgrp.com", "Reply");

	//CC and BCC
	//$mail->addCC("cc@example.com");
	//$mail->addBCC("bcc@example.com");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Approved successfully";
	$mail->Body = "<html><head><style>.titleCss {font-family: \"Roboto\",Helvetica,Arial,sans-serif;font-weight:600;font-size:18px;color:#0275D8 }.emailCss { width:100%;border:solid 1px #DDD;font-family: \"Roboto\",Helvetica,Arial,sans-serif; } </style></head><table cellpadding=\"5\" class=\"emailCss\"><tr><td align=\"left\"><img src=\"http://fotopia.adrgrp.com/logo.png\" /></td><td align=\"center\" class=\"titleCss\">ADMIN APPROVED SUCCESSFUL</td><td align=\"right\">info@fotopia.com<br>343 4543 213</td></tr><tr><td colspan=\"2\"><br><br>";
	//$mail->AltBody = "This is the plain text version of the email content";



	$mail->Body.="Dear {{Registrered_User_Name}},<br><br>

Welcome to Fotopia!<br><br>

Your account has been approved by Fotopia Admin Team.<br>
<a href='{{project_url}}/login.php' target='_blank'>click here</a>
to login in to your Fotopia account.
<br><br>
Thanks,<br>
Fotopia Team.";
	$mail->Body=str_replace('{{project_url}}', $_SESSION['project_url'] , $mail->Body);
	$mail->Body=str_replace('{{Registrered_User_Name}}',$y, $mail->Body);
	$mail->Body.="<br><br></td></tr></table></html>";
	 // echo $mail->Body;exit;



	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
		echo $e->getMessage();
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
}



if(isset($_REQUEST['approve']))
{
	$id=$_REQUEST['id'];
	$get_user_detail=mysqli_query($con,"SELECT * FROM `photo_company_admin` WHERE id=$id");
	$get_user=mysqli_fetch_assoc($get_user_detail);
	email($get_user['first_name'],$get_user['email']);
	mysqli_query($con,"update photo_company_admin set is_approved=1 where id='$id'");
	header("location:pc_admin_details.php?success=1&id=$id");
}
elseif(isset($_REQUEST['block']))
{
	$id=$_REQUEST['id'];
	mysqli_query($con,"update photo_company_admin set is_approved=2 where id='$id'");
	header("location:pc_admin_details.php?declined=1&id=$id");
}
?>



<?php include "header.php";  ?>
	<style>
th
{
padding-left:20px!important;
}
	</style>
<div class="section-empty bgimage3">
            <div class="row">


			<div class="col-md-2">
				<script>
				   $(".hidden-xs").css("margin-right":"46px");
				</script>
				<?php if($_SESSION["admin_loggedin_type"] == "FotopiaAdmin"){
					include "sidebar.php";
				}
				else{
					include "sidebar.php";
				} ?>


			</div>
                <div class="col-md-10"  style="padding-top:30px;">
                    <h5 class="text-center" style="margin-left:-150px;" id="label_admin_user_details" adr_trans="label_admin_user_details" >Admin user details</h5>

					<?php if(@isset($_REQUEST["success"])) { ?>
                        <div class="success-box" style="display:block;">
												<center><div id="label_approved_selected" adr_trans="label_approved_selected" class="alert alert-success">Your have approved the selected user successfully.</div></center>
                        </div>
						<?php } ?>


<?php
$id=@$_REQUEST['id'];
				$res=mysqli_query($con,"select * from photo_company_admin where id='$id'");
				$res1=mysqli_fetch_array($res);

				?>
					<table class="table" style="color: #000;box-shadow: 5px 5px 5px 5px #aaa;background: #E8F0FE;opacity:0.7;width:80%;border-radius:30px 30px 30px 30px!important;padding:20px;">
					<tbody>
      <?php /*?> <tr><th>ID</th><td>:</td><td><?php echo $res1['id']; ?></td></tr><?php */?>
	   <tr><th><span adr_trans="label_profile_photo">Profile Photo</span></th><td>:</td><td><img src="data:<?php echo $res1['profile_pic_image_type']; ?>;base64,<?php echo base64_encode($res1['profile_pic']); ?>" width="50" height="50" /></td></tr>
	    <tr><th><span adr_trans="label_first_name">First Name</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['first_name']; ?></td></tr>
		 <tr><th><span adr_trans="label_last_name">Last Name</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['last_name']; ?></td></tr>
		  <tr><th><span adr_trans="label_organization">Organization</span></th><td>:</td><td style="word-break:break-all;"><b><?php echo $res1['organization_name']; ?></b></td></tr>
		   <tr><th><span adr_trans="label_type_user">Type Of User</span></th><td>:</td><td><?php echo $res1['type_of_user']; ?></td></tr>
		    <tr><th><span adr_trans="label_email">Email</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['email']; ?></td></tr>
			 <tr><th><span adr_trans="label_contact_no">contact Number</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['contact_number']; ?></td></tr>
			  <tr><th><span adr_trans="label_address">Address</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['address_line1'].", ".$res1['address_line2']; ?></td></tr>
			   <tr><th><span adr_trans="label_city">City</span></th><td>:</td><td><?php echo $res1['city']; ?></td></tr>
			    <tr><th><span adr_trans="label_state">State</span></th><td>:</td><td><?php echo $res1['state']; ?></td></tr>
				 <tr><th><span adr_trans="label_zip_code">Zip Code</span></th><td>:</td><td style="word-break:break-all;"><?php echo $res1['postal_code']; ?></td></tr>
				  <tr><th><span adr_trans="label_country">Country</span></th><td>:</td><td><?php echo $res1['country']; ?></td></tr>

				    <tr><th><span adr_trans="label_last_login">Last Login</span></th><td>:</td><td><?php echo $res1['last_login']; ?></td></tr>
					<tr><th><span adr_trans="label_last_login_ip">Last Login IP Address</span></th><td>:</td><td><?php echo $res1['last_login_ip']; ?></td></tr>
					<tr><th><span adr_trans="label_registration_date">Registration Date</span></th><td>:</td><td><?php echo $res1['registered_on']; ?></td></tr>


                <tr><th><span adr_trans="label_status">Status</span></th><td>:</td><td><?php $approved=$res1['is_approved']; if($approved==0) { echo "<span id='label_pending' adr_trans='label_pending' style='color:red;font-weight:bold;'>Pending</span>"; } elseif($approved==2) { echo "<span id='label_blocked' adr_trans='label_blocked' style='color:red;font-weight:bold;'>Blocked</span>"; } else { echo "<span id='label_approved' adr_trans='label_approved' style='color:green;font-weight:bold;'>Approved</span>"; } ?></td></tr>

				</tbody>
				  </table>
         <p align="center">
				<?php if($res1['is_approved']!=1) { ?>
				<a id="label_approve" adr_trans="label_approve" class="anima-button circle-button btn-success btn-sm btn" href="pc_admin_details.php?approve=1&id=<?php echo $res1['id']; ?>"><i class="fa fa-check"></i>Approve</a> <?php }  else { ?>
								<a id="label_block" adr_trans="label_block" class="anima-button circle-button btn-success btn-sm btn" href="pc_admin_details.php?block=1&id=<?php echo $res1['id']; ?>"><i class="fa fa-ban"></i>Block</a><?php } ?>

								<?php

								if(@$_REQUEST['val'] == 0) {
								?>
									
									<a id="label_back_users_list" adr_trans="label_back_users_list" class="anima-button circle-button btn-sm btn" href="csr_list1.php"><i class="fa fa-sign-in"></i>Back to users list</a>
								<?php } 
				if(@$_REQUEST['val'] == 1) {
					?>
					<a id="label_back_users_list" adr_trans="label_back_users_list" class="anima-button circle-button btn-sm btn" href="csr_list.php"><i class="fa fa-sign-in"></i>Back to users list</a>

					<?php } ?>

                </div>


            </div>



		<?php include "footer.php";  ?>
