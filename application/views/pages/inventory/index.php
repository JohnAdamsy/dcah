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
					$("#next").click(function() {

					$("#facilityMFC").val('<?php echo $mfCode; ?>');
					
					if(form_id){
						$("#q11equipCode_28").val($("#q1_1_equipCode_28").val());
				
					}

					//$(form_id).submit();

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

				
				
				//load 1st section of the assessment on page load
				$(".form-container").load('<?php echo base_url() . 'c_load/get_form'; ?>',function(){

					//include remote scripts
					loadGlobalScript();renderFacilityInfo();break_form_to_steps(form_id);select_option_changed();clonable_events_register();

					});
				
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
						$("#facilityContactPerson").val(facility.facilityInchargeContactPerson);
						$("#MCHContactPerson").val(facility.facilityMCHContactPerson);
						$("#MaternityContactPerson").val(facility.facilityMaternityContactPerson);

  						$("#facilityType option").filter(function() {return $(this).text() == facility.facilityType;}).first().prop("selected", true);
  						$("#facilityLevel option").filter(function() {return $(this).text() == facility.facilityLevel;}).first().prop("selected", true);
  						$("#facilityOwner option").filter(function() {return $(this).text() == facility.facilityOwnedBy;}).first().prop("selected", true);
  						$("#facilityProvince option").filter(function() {return $(this).text() == facility.facilityProvince;}).first().prop("selected", true);
						$("#facilityDistrict option").filter(function() {return $(this).text() == facility.facilityDistrict;}).first().prop("selected", true);
						$("#facilityCounty option").filter(function() {return $(this).text() == facility.facilityCounty;}).first().prop("selected", true);

						$("#facilityEmail").val(facility.facilityInchargeEmail);
						$("#MCHEmail").val(facility.facilityMCHEmail);
						$("#MaternityEmail").val(facility.facilityMaternityEmail);
						
						/*check if there is more than 1 cell phone no.*/
						var phoneNumbers=['facility.facilityInchargeTelephone','facility.facilityMCHTelephone','facility.facilityMaternityTelephone'];
						all=phoneNumbers.length;
						
						//for(i=0;i<all,i++){
						if(facility.facilityInchargeTelephone){
						if(facility.facilityInchargeTelephone.indexOf('/')>0){
							//if tel no >1, split them for display seperately
							altTel=facility.facilityInchargeTelephone.split('/');
							$("#facilityTelephone").val(altTel[0]);
							$("#facilityAltTelephone").val(altTel[1]);
						}else{
						$("#facilityTelephone").val(facility.facilityInchargeTelephone);
						}
						}
						
						if(facility.facilityMCHTelephone){
						if(facility.facilityMCHTelephone.indexOf('/')>0){
							//if tel no >1, split them for display seperately
							altTel=facility.facilityMCHTelephone.split('/');
							$("#MCHTelephone").val(altTel[0]);
							$("#MCHTelephone").val(altTel[1]);
						}else{
						$("#MCHTelephone").val(facility.facilityMCHTelephone);
						}
						}
						
						if(facility.facilityMaternityTelephone){
						if(facility.facilityMaternityTelephone.indexOf('/')>0){
							//if tel no >1, split them for display seperately
							altTel=facility.facilityMaternityTelephone.split('/');
							$("#MaternityTelephone").val(altTel[0]);
							$("#MaternityTelephone").val(altTel[1]);
						}else{
						$("#MaternityTelephone").val(facility.facilityMaternityTelephone);
						}
						}
						//}
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
						
			
			//equipment availability change detectors			
			function select_option_changed(){
								
			
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {
                     
					var cb_id;
					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).hasClass('cloned left-combo')){

					cb_id='#'+$(this).attr('id');
					//alert(cb_id);
					
					/*
					 * display q5 comment on NO option
					 */
					if(cb_id=='#lndq4FacilityDelivery'){
						//alert(cb_id);
						if($(cb_id).val() == 'No'){
						$("#q4comm").show();
						}else{
							$("#q4comm").hide();
						}
					}
					
					/*
					 * display q6b on q6a YES option
					 */
					if(cb_id=='#lndq6aConductingDelivery'){
						if($(cb_id).val() == 'Yes'){
						$("#q6ay").show();
						}else{
							$("#q6ay").hide();
						}
					}
					
					if(cb_id.indexOf('_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")) {
						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}
					
				}
				});
				
				//enable equipment availability option
				$('#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_2i,#editEquipmentListTopButton_2ii,#editEquipmentListTopButton_2a,#editEquipmentListTopButton_2b,#editEquipmentListTopButton_1a,#editEquipmentListTopButton_1b').click(function(){
					                $('#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_2i,#tableEquipmentList_2ii,#tableEquipmentList_2a,#tableEquipmentList_2b,#tableEquipmentList_1a,#tableEquipmentList_1b').find('select:disabled').each(function(){
                	if($(this).hasClass('cloned left-combo'))
                	$(this).prop('disabled', false);
                	
                });
				//$('#tableEquipmentList').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
				
			     //hide/show  input field on Specify(other) selected
			     
				$('#sterilizationMethod,#nbcgqBloodTransfusionsDone').change(function(){
					
					method=$('#sterilizationMethod').val();
					csDone=$('#nbcgqCSDone').val();
					btDone=$('#nbcgqBloodTransfusionsDone').val();
					if(method=="other"){
						
						$("#sterilizationMethodOther").show();
					}else{
						$("#sterilizationMethodOther").hide();
					}

					if(btDone=='Yes'){
							$("#bloodBankAvailable").show();
					}else{
							$("#bloodBankAvailable").hide();
					}
					
				});
				
				/*
				 * Checking for all SELECT inputs
				 */
				$(form_id).find('select').on("change",function() {
					/*
					 * Identify the class of the SELECT input
					 * 
					 * IF(class matches 'cloned left-combo')
					 * Then
					 *  ->Get the SELECT's ID
					 * 
					 */
					if($(this).attr('class')=='cloned left-combo'){
					cb_id='#'+$(this).attr('id');
					if(cb_id.indexOf(0,'_')>0 && $(cb_id).val() !=""){
						
						//alert(cb_id);
					cb_no=cb_id.substr(cb_id.indexOf('_')+1,(cb_id.length))//for the numerical part of the id
					
					//substr(id.indexOf('_')+1,id.length)
					//cb_id=cb_id.substr(cb_id.indexOf('#'),(cb_id.indexOf('_')))//for the trimmed id
					//alert(cb_no);
					/*
					 * Checking if the user selected 'No'
					 */
					if(($(cb_id).val() == 0)||($(cb_id).val() == "No")||($(cb_id).val() == "Never Available")) {

						//alert(cb_no);
						//$('#tr_'+cb_no+':input').attr('disabled', true);
						//$('#tr_'+cb_no).hide();
						$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select').prop('disabled', true);
						}
						/*
						 * Else leave activated
						 */
						else{
							
							//$('#tr_'+cb_no).find('input,select[class="cloned"]').removeClass('.label.error');
							$('#tr_'+cb_no+',#mtr_'+cb_no).find('input,select[class="cloned"]').prop('disabled', false);
					       // $('.cloned').removeClass('error');
						}
					}//for enabling/disabling rows
					} //close if($(this).attr('class')=='cloned left-combo')
					
					//hide or show qn18 on facility's level
					$('#facilityLevel').change(function(){
						if($(this).val()<3){
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', true);
						$('hide-level').hide();
						}else{
						$('hide-level').show();	
						$('hide-level').find('input,select[class="cloned"]').prop('disabled', false);
						}
					});
					
					//specify ort supplier if other or partner is selected
					$('#ortSupplier').change(function(){
						if($(this).val()=="Partners" || $(this).val()=="Others"){
						$('#partner').show();
						}else{
							$('#partner').hide();
						}
					});
					
				
					
				
				});
				
				//to review equipment assessment--enables the disabled select options
				$('#editEquipmentListTopButton,#editEquipmentListTopButton_2,#editEquipmentListTopButton_3a,#editEquipmentListTopButton_3b,#editEquipmentListTopButton_4').click(function(){
				$('#tableEquipmentList,#tableEquipmentList_2,#tableEquipmentList_3a,#tableEquipmentList_3b,#tableEquipmentList_4').find('select[class="cloned left-combo"]').prop('disabled', false);
				});
						}//end of select_option_changed
						
				function clonable_events_register(){
					 /*----------------------------------------------------------------------------------------------------------------*/
								/*start of clone trigger functions*/
								        var t = 'default';
										var m = 'mixed';
										
										form_id='#'+$(".form-container").find('form').attr('id'); /*what form has been loaded now?*/
										var yourclass = ".clonable";
										//The class you have used in your form
										var clonecount = $(yourclass).length;
										//how many clones do we already have?
										var newid = Number(clonecount) + 1;
										
										//Id of the new clone
								$('#clonetrigger_13,#clonetrigger_14,#clonetrigger_15,#clonetrigger_16,#clonetrigger_17,#clonetrigger_18,#clonetrigger_19,#clonetrigger_20,#clonetrigger_21,#clonetrigger_22,#clonetrigger_23,#clonetrigger_24').click(function() {
										
										if($(this).attr('id')=="clonetrigger_13"){
											c_target='#formbuttons_13';
											yourclass = ".clonable.zinc.pharm";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert(clonecount );
											//alert('1');
										}else if($(this).attr('id')=="clonetrigger_14"){
											c_target='#formbuttons_14';
											yourclass = ".clonable.ors.pharm";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_15"){
											c_target='#formbuttons_15';
											yourclass = ".clonable.cip.pharm";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_16"){
											c_target='#formbuttons_16';
											yourclass = ".clonable.met.pharm";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_17"){
											c_target='#formbuttons_17';
											yourclass = ".clonable.zinc.sto";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_18"){
											c_target='#formbuttons_18';
											yourclass = ".clonable.ors.sto";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_19"){
											c_target='#formbuttons_19';
											yourclass = ".clonable.cip.sto";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_20"){
											c_target='#formbuttons_20';
											yourclass = ".clonable.met.sto";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_21"){
											c_target='#formbuttons_21';
											yourclass = ".clonable.zinc.oth";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_22"){
											c_target='#formbuttons_22';
											yourclass = ".clonable.ors.oth";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_23"){
											c_target='#formbuttons_23';
											yourclass = ".clonable.cip.oth";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}else if($(this).attr('id')=="clonetrigger_24"){
											c_target='#formbuttons_24';
											yourclass = ".clonable.met.oth";
											clonecount = $(yourclass).length;
											newid = Number(clonecount) + 1;
											//alert('2');
										}
					
										$(yourclass + ":first").fieldclone({//Clone the original element
											newid_ : newid, //Id of the new clone, (you can pass your own if you want)
											target_ : $(c_target), //where do we insert the clone? (target element)
											insert_ : "before", //where do we insert the clone? (after/before/append/prepend...)
											limit_ : 0			//Maximum Number of Clones
										});
										
										
										/*reinitialize datepicker options on the cloned item*/
										$('.clonable label.error').remove();
										$('.cloned').removeClass('error');
										$('.autoDate').removeClass('hasDatepicker error');
										$('.futureDate').removeClass('hasDatepicker error');
							            $('.autoDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '-10y', maxDate: "0D"});
							            $('.futureDate').datepicker({defaultDate:new Date(),changeMonth: true,changeYear: true,dateFormat:"yy-mm-dd",minDate: '0y', maxDate: "2y"});
							          
							            /*reinitialize timepicker options on the cloned item*/
							            $('.mobiscroll').removeClass('scroller');
					                    $('.mobiscroll').scroller({preset:'time'});
					
										
										$('.mobiscroll').scroller('destroy').scroller({ preset: 'time', theme: t, mode: m });
							 
										return  false;
									});/*end of clone trigger*/
				
				/*----------------------------------------------------------------------------------------------------------------*/
				/*----------------------------------------------------------------------------------------------------------------*/
									/*start of clone_remove*/
									$('#cloneremove_13,#cloneremove_14,#cloneremove_15,#cloneremove_16,#cloneremove_17,#cloneremove_18,#cloneremove_19,#cloneremove_20,#cloneremove_21,#cloneremove_22,#cloneremove_23,#cloneremove_24').click(function() {
										//alert($(".clonable").find("tr:last").attr('name'));
									
											if($(this).attr('id')=='cloneremove_13'){
												if($(".clonable.zinc.pharm").length>1)
												$(".clonable.zinc.pharm:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_14'){
												if($(".clonable.ors.pharm").length>1)
												$(".clonable.ors.pharm:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_15'){
												if($(".clonable.cip.pharm").length>1)
												$(".clonable.cip.pharm:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_16'){
												if($(".clonable.met.pharm").length>1)
												$(".clonable.met.pharm:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_17'){
												if($(".clonable.zinc.sto").length>1)
												$(".clonable.zinc.sto:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_18'){
												if($(".clonable.ors.sto").length>1)
												$(".clonable.ors.sto:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_19'){
												if($(".clonable.cip.sto").length>1)
												$(".clonable.cip.sto:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_20'){
												if($(".clonable.met.sto").length>1)
												$(".clonable.met.sto:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_21'){
												if($(".clonable.zinc.oth").length>1)
												$(".clonable.zinc.oth:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_22'){
												if($(".clonable.ors.oth").length>1)
												$(".clonable.ors.oth:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_23'){
												if($(".clonable.cip.oth").length>1)
												$(".clonable.cip.oth:last").after().remove();
											}else if($(this).attr('id')=='cloneremove_24'){
												if($(".clonable.met.oth").length>1)
												$(".clonable.met.oth:last").after().remove();
											}
										
									 return false;
									 });
									 /*end of clone_remove*/
				/*-----------------------------------------------------------------------------------------------------------------*/
				}//end of clonable_events_register
						

						}); /*close document ready*/
						
					
						function break_form_to_steps(form_id){
							//form_id='#zinc_ors_inventory';
						   //alert(form_id);	
						   var end_url;
								$(form_id).formwizard({ 
								 	formPluginEnabled: false,
								 	validationEnabled: false,
								 	historyEnabled:true,
								 	focusFirstInput : true,
								 	formOptions :{
										//success: function(data){$("#status").fadeTo(500,1,function(){ $(this).html("Thank you for completing this assessment! :) ").fadeTo(5000, 0); })},
										//beforeSubmit: function(data){$("#data").html("Processing...");},
										dataType: 'json',
										resetForm: true,
										disableUIStyles:true
								 	}
								 });
								 
								 //remove some jQueryUI styles
								$(form_id).find('input,select,radio,form').removeClass('ui-helper-reset ui-state-default ui-helper-reset ui-wizard-content');
								
								  var remoteAjax = {}; // empty options object

								$(form_id+" .step").each(function(){ // for each step in the wizard, add an option to the remoteAjax object...
									remoteAjax[$(this).attr("id")] = {
										url : "<?php echo base_url()?>submit/c_form/data_handler", // the url which stores the stuff in db for each step
										dataType : 'json',
										beforeSubmit: function(data){$("#data").html("<div class='error ui-autocomplete-loading' style='width:auto;height:25px'>Processing...</div>")},
										//beforeSubmit: function(data){$("#data").html("Saving the previous section's response")},
										success : function(data){
										 			if(data){ //data is either true or false (returned from store_in_database.html) simulating successful / failing store
											 			$("#data").show();
											 			$("#data").html("...Data was saved successfully");
											 		}else{
											 			alert("An internal error occurred, nothing was stored.");
											 			return false;
											 		}
											 		
										 			return data; //return true to make the wizard move to the next step, false will cause the wizard to stay on the CV step (change this in store_in_database.html)
										 		}
										};
										
										
								});
						
								$(form_id).formwizard("option", "remoteAjax", remoteAjax); // set the remoteAjax option for the wizard
								
								$(form_id).bind("before_step_shown", function(event, data){
									
									if(data.previousStep=='beginMNH'){
										//alert('yes');
										if(data.currentStep=='No'){
										$("#data").fadeTo(5000,0);
										$('#buttonsPane').hide();
										}
									}else if(data.currentStep=='level_4_above'){
										$('#'+data.backButton).prop('disabled',true);
									}else{
										$('#buttonsPane').show();
									}
								});
								
								//disable or enable maternity contact information on check	
								 $('#noMaternityContact').change(function(){
								 	if($(this).is(':checked')){
								 		$('#maternity_info').find('input').prop('disabled', true);
								 		$('#maternity_info').hide();
								 	}else{
								 		$('#maternity_info').show();
								 		$('#maternity_info').find('input').prop('disabled', false);
								 	}
								 });
								 
								
			
				  	}
				  	
						/*---------------------end form wizard functions----------------------------------------------------------------*/
						
		</script>
		
		<style type="text/css">
		#buttonsPane{
			    margin-top : 0.5em;
				margin-right : 1em;
				text-align: right;
			}
		.ui-autocomplete-loading {
        		background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
    		}
		</style>
	</head>
	<body>
		
		<!--header banner --->   
		<?php $this -> load -> view('banner'); ?>
		<!--profile data here -->
		
	
		
		<!--div class="form-sidebar">
				<h3>Actions</h3>
				<div class="buttons">					
				<a title="To clear entire form" id="reset_current_form" class="awesome magenta medium">Save</a>
				<a title="To Save entered info" id="submit_form_data" class="awesome blue medium">Submit</a>
				<a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a>
				</div>
		</div--><!-- End of Form-SideBar -->
		
		<div class="current-body">
			<div id="pageheader" >
				<div class="search">
					<form>
						<input type="search" placeholder="Search Here" />
					</form>
				</div>
				<div class="links">
					<ul>
						<!--a id="instructions_li" class="current">Instructions</a>
						<!--a id="inventory_report_li" href="<?php echo base_url().'c_front/reports' ?>">Reports</a-->
					</ul>
				</div>
				<div class="right-side-nav">

			

		            <!--div style="float:right;margin-right:5%"><?php echo anchor(base_url().'c_auth/logout','Logout') ?></div-->
	
				</div>
			</div>
			
			
									
									
				<div class="form-container-menu">
					<div class="sessionUser msg guide "><?php echo '<li>Facility Code :</li><li style="color:#AA1317">'.$mfCode.'</li>       <li>Facility:	</li><a style="color:#AA1317">'.$mfName.'</li>      <li title="click to sign out">'. anchor(base_url().'c_auth/logout','Logout').'</li>';?></div><br>
								
					<!--ul>
						
						<li><a id="instructions_li" class="awesome blue large" style="font-size:1em;display:inline-block;float:left">Instructions</a></li>
						
						<!--li><a id="facility_registration_li" class="awesome blue large" style="font-size:1em;display:inline-block">Facility Registration</a></li-->

						<!--li><a id="zinc_inventory_li" class="awesome blue large" style="font-size:1em;display:inline-block;float:left">Child Health Commodity Assessment</a></li>

						<li><a id="mnh_inventory_li" class="awesome blue large" style="font-size:1em;display:inline-block;float:left">Maternal and New-born Health Assessment</a></li>
						
						<!--li><a id="ort_li" class="awesome blue large" style="font-size:1em;display:inline-block">ORT Corner Assessment</a></li-->
					<!--/ul -->
					
				</div>	
						
				<div class="form-container ui-widget">
					
					<?php

					echo $form;
					?>
				</div><!-- End of Form-Container div-->							
			</div>
			<div id="accountSettings" class="reveal-modal">
				<div>
					
				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
			<!--begin form wizard functions-->
						
		</body>
		</html>
        <?php ob_end_flush(); ?>