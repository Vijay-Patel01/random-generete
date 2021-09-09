<?php
if(isset($_SESSION['disp_msg']))
{
	?>
	<div class="alert alert-success" id="show_msg" style="position: absolute;margin-left: 20%;height: 50px;">
		<h5>
			<?php 
			echo $_SESSION['disp_msg'];
			?>
		</h5>
	</div>
	<?php
	unset($_SESSION['disp_msg']); 
}
?>


