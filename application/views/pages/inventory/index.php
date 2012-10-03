<?php
ob_start();
$sessionMFC = $this -> session -> userdata('mfc');
//$sessionCounty=$this -> session -> userdata('allCounties');
/*$accessLevel=$this -> session -> userdata('userRights');
$vehicle=$this -> session -> userdata('vehicle');
$affiliation=$this -> session -> userdata('affiliation');*/
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>DCAH::Inventory</title>
		<!-- -->
		<!-- Attach CSS files -->
		<link rel="stylesheet" href="<?php echo base_url()?>css/styles.css"/>
		
		<!-- Attach JavaScript files -->

		<!--script src="http://code.jquery.com/jquery-latest.min.js" charset="utf-8"></script-->
		<script src="<?php echo base_url()?>js/jquery-1.7.2.min.js" charset="utf-8"></script>

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
			});/*end of doc ready*/

		</script>
	
		<!--initialize all date pickers-->
		<script>
		
	    $().ready(function() {	
	
	    });/*close ready doc*/
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
				$(".form-container").load('<?php echo base_url().'c_front/formviewer';?>',function(){
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
				$("#facilityMFC").val('<?php echo $sessionMFC; ?>');
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
					var scripts=['<?php echo base_url().'js/js_ajax_load.js';?>'];
					for(i=0;i<scripts.length;i++){
						loadGlobalJS(scripts[i],function(){});
					}
					form_id='#'+$(".form-container").find('form').attr('id');
					
				}
				/*----------------------------------------------------------------------------------------------------------------*/
				
				//so which link was clicked?
			  $('.links').find('ul').on('click',function(){
				link_id='#'+$(this).find('a').attr('id');
				//alert(link_id);
				linkSub=$(link_id).attr('class');
				//alert(linkSub);
				linkIdUrl=link_id.substr(link_id.indexOf('#')+1,(link_id.indexOf('_li')-1));
				//load url based on the class and id returned
				//switch(linkSub){
				switch(link_id){
					case "#inventory_li":
					linkDomain='c_load';
					linkIdUrl='form_zinc_ors_inventory'
					break;
				}/*close the case*/
				if(linkDomain)
				//+linkDomain+'/'+linkIdUrl
				$(".form-container").load('<?php echo base_url();?>c_load/form_zinc_ors_inventory',function(){
				//delegate events
				//if(loaded==false)
				loadGlobalScript();
				//alert('done');
				
				 });
				
				})/*end of which link was clicked*/
				/*----------------------------------------------------------------------------------------------------------------*/
				
				//load zinc form on form load
		
		}); /*close document ready*/
		</script>
	</head>
	<body>
		
		<!--header banner --->   
		<?php $this->load->view('banner'); ?>
		<!--profile data here -->
		<section class="left-side">
		<section id="profile-before">
			
		<section class="title"><?php  echo 'Karibu, '. $sessionMFC;?>
			
		</section>
		<section class="other">
			<ul>
				<li>
					<?php echo anchor(base_url().'c_auth/logout','Exit', array('class' => 'awesome small'))
					?>
				</li>
			</ul></section>
		</section>
		
		<section class="form-sidebar">
				<h3>Actions</h3>
				<section class="buttons">
				<a title="To Save entered info" id="submit_form_data" class="awesome blue medium">Submit</a>
				<a title="To clear entire form" id="reset_current_form" class="awesome magenta medium">Reset</a>
				<a title="To close the form." id="close_opened_form" class="awesome red medium">Close</a></section>
		</section><!-- End of Form-SideBar -->
		</section>
		<section class="current-body">
			<nav id="pageheader" >
				<section class="search">
					<form>
						<input type="search" placeholder="Search Here" />
					</form>
				</section>
				<section class="links">
						<ul>
							<a id="inventory_li" class="current">Inventory</a>
							<a id="inventory_report_li" href="<?php echo base_url().'c_front/reports' ?>">Reports</a>
						</ul>
						</section>
					</nav>
			
						
							<!--section class="menu-container"> 
								<section class="menu salt">
											<h2>Post</h2>
											<div title="click to expand" class="max salt">+</div>
												<div title="click to minimize" class="min salt" style="display:none">-</div>
											<ul>						
												<li>
													<a id = "internalFort_A1_li" class="salt-url">Fortified Salt-Table A-1</a>
												</li>
											</ul>
										</section><!-- End of Menu: Post Data Forms -->
							</section--><!-- End of Menu-Container -->
									
									
							<section class="form-container-menu">
								<ul>
									<li><a class="awesome blue large">Zinc & ORS Inventory Status</a></li>
									<li><a class="awesome blue large">MNH & Child Health Assessment</a></li>
								</ul>
							</section>					
							<section class="form-container">
								<?php
								//echo 'facility '.$sessionMFC;
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
<?php ob_end_flush();?>