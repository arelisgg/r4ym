			<script type='text/javascript'>
				jQuery(function($){
				/* classic Button */
				$(".<?php echo $btn_w;?>").addClass('a_active');
				
				var emsmenu1 = $(".<?php echo $btn_c;?>");
				var emscmenu2 = $(".<?php echo $tx_op;?>");
				var emsinner2 = $(".<?php echo $tx_cl;?>");
				emsmenu1.on('click', function() {
					emsinner2.addClass('btn_block');
					emscmenu2.addClass('btn_none');
					$(".<?php echo $btn_w;?>").removeClass('a_active');		
					$(".<?php echo $btn_c;?>").addClass('a_active');		
					$(this).addClass('a_active');		
				});
				
				var emsmenu1 = $(".<?php echo $btn_w;?>");
				var emscmenu2 = $(".<?php echo $tx_op;?>");
				var emsinner2 = $(".<?php echo $tx_cl;?>");
				emsmenu1.on('click', function() {
					emscmenu2.removeClass('btn_none');
					emsinner2.removeClass('btn_block');
					$(".<?php echo $btn_c;?>").removeClass('a_active');
					$(".<?php echo $btn_w;?>").addClass('a_active');
					$(this).addClass('a_active');
				});	
			});
			</script>