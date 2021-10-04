<footer class="wide-area" style="margin-bottom:0px!important;">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 footer-left">
                        <p>Copyright © 2021 Photography App. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 footer-right">
                        <span>+1 800 1 21 05</span>
                        <span class="space"></span>
                        <div class="btn-group navbar-social">
                            <div class="btn-group social-group">
                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link property="" rel="stylesheet" href="../scripts/font-awesome/css/font-awesome.min.css">
        <script async="" src="../scripts/bootstrap/js/bootstrap.min.js"></script>
        <script src="../scripts/imagesloaded.min.js"></script>
        <script src="../scripts/jquery.progress-counter.js"></script>
        <script src="../scripts/jquery.tab-accordion.js"></script>
        <script src="../scripts/smooth.scroll.min.js"></script>
		
		
		
		
		 <script src='../scripts/flexslider/jquery.flexslider-min.js'></script>
      
      
		  <script src='../scripts/jquery.magnific-popup.min.js'></script>
		 <script src='../scripts/jquery.flipster.min.js'></script>
       
       
		<script src='../scripts/parallax.min.js'></script>
    </footer>




    <script>
$( document ).ready(function() {
var lang="<?php echo $_SESSION['Selected_Language_Session']; ?>";
if(lang=="en")
{
loadfile="../en.json";
}
else
{
loadfile="../no.json";
}
var data="";


$.ajax({
type: "Get",
url: loadfile,
dataType: "json",
success: function(data) {



$("td[adr_trans],div[adr_trans],p[adr_trans],span[adr_trans],button[adr_trans],a[adr_trans],h3[adr_trans],h4[adr_trans],h5[adr_trans]").each(function(){
// alert($(this).attr("id"));
var idIs=$(this).attr("adr_trans");
//var idIs=$(this).attr("id");




var htmlIs=$('[adr_trans="'+idIs+'"]').html();

if(htmlIs.indexOf("fa fa")!=-1)
{
//alert("coming");
var splitIs=htmlIs.split("</i>");

var actualFA=splitIs[0]+"</i>";
//alert(actualFA);
$('[adr_trans="'+idIs+'"]').html(actualFA+data[idIs]);
}
else
{
$('[adr_trans="'+idIs+'"]').html(data[idIs]);
}


});

},
error: function(){
 //alert("json not found");
}
});


$('input[type=text]').each(function(){
    $(this).attr("pattern","[a-zA-Z0-9_]+.*$");
	$(this).attr("title","Input must contain atleast one character, No space at beginning and no symbol at beginning and must start with a character.");
})

$('input[type=email]').each(function(){
//[^@\s]+@[^@\s]+\.[^@\s]+
$(this).attr("type","text");
    $(this).attr("pattern","[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}");
	$(this).attr("title","Invalid email address");
})





});
</script>



<script>

/*$('input[type=text]').each(function(){
    $(this).attr("pattern","[a-zA-Z0-9_]+.*$");
    $(this).attr("title","Input must contain atleast one character, No space at beginning and no symbol at beginning and must start with a character.");
})

$('input[type=email]').each(function(){
//[^@\s]+@[^@\s]+\.[^@\s]+
$(this).attr("type","text");
    $(this).attr("pattern","[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}");
    $(this).attr("title","Invalid email address");
})

*/
</script>

    <?php

$usertype = @$_SESSION['admin_loggedin_type'];
$currentPage=$_SERVER['PHP_SELF'];

if ($usertype == 'FotopiaAdmin'){



 if(strpos($currentPage, "dashboard") !== false)
 {
 echo "<script> showHide(1); </script>";
 }

if(strpos($currentPage, "/users") !== false || strpos($currentPage, "userDetails") !== false)
 {
 echo "<script> showHide(2); </script>";
 }

 if(strpos($currentPage, "notification") !== false)
 {
 echo "<script> showHide(3); </script>";
 }


if(strpos($currentPage, "admin_users") !== false || strpos($currentPage, "create_admin") !== false || strpos($currentPage, "adminDetails") !== false)
 {
 echo "<script> showHide(6); </script>";
 }

// || strpos($currentPage, "appointment_reports") !== false

 if(strpos($currentPage, "csr_list") !== false || strpos($currentPage, "csr_details") !== false || strpos($currentPage, "edit_csr") !== false || strpos($currentPage, "create_csr") !== false)
 {
 echo "<script> showHide(8); </script>";
 }

 if(strpos($currentPage, "order_reports") !== false || strpos($currentPage, "appointment_reports") !== false || strpos($currentPage, "payment_reports") !== false)
 {
 echo "<script> showHide(7); </script>";
 }

}



elseif ($usertype == 'PCAdmin'){

// || strpos($currentPage, "userDetails") !== false

 if(strpos($currentPage, "PCAdmin_dashboard") !== false)
 {
 echo "<script> showHide(1); </script>";
 }

if(strpos($currentPage, "PCAdmin_Calender") !== false)
 {
 echo "<script> showHide(4); </script>";
 }

 if(strpos($currentPage, "superorder_list1") !== false || strpos($currentPage, "create_order") !== false  || strpos($currentPage, "create_appointment") !== false || strpos($currentPage, "Edit_appointment") !== false || strpos($currentPage, "Edit_order") !== false || strpos($currentPage, "superOrder_detail") !== false || strpos($currentPage, "select_products") !== false || strpos($currentPage, "summary") !== false || strpos($currentPage, "preview1") !== false || strpos($currentPage, "finished_image_upload") !== false || strpos($currentPage, "preview3") !== false)
 {
 echo "<script> showHide(5); </script>";
 }


if(strpos($currentPage, "products") !== false || strpos($currentPage, "RealtorProducts") !== false || strpos($currentPage, "PhotographerProducts") !== false )
 {
 echo "<script> showHide(6); </script>";
 }

 if(strpos($currentPage, "pc_admin_activity") !== false )
 {
 echo "<script> showHide(12); </script>";
 }

  if(strpos($currentPage, "client") !== false || strpos($currentPage, "client_detail") !== false )
 {
 echo "<script> showHide(10); </script>";
 }

  if(strpos($currentPage, "csr_list1") !== false  || strpos($currentPage, "create_pc_admin_user") !== false  || strpos($currentPage, "pc_admin_details") !== false  || strpos($currentPage, "edit_pc_admin_user") !== false  || strpos($currentPage, "create_csr") !== false  || strpos($currentPage, "csr_details") !== false  || strpos($currentPage, "edit_csr") !== false  || strpos($currentPage, "create_photographer") !== false  || strpos($currentPage, "userDetails") !== false  || strpos($currentPage, "edit_photographer") !== false  || strpos($currentPage, "create_editor") !== false  || strpos($currentPage, "edit_editor") !== false)
 {
 echo "<script> showHide(2); </script>";
 }

 if(strpos($currentPage, "company_profile") !== false || strpos($currentPage, "edit_company_profile") !== false )
 {
 echo "<script> showHide(9); </script>";
 }

if(strpos($currentPage, "order_reports") !== false || strpos($currentPage, "appointment_reports") !== false || strpos($currentPage, "payment_reports") !== false)
 {
 echo "<script> showHide(7); </script>";
 }


}


elseif ($usertype == 'CSR'){


// || strpos($currentPage, "superOrder_detail") !== false


 if(strpos($currentPage, "subcsr_dashboard") !== false )
 {
 echo "<script> showHide(1); </script>";
 }

  if(strpos($currentPage, "subcsr_list1") !== false || strpos($currentPage, "userDetails") !== false || strpos($currentPage, "edit_photographer") !== false || strpos($currentPage, "create_photographer") !== false)
 {
 echo "<script> showHide(2); </script>";
 }

  if(strpos($currentPage, "CSR_Calendar") !== false )
 {
 echo "<script> showHide(4); </script>";
 }

  if(strpos($currentPage, "order_reports") !== false || strpos($currentPage, "appointment_reports") !== false || strpos($currentPage, "payment_reports") !== false )
 {
 echo "<script> showHide(8); </script>";
 }

   if(strpos($currentPage, "csr_activity") !== false )
 {
 echo "<script> showHide(12); </script>";
 }

  if(strpos($currentPage, "csr_products") !== false )
 {
 echo "<script> showHide(9); </script>";
 }


   if(strpos($currentPage, "csr_profile") !== false || strpos($currentPage, "edit_csr_profile") !== false )
 {
 echo "<script> showHide(10); </script>";
 }

  if(strpos($currentPage, "subcsrOrder_list1") !== false || strpos($currentPage, "superOrder_detail") !== false 
    || strpos($currentPage, "create_order") !== false  || strpos($currentPage, "create_appointment") !== false || strpos($currentPage, "Edit_appointment") !== false || strpos($currentPage, "Edit_order") !== false || strpos($currentPage, "preview1") !== false || strpos($currentPage, "finished_image_upload") !== false || strpos($currentPage, "preview3") !== false || strpos($currentPage, "select_products") !== false || strpos($currentPage, "summary") !== false)
 {
 echo "<script> showHide(5); </script>";
 }

}




 ?>