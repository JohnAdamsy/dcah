<html>
	<head>
		<link href="<?php echo base_url(); ?>css/layout.css" rel="stylesheet" type="text/css" />
		<!-- -->
		<!-- Attach CSS files -->
	
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css"/>
		
		<style>
		    .ui-autocomplete {
		        max-height: 100px;
		        overflow-y: auto;
		        /* prevent horizontal scrollbar */
		        overflow-x: hidden;
		        background:#FFFFFF;
		        border:1px solid #999;
		        width:25%;
		    }
		    .ui-menu-item{
		    	cursor:pointer;
		    }
		    .ui-menu-item:hover{
		    	color:#3333FF;
		    	cursor:hand;
		    }
		    /* IE 6 doesn't support max-height
		     * we use height instead, but this forces the menu to always be this tall
		     */
		    html .ui-autocomplete {
		        height: 100px;
		    }
     </style>
		
		<!--link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css"/-->
		<!-- Attach JavaScript files -->
		<!--script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="js/jquery.orbit.js" type="text/javascript"></script-->
		<script src="js/js_libraries.js" type="text/javascript"></script>
		<script src="js/js_ajax_load.js" type="text/javascript"></script>
		<script>
			$().ready(function(){
				var foundNames;
				$(function(){
					//load json data
					$.ajax({
							url:"<?php echo base_url();?>c_load/suggest",
							data:'',
							dataType:"json",
							type:"POST",
							success:function(data){
								//foundNames=data;
								//alert(response(data));
								$( "#username" ).autocomplete({
				            		source: data
				       			 });
							}
					});
		
				});
				
			});
		
		</script>
	</head>
	<body>
		<?php $this->load->view('banner');?>

		<section class="message">
			<?php echo $form; ?>
		</section>
		<section class="login">
			<section class="form-title">
				<section class="title-text">
					Facility Identification
				</section>
			</section>
			<form id="form-verify" class="form-login" method="post" accept-charset="utf-8">
                 
                 <div class="ui-widget">
					<input  name="username" id="username" type="text" placeholder="Facility Name" required/>
				</div>
				<p></p>
				<section class="confirm">

					Facility MFL Code

				</section>
				<button type="submit" class="awesome myblue large" formaction="<?php echo base_url().'c_auth/go'?>" />
				Continue</button>
			</form>
		</section>
	</body>
</html>