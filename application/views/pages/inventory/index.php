<?php
ob_start();
$mfName = $this -> session -> userdata('fName');
$mfCode = $this -> session -> userdata('fCode');
?>
<!DOCTYPE HTML>
<html class="no-js">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>DCAH::Inventory</title>
		<!-- -->
		<script href="<?php echo base_url(); ?>js/modernizr-latest.js"></script>
		<!-- Attach CSS files -->
		<link rel="stylesheet" href="<?php echo base_url()?>css/styles.css"/>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="<?php echo base_url()?>js/modernizr-latest.js"></script>
		
		
		<!-- Attach JavaScript files -->

		<!--script src="http://code.jquery.com/jquery-latest.min.js" charset="utf-8"></script-->
		<script src="<?php echo base_url()?>js/jquery-1.8.2.min.js" charset="utf-8"></script>

		<script src="<?php echo base_url()?>js/js_libraries.js"></script>
		<!--script to form client side validation functions-->
		<!-- Run the TAB plugin -->
		<script type="text/javascript">
			// Place all Javascript code here

			$(document).ready(function() {
				$("#showFancyModal").click(function() {
					$("#profile-fancy").addClass("show");
					return false;
				});

				$("#closeFancy").click(function() {
					$("#profile-fancy").removeClass("show");
					return false;
				});
			
				
				
				

			});
			/*end of doc ready*/

		</script>
	
		<!--initialize all date pickers-->
		<script>
			$().ready(function() {

			});
			/*close ready doc*/
		</script>
		<script type="text/javascript">
			$(function() {
				/* For zebra striping */
				$("table tr:nth-child(odd)").addClass("odd-row");
				/* For cell text alignment */
				$("table td:first-child, table th:first-child").addClass("first");
				/* For removing the last border */
				$("table td:last-child, table th:last-child").addClass("last");
			});

		</script>
		<script>
					$().ready(function(){
			/**
			 * variables
			 */
			var form_id='';
			var link_id='';
			var linkIdUrl='';
			var linkSub='';
			var linkDomain='';
			var visit_site = ''; 
			var devices='';
			
				
			    //start of close_opened_form click event
				$("#close_opened_form").click(function() {

				$(".form-container").load('<?php echo base_url() . 'c_front/formviewer'; ?>',function(){

					//delegate events
					loadGlobalScript();

					});
					});/*end of close_opened_form click event

					/*----------------------------------------------------------------------------------------------------------------*/

					/*start of loadGlobalJS*/
					var onload_queue = [];
					var dom_loaded = false;

					function loadGlobalJS(src, callback) {
					var script = document.createElement('script');
					script.type = "text/javascript";
					script.async = true;
					script.src = src;
					script.onload = script.onreadystatechange = function() {
					if (dom_loaded)
					callback();
					else
					onload_queue.push(callback);
					// clean up for IE and Opera
					script.onload = null;
					script.onreadystatechange = null;
					};
					var head = document.getElementsByTagName('head')[0];
					head.appendChild(script);
					}/*end of loadGlobalJS*/

					function domLoaded() {
					dom_loaded = true;
					var len = onload_queue.length;
					for (var i = 0; i < len; i++) {
					onload_queue[i]();
					}
					onload_queue = null;
					};/*end of domLoaded*/

					/*-----------------------------------------------------------------------------------------------------------*/

					//check box/checked radio function was here

					domLoaded();

					/*----------------------------------------------------------------------------------------------------------------*/

					/*submit form event*/
					/*start of submit_form_data click event*/
					//function triggerFormSubmit(){
					$("#submit_form_data").click(function() {

					$("#facilityMFC").val('<?php echo $mfCode; ?>');
					
					if(form_id=="#form_mnh_assessment"){
						$("#q11equipCode_28").val($("#q1_1_equipCode_28").val());
				
					}

					$(form_id).submit();

					});//}/*end of submit_form_data click event*/

					/*----------------------------------------------------------------------------------------------------------------*/

					/*reset form event*/
					/*start of reset_current_form click event*/
					$("#reset_current_form").click(function() {
					$(form_id).resetForm();

					});/*end of reset_current_form click event*/

					/*----------------------------------------------------------------------------------------------------------------*/
					var loaded=false;
					function loadGlobalScript(){
					loaded=true;

					var scripts=['<?php echo base_url();?>js/js_ajax_load.js'];

						for(i=0;i<scripts.length;i++){
						loadGlobalJS(scripts[i],function(){});
						}
						form_id='#'+$(".form-container").find('form').attr('id');

						}
						/*----------------------------------------------------------------------------------------------------------------*/

						//so which link was clicked?
						$('.form-container-menu, .form-container').find('ul li').on('click',function(){
						link_id='#'+$(this).find('a').attr('id');
						linkSub=$(link_id).attr('class');
						//alert(linkSub);
						linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
						//load url based on the class and id returned
						//switch(linkSub){
						switch(link_id){
						case "#mnh_inventory_li":
						linkDomain='c_load';
						linkIdUrl='form_mnh_equipment_assessment';
						break;
						case "#facility_registration_li":
						linkDomain='c_load';
						linkIdUrl='facility_registration';
						break;
						case "#zinc_inventory_li":
						linkDomain='c_load';
						linkIdUrl='form_zinc_ors_inventory';
						break;
						case "#instructions_li":
	                    linkDomain='c_load';
	                    linkIdUrl='instructions';
	                    break;
	                    case "#ort_li":
	                    linkDomain='c_load';
	                    linkIdUrl='form_ort';
	                    break;
						}/*close the case*/
						if(linkDomain)
						//+linkDomain+'/'+linkIdUrl

						$(".form-container").load('<?php echo base_url(); ?>'+linkDomain+'/'+linkIdUrl,function(){

				//delegate events
				
				//if(loaded==false)
				loadGlobalScript();renderFacilityInfo();
				$( "#tabs" ).tabs();
				//alert('done');
				
				 });
				
				})/*end of which link was clicked*/
				/*----------------------------------------------------------------------------------------------------------------*/
				
				//load zinc form on form load
				
				/*-----------------------------------------------------------------------------------------------------------------*/
				/*start of ajax data requests*/
				function renderFacilityInfo(){
    			 $.ajax({
		            type: "GET",

		            	url: "<?php echo base_url()?>c_load/getFacilityDetails",
						dataType:"json",
						cache:"true",
						data:"",
						success: function(data){
						var info = data.rData;
						$.each(info , function(i,facility) {
						//alert("Name: "+facility.facilityMFC);//render found data
						$("#facilityName").val(facility.facilityName);
						$("#facilityContactPerson").val(facility.facilityContactPerson);

  						$("#facilityType option").filter(function() {return $(this).text() == facility.facilityType;}).first().prop("selected", true);
  						$("#facilityLevel option").filter(function() {return $(this).text() == facility.facilityLevel;}).first().prop("selected", true);
  						$("#facilityOwner option").filter(function() {return $(this).text() == facility.facilityOwnedBy;}).first().prop("selected", true);
  						$("#facilityProvince option").filter(function() {return $(this).text() == facility.facilityProvince;}).first().prop("selected", true);
						$("#facilityDistrict option").filter(function() {return $(this).text() == facility.facilityDistrict;}).first().prop("selected", true);
						$("#facilityCounty option").filter(function() {return $(this).text() == facility.facilityCounty;}).first().prop("selected", true);

						$("#facilityEmail").val(facility.facilityEmail);
						
						/*check if there is more than 1 cell phone no.*/
						if(facility.facilityTelephone !=''){
						if(facility.facilityTelephone.indexOf('/')>0){
							//if tel no >1, split them for display seperately
							altTel=facility.facilityTelephone.split('/');
							$("#facilityTelephone").val(altTel[0]);
							$("#facilityAltTelephone").val(altTel[1]);
						}else{
						$("#facilityTelephone").val(facility.facilityTelephone);
						}
						}
						});

						//return false;
						},
						beforeSend:function(){},
						afterSend:function(){}
						});
						return false;
						}
						/*end of ajax data requests*/
						/*-----------------------------------------------------------------------------------------------------------------*/

						}); /*close document ready*/
		</script>
	</head>
	<body>
		
		<!--header banner --->   
		<?php $this -> load -> view('banner'); ?>
		<!--profile data here -->
		
	
		
		<section class="form-sidebar">
				<h3>Actions</h3>
				<section class="buttons">					
				<a title="To clear entire form" id="reset_current_form" class="awesome magenta medium">Save</a>
				<a title="To Save entered info" id="submit_form_data" class="awesome blue medium">Submit</a>
				<a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a></section>
		</section><!-- End of Form-SideBar -->
		
		<section class="current-body">
			<nav id="pageheader" >
				<section class="search">
					<form>
						<input type="search" placeholder="Search Here" />
					</form>
				</section>
				<section class="links">
					<ul>
						<a id="instructions_li" class="current">Instructions</a>
						<!--a id="inventory_report_li" href="<?php echo base_url().'c_front/reports' ?>">Reports</a-->
					</ul>
				</section>
				<section class="right-side-nav">

					<section class="sessionUser"><?php echo 'Facility:	'.$mfName ?></section>

		            <section style="float:right;margin-right:5%"><?php echo anchor(base_url().'c_auth/logout','Logout') ?></section>
	
				</section>
			</nav>
			
			
									
									
				<section class="form-container-menu">
					<ul>
						
						<li><a id="instructions_li" class="awesome blue large" style="font-size:1em;display:inline-block">Instructions</a></li>
						
						<li><a id="facility_registration_li" class="awesome blue large" style="font-size:1em;display:inline-block">Facility Registration</a></li>

						<li><a id="zinc_inventory_li" class="awesome blue large" style="font-size:1em;display:inline-block">Child Health Commodity Assessment</a></li>

						<li><a id="mnh_inventory_li" class="awesome blue large" style="font-size:1em;display:inline-block">Maternal and New-born Health Assessment</a></li>
						
						<li><a id="ort_li" class="awesome blue large" style="font-size:1em;display:inline-block">ORT Corner Assessment</a></li>
					</ul>
				</section>					
				<section class="form-container ui-widget">
					<?php

					echo $form;
					?>
				</section><!-- End of Form-Container Section-->							
			</section>
			<div id="accountSettings" class="reveal-modal">
				<div>
					
				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
		</body>
		</html>
        <?php ob_end_flush(); ?>