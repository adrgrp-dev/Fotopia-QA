<?php
include "connection.php";

$super_csr_id=$_REQUEST["id"];
$contact="";
$photographersList="";
$Portfolio="";

$aboutUs1=mysqli_query($con,"select * from photo_company_profile where pc_admin_id='$super_csr_id'");
$aboutUs=mysqli_fetch_array($aboutUs1);
$aboutIs=$aboutUs['about_us'];
$portFolio=$aboutUs['portfolio'];

$contact="<b adr_trans=\"label_address\">Address : </b><br> ".$aboutUs['address_line1']."<br>".$aboutUs['address_line2']."<br>".$aboutUs['city'].", ".$aboutUs['state'].", ".$aboutUs['postal_code']."<br>Email : ".$aboutUs['email']."<br> Contact No. : ".$aboutUs['contact_number'];


$phList=mysqli_query($con,"select * from user_login where type_of_user='Photographer' and pc_admin_id='$super_csr_id'");
$Photographer_id=0;
while($phList1=mysqli_fetch_array($phList))
{
$Photographer_id=$phList1['id'];
$SkillQry=mysqli_query($con,"select city,state from photographer_profile where photographer_id='$Photographer_id'");
$Skillres=mysqli_fetch_array($SkillQry);
$SkillsIs=$Skillres['city'];
$locationIs = $Skillres['state'];


$rating=mysqli_query($con,"select ROUND(avg(rating)) as avgRating,photographer_id from photographer_rating group by realtor_id having photographer_id='$Photographer_id'");
$ratingIs=0;
if($rating1=mysqli_fetch_array($rating))
{
$ratingIs= $rating1['avgRating'];
}

$ratingStars="<p align=\"left\">";

for($i=1;$i<=5;$i++)
{
if($i<=$ratingIs)
{
$ratingStars.="<i class=\"fa fa-star\" style=\"padding:5px;font-size:10px;color:#337AB7;\"></i>";
 } else {
$ratingStars.="<i class=\"fa fa-star-o\" style=\"padding:5px;color:#337AB7;font-size:10px;\"></i>";
 } }
 $ratingStars.="</p>";




$photographersList.="<table border=\"0\" cellpadding=\"10\" style=\"width:100%;padding:10px;margin:10px;background:#000;color:#FFF;border-radius:25px 25px 25px 25px;\"><tr><td rowspan=\"5\" align=\"center\" style=\"padding:10px\"><img   href=\"#aboutMe\" class=\"lightbox link\" data-lightbox-anima=\"show-scale\" style=\"color:blue;text-decoration:underline\" src=\"data:".$phList1['profile_pic_image_type'].";base64,".base64_encode($phList1['profile_pic'])."\" width=\"120\" height=\"100\"  style=\"max-width: 70px;\"/></td></tr><tr><td>".strtoupper($phList1['first_name'])."</td></tr><tr><td>".$locationIs."</td></tr><tr><td>".$SkillsIs."</td></tr><tr><td>".$ratingStars."</td></tr><tr><td colspan=\"2\" align=\"center\"><p align=\"center\" style=\"padding:10px;\">

<a class=\"anima-button circle-button btn-sm btn\" adr_trans=\"label_book_online\" href=\"./photographerCalendar1.php?Photographer_id=$Photographer_id\"><i class=\"fa fa-calendar-o\"></i>Book Online</a>&nbsp;&nbsp;&nbsp;
<a class=\"anima-button circle-button btn-sm btn\" adr_trans=\"label_book_now\" href=\"./create_order.php?bn=1&pc_admin_id=$super_csr_id&Photographer_id=$Photographer_id\"><i class=\"fa fa-check\"></i>Book Now</a></p></td></tr></table>";

}

//echo "select email,contact_number from admin_users where id='$super_csr_id'";
if($res=mysqli_query($con,"select email,contact_number from admin_users where id='$super_csr_id' "))
{
$res1=mysqli_fetch_array($res);


$profile_query="select * from photo_company_profile where pc_admin_id='$super_csr_id'";
$profile_result=mysqli_query($con,$profile_query);
$profile_result1=mysqli_fetch_array($profile_result);
if(!empty($profile_result1['about_me']))
{
  $about=$profile_result1['about_me'];
}
else {
  $about=" ";
}
if(!empty($profile_result1['skills']))
{
  $skills=$profile_result1['skills'];
}
else {
  $skills=" ";
}
if(!empty($profile_result1['portfolio']))
{
  $portfolio=$profile_result1['portfolio'];
}
else {
  $portfolio=" ";
}

}
$product_result=mysqli_query($con,"SELECT * FROM `products` WHERE pc_admin_id='$super_csr_id'");

$product=" ";
$langIs=$_SESSION['Selected_Language_Session'];
if($langIs=='en')
{
$product.="<div id=\"flip-scroll\"><table class=\"table-stripped\" cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><thead><tr style=\"font-weight:600;\"><td  style=\"padding:5px\"><span adr_trans='label_product_name'>Product Name</span></td><td style=\"padding:5px\"><span adr_trans='label_timeline'> Timeline</span></td><td style=\"padding:5px\"><span adr_trans='label_product_cost' >Product Cost</span></td></tr></thead>";
}
else
{
$product.="<div id=\"flip-scroll\"><table class=\"table-stripped\" cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><thead><tr style=\"font-weight:600;\"><td  style=\"padding:5px\"><span adr_trans='label_product_name'>Produktnavn</span></td><td style=\"padding:5px\"><span adr_trans='label_timeline'> Tidslinje</span></td><td style=\"padding:5px\"><span adr_trans='label_product_cost' >Produktkostnad</span></td></tr></thead>";
}


while($product_result1=mysqli_fetch_array($product_result))
{
$productIDIS=$product_result1['id'];
$realtorDiscountPrice=$product_result1['total_cost'];

$realtorCost1=mysqli_query($con,"select * from realtor_product_cost where pc_admin_id='$super_csr_id' and realtor_id='$_SESSION[loggedin_id]' and product_id='$productIDIS'");

$rowsFound=mysqli_num_rows($realtorCost1);
if($rowsFound>0)
{
$realtorCost=mysqli_fetch_array($realtorCost1);
$realtorDiscountPrice=$realtorCost['discount_price'];
}

$product.="<tr><td style=\"padding:5px\">".$product_result1['product_name']."</td><td style=\"padding:5px\">".$product_result1['timeline']."</td><td style=\"padding:5px\">".$realtorDiscountPrice."</td></tr>";
}
$product.="</table></div>";
echo $result="<div class=\"panel active\" id=\"aboutmeDiv\" style=\"height:150px;\">
                              ".$aboutIs."
                            </div>

							<div class=\"panel\" id=\"portfolioDiv\" style=\"height:150px;overflow:scroll;\">
                              ".$photographersList."
                            </div>
							 <div class=\"panel\" id=\"contactDiv\" style=\"height:150px;\">
                               ".$product."<br>
                            </div>
                            <div class=\"panel\" id=\"contactDiv\" style=\"height:580px;\">
                               ".$contact."
                            </div>
                            <div class=\"panel\" id=\"contactDiv\" style=\"height:150px;\">
                               ".$portFolio."
                            </div>
							<hr class=\"space s\"><center><a href=\"create_order.php?bn=1&pc_admin_id=".$super_csr_id."\" adr_trans=\"label_book_now\" class=\"btn btn-primary btn-sm circle-button\">Book Now</a><center>";
/*<p align=\"center\">

<a class=\"anima-button circle-button btn-sm btn adr-cancel\" href=\"./photographerCalendar1.php?Photographer_id=$Photographer_id\"><i class=\"fa fa-calendar-o\"></i>Check Availability</a>&nbsp;&nbsp;&nbsp;
<a class=\"anima-button circle-button btn-sm btn adr-save\" href=\"./photographerCalendar1.php?Photographer_id=$Photographer_id\"><i class=\"fa fa-check\"></i>Book Now</a></p>*/


 ?>
