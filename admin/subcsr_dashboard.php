<?php
ob_start();

include "connection1.php";
  $subcsr=$_SESSION['admin_loggedin_id'];
  //echo "$subcsr";
$loggedin_id=$_SESSION['admin_loggedin_id'];
//Login Check
if(isset($_REQUEST['loginbtn']))
{
	header("location:index.php?failed=1");
}
?>
<?php include "header.php";  ?>
<script>
		var id=null;
		var title=null;
		function GetDetails(id,title)
		{
		 var xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200){

	 $("#resultDiv").html(this.responseText)


    }
  };
  xhttp.open("GET","Get_Details.php?id="+id,true);
  xhttp.send();
		}







	var id_to_show_hide;
	function show(id_to_show_hide)
	{
	$("#show"+id_to_show_hide).show();

	}
	function hide(id_to_show_hide)
	{
	$("#show"+id_to_show_hide).hide();

	}

var tog="";
function togglePH(tog)
{
if(tog=='photographers')
{
$("#photo_company").hide();
$("#photographers").show();
}
else
{
$("#photographers").hide();
$("#photo_company").show();
}

}
		</script>
<style>

.active
{
background:none;
}
.pd-2
{
  padding-left: 39px;
}
.fc-day-mon,.fc-day-tue,.fc-day-wed,.fc-day-thu,.fc-day-fri,
{
background:#FFF!important;
border:solid 1px #000!important;
}
.fc-day-sat,.fc-day-sun
{
background:#EEEEEE!important;
border:solid 1px #000!important;
}
.active
{
background:none!important;
}
.btn-default
{
margin-left:0px!important;
}



.fc-day-today
{
background:#E8F0FE!important;
border:solid 1px #01A8F2!important;
}

h2.fc-toolbar-title
{
display:contents;
color:#FFF!important;
border:solid 1px #000!important;
padding:10px;
}


.fc .fc-toolbar.fc-header-toolbar
{
background:#FFF;
border-radius:25px 25px 0px 0px;
}

.fc-scroller-harness,.fc-scroller-harness-liquid
{
border-radius:25px!important;
}
.fc-prev-button, .fc-next-button, .fc-button
{
background:#000!important;
color:#FFF!important;
margin:2px!important;
font-size: 10px!important;
}
.fc .fc-toolbar-title
{
font-size:10px!important;
}

</style>


<script>


function addToWishList(supercsr,photographers)
{
var Super_CSR__id= supercsr;
var P_id= photographers;

var xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200){


    }
    };
  xhttp.open("GET","wishlist.php?Super_CSR_id="+Super_CSR__id+"&P_id="+P_id,true);
  xhttp.send();
window.location.href = "./subcsr_dashboard.php?wl=1";

 }


 function removeFromWishList(supercsr,photographers)
{
var Super_CSR__id= supercsr;
var P_id= photographers;
var xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200){


    }
    };
  xhttp.open("GET","removeFromWishlist.php?Super_CSR_id="+Super_CSR__id+"&P_id="+P_id,true);
  xhttp.send();
window.location.href = "./subcsr_dashboard.php?rwl=1";

 }





</script>


 <div class="section-empty bgimage2">
        <div class="container-fluid" style="margin-left:0px;height:inherit">
            <div class="row">
			<hr class="space s">
                <div class="col-md-2">
	<?php include "sidebar.php"; ?>


			</div>
                <div class="col-md-8" style="padding-left:30px;">

					<div>

                <div class="col-md-3">
                    <div class=" advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover" style="background:#E8F0FE!important;border-radius:35px 35px 35px 35px;opacity:0.8;color:#000000;border:solid 3px #000000;box-shadow:10px 10px 10px #3a3b3c">
                        <i class="fa fa-database icon circle anima" aid="0.33201800164139406" style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;background:#000;color:#0000FF!important;"></i>

													<hr class="space s">
                        <div class="row">
													<div class="col-md-12 " style="padding-left: 35px;">
														<h5 adr_trans="label_completed">Completed</h5>
															<?php
															$get_order_query=mysqli_query($con,"select count(*) as completed_no from orders where status_id=3 and csr_id=$subcsr");
															if($get_order=mysqli_fetch_assoc($get_order_query))
															{
															?>
                            <p class="counter" data-speed="1000" data-to=" <?php echo $get_order["completed_no"];?>" style="color:white;font-size:25px;font-weight:600;padding-top:5px;color:#000">

			 <?php echo $get_order["completed_no"]; }?>
		 </p>
      <a id="label_view" adr_trans="label_view" class="anima-button circle-button btn-sm" href="subcsrOrder_list1.php?c=1" style="background:#0000FF!important;color:#FFF!important;font-weight:700;box-shadow:2px 2px 2px 2px #3a3b3c;"><i class="fa fa-long-arrow-right"></i>View </a>
													</div>
													<div class="col-md-6">

                        	</div>
												</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover" style="background:#E8F0FE!important;border-radius:35px 35px 35px 35px;opacity:0.8;color:#000000;border:solid 3px #000000;box-shadow:10px 10px 10px #3a3b3c">
                        <i class="fa fa-users icon circle anima" aid="0.8497340629201113" style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;background:#000;color:#FF0000!important;"></i>
                        <!-- <h3 style="margin-bottom: 20px;">Ongoing orders</h3> -->
													<hr class="space s">
												<div class="row">
													<div class="col-md-12 pd-2" style="padding-left: 35px;">
                            <h5 id="label_ongoing" adr_trans="label_ongoing">Ongoing</h5>
                              <?php
                              $get_ongoing_query=mysqli_query($con,"select count(*) as ongoing_no from orders where status_id in(2,4) and csr_id=$subcsr");
                              if($get_ongoing=mysqli_fetch_assoc($get_ongoing_query))
                              {
                              ?>
                            <p class="counter" data-speed="1000" data-to="  <?php echo $get_ongoing["ongoing_no"];?>" style="color:white;font-size:25px;font-weight:600;padding-top:5px;color:#000"> <?php echo $get_ongoing["ongoing_no"]; }?></p>
                        <a id="label_view" adr_trans="label_view" class="anima-button circle-button btn-sm" href="subcsrOrder_list1.php?o=1" style="background:#FF0000!important;color:#FFF!important;font-weight:700;box-shadow:2px 2px 2px 2px #3a3b3c;"><i class="fa fa-long-arrow-right"></i>View </a>


													</div>

												</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover" style="background:#E8F0FE!important;border-radius:35px 35px 35px 35px;opacity:0.8;color:#000000;border:solid 3px #000000;box-shadow:10px 10px 10px #3a3b3c">
                        <i class="fa fa-users icon circle anima" aid="0.8497340629201113" style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;background:#000;color:#ffff00!important;"></i>
                        <!-- <h3 style="margin-bottom: 20px;">Ongoing orders</h3> -->
                          <hr class="space s">
                        <div class="row">
                          <div class="col-md-12 pd-2" style="padding-left: 35px;">
                            <h5 id="label_new_orders" adr_trans="label_new_orders">New Orders</h5>
                              <?php
                              $get_ongoing_query=mysqli_query($con,"SELECT count(*) as ongoing_no FROM orders where csr_id=$loggedin_id and photographer_id='0' and status_id in(1,6,7) ");
                              if($get_ongoing=mysqli_fetch_assoc($get_ongoing_query))
                              {
                              ?>
                            <p class="counter" data-speed="1000" data-to="  <?php echo $get_ongoing["ongoing_no"];?>" style="color:white;font-size:25px;font-weight:600;padding-top:5px;color:#000"> <?php echo $get_ongoing["ongoing_no"]; }?></p>
                        <a id="label_view" adr_trans="label_view" class="anima-button circle-button btn-sm" href="subcsrOrder_list1.php" style="background:#ffff00!important;color:#7c6f6f!important;font-weight:700;box-shadow:2px 2px 2px 2px #3a3b3c;"><i class="fa fa-long-arrow-right" style="color:#7c6f6f!important;"></i>View </a>


                          </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class=" advs-box advs-box-top-icon boxed-inverse" data-anima="rotate-20" data-trigger="hover" style="background:#E8F0FE!important;border-radius:35px 35px 35px 35px;opacity:0.8;color:#000000;border:solid 3px #000000;box-shadow:10px 10px 10px #3a3b3c">
                        <i class="fa fa-usd icon circle anima" aid="0.7325797694245981" style="transition-duration: 500ms; animation-duration: 500ms; transition-timing-function: ease; transition-delay: 0ms;background:#000;color:#118C4F!important;"></i>

                          	<hr class="space s">
												<div class="row">
													<div class="col-md-12 pd-2" style="padding-left: 35px;">
														<h5 adr_trans="label_revenue">Revenue</h5>
                      <?php
                            $total1=0;
  													$get_invoiced_name_query=mysqli_query($con,"SELECT id,product_id FROM orders where status_id =3 and csr_id=$loggedin_id");
  													while(@$get_name=mysqli_fetch_assoc(@$get_invoiced_name_query))
  													{
  														$order_id=$get_name['id'];
  														  $total_cost=mysqli_query($con,"SELECT sum(total_price*quantity) as totalPrice from order_products WHERE order_id='$order_id'");
  																	while($get_product=mysqli_fetch_array($total_cost))
                                     {

  													     	@$total1 +=@$get_product['totalPrice'];
  													       }

                            }
  												?>
											   <p style="color:white;font-size:25px;font-weight:600"><label class="" data-speed="1000" data-to="<?php echo $total1;?>" style="color:white;font-size:25px;font-weight:600;color:#000"><?php echo "$".$total1; ?></label></p>
                             <a id="label_view" adr_trans="label_view" class="anima-button circle-button btn-sm" href="payment_reports.php" style="background:#118C4F!important;color:#FFF!important;font-weight:700;box-shadow:2px 2px 2px 2px #3a3b3c;"><i class="fa fa-long-arrow-right"></i>View </a>
													</div>

												</div>



		  </div><br />
		  </div>
		</div>
    <div class="">
      <div class="col-md-6">

	  <link href='../lib/main.css' rel='stylesheet' />
				<style>

				#calendar
				{
				background-color:#FFFFFF;
				}

				table td[class*="col-"], table th[class*="col-"]
				{
				background:#EEE;

				}
        .fc-day-mon,.fc-day-tue,.fc-day-wed,.fc-day-thu,.fc-day-fri
        {
        background:#DAE7BD!important;
        border:solid 1px #EEE!important;
        }
        .fc-day-sat,.fc-day-sun
        {
        background:#EEEEEE!important;

        }
        .fc-daygrid-event
        {
        background:none!important;
        }
        .status1
        {
        color:#0066FF!important;
        }

        .status3,.status6
        {
        color:#006600!important;
        }
        .status2,.status4,.status5
        {
        color:#FF9900!important;
        }

		.fc-day-mon,.fc-day-tue,.fc-day-wed,.fc-day-thu,.fc-day-fri
{
background:#FFF!important;
border:solid 1px #01A8F2!important;
}
.fc-day-sat,.fc-day-sun
{
background:#EEEEEE!important;
border:solid 1px #01A8F2!important;
}
				</style>
				<script src='../lib/main.js'></script>
			<?php
			if(@$_REQUEST['ph_id'])
{
		?>
			<script>
		var urlNew="../photographer_events.php?photographer_id=<?php echo $_REQUEST['ph_id']; ?>";
			</script>

			<?php } else {  ?>
			<script>
				var urlNew="super_event.php?csr_id=<?php echo $_SESSION['admin_loggedin_id']; ?>";

			</script>
			<?php }   ?>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
let today = new Date().toISOString().slice(0, 10)


$.ajax({
      url: urlNew,
      modal: true,
	   dataType: 'JSON',
	  success: function(response){
	 // eventData=JSON.stringify(response);
	//alert(eventData);

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: today,
      initialView: 'timeGridDay',
	  contentHeight: 275,
	   fixedWeekCount: false,
      nowIndicator: true,
       headerToolbar: {
        left: 'today',
        center: 'prev,title,next',
        right: 'timeGridWeek,timeGridDay'
      },



      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectMirror: true,
      dayMaxEvents: true,
	  displayEventTime:true,// allow "more" link when too many events
      events: response,
	    eventClick: function(info) {
		var even=info.event;
   window.location.href = "superOrder_detail.php?id="+even.extendedProps.orderId;
  }
    });

    calendar.render();



	}
	});


  });

</script>
<br />
<center>    <h5 adr_trans="label_upcoming_events">Upcoming Events</h5></center>
 <div id='calendar' style="opacity:0.8;border-radius:25px;box-shadow:10px 10px 10px 10px #DDD;"></div>
<hr class="space s">
                <center>  <a href="CSR_Calendar.php" class="anima-button circle-button btn-sm btn"><i class="fa fa-calendar"></i> <span adr_trans="label_view_calendar">View Calender</span></a>    </center>
    </div>


<!-- calendar ends -->


	  </div>
     <div class="col-md-6">
 <br />
              <center>    <h5 id="label_latest_delivered" adr_trans="label_latest_delivered">Latest Delivered Orders</h5></center>
<div class=" advs-box boxed-inverse"  style="background:#E8F0FE!important;border-radius:25px;box-shadow:10px 10px 10px 10px #DDD;opacity:0.8;height: 305px;">
       <?php

          $get_latest_delivered_query=mysqli_query($con,"SELECT * FROM `img_upload` where finished_images=1 and order_id in(select id from orders where csr_id=$_SESSION[admin_loggedin_id]) order by rand() limit 4");
          while($get_latest_delivered=mysqli_fetch_array($get_latest_delivered_query))
          {
		    $orderIDIs=$get_latest_delivered['order_id'];
		$get_address1=mysqli_query($con,"SELECT * FROM orders where id='$orderIDIs'");
		$get_address=mysqli_fetch_array($get_address1);
            ?>

            <div class="col-md-6">
              <a href="superOrder_detail.php?id=<?php echo $get_latest_delivered['order_id']; ?>">
          	<img src="../finished_images/order_<?php echo $get_latest_delivered['order_id']; ?>/<?php if($get_latest_delivered['service_id']==1){ echo "standard_photos" ;}elseif($get_latest_delivered['service_id']==2){ echo "floor_plans";}elseif($get_latest_delivered['service_id']==3){echo "Drone_photos";}else{ echo "Hdr_photos";}?>/<?php echo $get_latest_delivered['img']?>" width="230" height="125" style="padding-bottom:10px;"/>
			 <span style="position:absolute; text-align:center;z-index:2;color:#000;background:#E8F0FE!important;padding:3px;opacity:0.5;width:100%;float:left;left:0px;"><?php echo $get_address['property_address']; ?></span>
            </a>
            </div>
      <?php		}
        ?>

      </div>
    </div>


<p align="center">
 <a id="label_view_order" adr_trans="label_view_order" class="anima-button circle-button btn-sm" href="subcsrOrder_list1.php?c=1" style="margin-top:20px;"><i class="fa fa-long-arrow-right"></i>View My Orders </a>
 </p>
</div>









		  <div class="col-md-2" style="height:inherit;overflow:scroll;height:650px;overflow-x: hidden;">


				<div id="photographers" style="display:block">

				<h5 class="text-left" style="margin-left:20px;display:none" id="label_photographers" adr_trans="label_photographers">Photographers</h5>
				<p style="padding-left:3px;">
								<form name="searchByLocation" method="post" action="" style="margin-left:5px;">

				 <input type="text" list="Suggestions" multiple="multiple" class="form-control form-value" name="Photographersearch" value="" style="display:inline;font-size:12px;"  placeholder="Search Photographer" />

</form>

				</p>
<br />
				<?php

$whereIs="";
$knowMore="";
				if(@$_REQUEST['Photographersearch'])
				{
				$searchBy=$_REQUEST['Photographersearch'];
				$whereIs=" and first_name like '%$searchBy%'";
				}

				$photo=mysqli_query($con,"select * from user_login where type_of_user='Photographer' and csr_id='$subcsr' $whereIs  order by id desc");
				while($photo1=mysqli_fetch_array($photo))
				{

				?>
				<table cellspacing="0" border="0" align="center"  cellpadding="0" class="table table-responsive" style="box-shadow:5px 5px 5px #AAA;background:#DDD;color:#000;font-weight:600;opacity:0.8;border-radius:25px 25px 25px 25px;width:100%">
				<tr style="float:left;"><td rowspan="0" align="center" style="padding:25px;border:none">

				 <?php
                if ($ph=mysqli_query($con,"select * from user_login where type_of_user='Photographer' and csr_id='$subcsr' $whereIs  order by id desc")) {

                  ?>
<div ng-repeat="file in imagefinaldata" class="img_wrp" style="display: inline-block;position: relative;">

				<img   href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:underline" onclick="GetDetails(<?php echo $photo1['id']; ?>)" src="data:<?php echo $photo1['profile_pic_image_type']; ?>;base64,<?php echo base64_encode($photo1['profile_pic']); ?>" width="120" height="100"  style="max-width: 70px;"/>

				   <?php

				   $knowMore="<a href='#aboutMe'  class='lightbox link' data-lightbox-anima='show-scale' onclick='GetDetails(".$photo1['id'].")'><span adr_trans='label_know_more'>Know More</span></a>";
                }
               ?>

				<p align="center" style="padding-top:3px;"><?php echo strtoupper($photo1['first_name']); ?>
          <br />

<?php
$phidIs=$photo1['id'];
//echo "select ROUND(avg(rating)) as avgRating,photographer_id from photographer_rating group by realtor_id having photographer_id='$phidIs'";
$rating=mysqli_query($con,"select ROUND(avg(rating)) as avgRating,photographer_id from photographer_rating group by realtor_id,photographer_id having photographer_id='$phidIs'");
$ratingIs=0;
if($rating1=mysqli_fetch_array($rating))
{
$ratingIs= $rating1['avgRating'];
}



for($i=1;$i<=5;$i++)
{
if($i<=$ratingIs)
{
?>
<i class="fa fa-star" style="padding:1px;font-size:10px;color:#337AB7;"></i>
<?php } else { ?>
<i class="fa fa-star-o" style="padding:1px;color:#337AB7;font-size:10px;"></i>
<?php } } ?>

        </p><br />
<?php echo $knowMore; ?>
				</td>
				</tr>

				<tr class="fade-top" style="transition-duration: 300ms; animation-duration: 300ms; transition-timing-function: ease; transition-delay: 0ms;display:none;" id="show<?php echo $photo1['id']; ?>">
				<td>

				<a href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:none;color:#333333;padding-left:10px;" id="label_about_me" adr_trans="label_about_me" onclick="GetDetails(<?php echo $photo1['id']; ?>)">About Me</a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
				<a href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:none;color:#333333;padding-left:10px;" id="label_my_skills" adr_trans="label_my_skills" onclick="GetDetails(<?php echo $photo1['id']; ?>)">My Skills</a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
				<a href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:none;color:#333333;padding-left:10px;" id="label_portfolio" adr_trans="label_portfolio" onclick="GetDetails(<?php echo $photo1['id']; ?>)">Portfolio</a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
				<a href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:none;color:#333333;padding-left:10px;" id="label_contact" adr_trans="label_contact" onclick="GetDetails(<?php echo $photo1['id']; ?>)">Contact</a><br>
        	<a href="#aboutMe" class="lightbox link" data-lightbox-anima="show-scale" style="color:blue;text-decoration:none;color:#333333;padding-left:10px;" id="label_products" adr_trans="label_products" onclick="GetDetails(<?php echo $photo1['id']; ?>)">Products</a><br>


				</td></tr>


				</table>
	<?php } ?>


</div>

</div>



		<div id="aboutMe" class="box-lightbox white" style="padding:25px;height:336px;">
                        <div class="subtitle g" style="color:#333333">
                            <h5 style="color:#333333" align="center" id="label_photographer_details" adr_trans="label_photographer_details" >PHOTOGRAPHER DETAILS</h5>
                            <hr class="space s">

							<div class="tab-box right" data-tab-anima="fade-left">
                        <div class="panel-box col-md-8" id="resultDiv">

                        </div>
                        <ul class="nav nav-tabs col-md-4" style="height: 145.333px;">
              <li class="active" id="about" style="border-bottom:solid 1px #DDD;" ><a href="#"><i class="fa fa-user" style="color:#333333"></i><span adr_trans="label_about_me"> About Me</span></a></li>
			        <li id="skills" style="border-bottom:solid 1px #DDD;"><a href="#"><i class="fa fa-certificate" style="color:#333333"></i><span adr_trans="label_skills"> Skills</span></a></li>
              <li id="portfolio" style="border-bottom:solid 1px #DDD;"><a href="#"><i class="fa fa-list" style="color:#333333"></i><span adr_trans="label_portfolio"> Portfolio</span></a></li>
               <li id="contact" style="border-bottom:solid 1px #DDD;"><a href="#"><i class="fa fa-tablet" style="color:#333333"></i><span adr_trans="label_contact"> Contact</span></a></li>
               <li id="products" style="border-bottom:solid 1px #DDD;"><a href="#"><i class="fa fa-database" style="color:#333333"></i><span adr_trans="label_products"> Products</span></a></li>

                      </ul>
                    </div>

							</div>

</div></div>


		  </div>


		<?php include "footer.php";  ?>
