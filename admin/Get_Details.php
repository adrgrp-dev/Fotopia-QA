<?php
include "connection.php";
$Photographer_id=$_REQUEST["id"];
$pc_admin_id="";
$contact="";


if($res=mysqli_query($con,"select email,contact_number,pc_admin_id from user_login where id='$Photographer_id' "))
{
$res1=mysqli_fetch_array($res);
$contact="<span adr_trans='label_email'>Email</span> : ".$res1['email']."<br><span adr_trans='label_contact_no'> Contact No.</span> : ".$res1['contact_number'];
$pc_admin_id=$res1["pc_admin_id"];

$profile_query="select * from photographer_profile where photographer_id='$Photographer_id'";
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
$product_result=mysqli_query($con,"SELECT * FROM `products` WHERE pc_admin_id='$pc_admin_id' and id in(select product_id from photographer_product_cost where photographer_id='$Photographer_id')");

$product=" ";
$langIs=$_SESSION['Selected_Language_Session'];
if($langIs=='en')
{
$product.="<div id=\"flip-scroll\"><table class=\"table-stripped\" cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><thead><tr style=\"font-weight:600;font-size:12px;\"><td  style=\"padding:5px\"><span adr_trans='label_product_name'>Product Name</span></td><td style=\"padding:5px\"><span adr_trans='label_timeline'> Timeline</span></td><td style=\"padding:5px\"><span adr_trans='label_product_cost'>Product Cost</span></td></tr></thead>";
}
else
{
$product.="<div id=\"flip-scroll\"><table class=\"table-stripped\" cellpadding=\"10\" cellspacing=\"10\" width=\"100%\"><thead><tr style=\"font-weight:600;\"><td  style=\"padding:5px\"><span adr_trans='label_product_name'>Produktnavn</span></td><td style=\"padding:5px\"><span adr_trans='label_timeline'> Tidslinje</span></td><td style=\"padding:5px\"><span adr_trans='label_product_cost' >Produktkostnad</span></td></tr></thead>";
}

while($product_result1=mysqli_fetch_array($product_result))
{
$productIDIS=$product_result1['id'];
$realtorDiscountPrice=$product_result1['total_cost'];



$product.="<tr><td>".$product_result1['product_name']."</td><td>".$product_result1['timeline']."</td><td>".$realtorDiscountPrice."</td></tr>";
}
$product.="</table>";
echo $result="<div class=\"panel active\" id=\"aboutmeDiv\">
                              ".$about."
                            </div>
                            <div class=\"panel\" id=\"myskillsDiv\">
                               ".$skills."
                            </div>
							<div class=\"panel\" id=\"portfolioDiv\">
                              ".$portfolio."
                            </div>
                            <div class=\"panel\" id=\"contactDiv\">
                               ".$contact."
                            </div>
                            <div class=\"panel\" id=\"contactDiv\">
                               ".$product."<br>
                            </div>
							<hr class=\"space s\">
<p align=\"center\">

<a class=\"anima-button circle-button btn-sm btn adr-cancel\" href=\"./photographerCalendar10.php?Photographer_id=$Photographer_id\"><i class=\"fa fa-calendar-o\"></i><span adr_trans='label_book_online'>Book Online</a>&nbsp;&nbsp;&nbsp;
<a class=\"anima-button circle-button btn-sm btn adr-save\" href=\"./photographerCalendar10.php?Photographer_id=$Photographer_id\"><i class=\"fa fa-check\"></i><span adr_trans='label_book_now'>Book Now</span></a></p>
							";


 ?>
