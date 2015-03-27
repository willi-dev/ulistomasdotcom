<?php 
	$this->load->view('public/templates/public-header');
?>
<script type="text/javascript">
$(document).ready(function(){
	// CENTER WELCOME PAGE
	$('#front').css('margin-top', ($(window).height()- $('#frontimg').height()) / 2 + "px");
	$('#front').css('margin-left', ($('.container').width()- $('#front').width()) / 2 + "px");
});
</script>
<div class="span-24" id="full">
	<div id="front" class="span-12">
		<?php echo anchor('frontpage', '<img src="uploads/frontpage/ulistomas_resize.jpg" id="frontimg" />'); ?>
	</div>
<br>
</div>