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
		    .ui-autocomplete-loading {
        		background: white url('<?php echo base_url(); ?>images/ui-anim_basic_16x16.gif') right center no-repeat;
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
					 var cache = {},lastXhr;
				    $( "#username" ).autocomplete({
				    	 	delay: 500,
				    	 	minLength: 2,
				            source: function( request, response ) {
				                var term = request.term;
				                if ( term in cache ) {
				                    response( cache[ term ] );
				                    return;
				                }
				 
				                $.getJSON( '<?php echo base_url();?>c_load/suggestFacilityName', request, function( data, status, xhr ) {
				                    cache[ term ] = data;
				                    response( data );
				                });
				            }
				    });
		
				});//end of $(function(){
				
				
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
				
			</section>
			<form id="form-verify" class="form-login" method="post" accept-charset="utf-8">
                 
                 <div class="ui-widget">
					<input  name="username" id="username" type="text" placeholder="Facility Name" required/>
				</div>
				<p></p>
				
				<button type="submit" class="awesome myblue large" formaction="<?php echo base_url().'c_auth/go'?>" />
				Continue</button>
			</form>
		</section>
	</body>
</html>