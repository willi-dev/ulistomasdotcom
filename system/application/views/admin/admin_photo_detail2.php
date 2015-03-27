<?php
	$this->load->view('admin/admin_header');
?>
	<div id="dashboard"><!-- START OF DIV DASHBOARD -->
		<ul class="css-tabs">
			<li class="tab"><a href="#">list of photo</a></li>
			<li class="tab"><a href="#">pilih thumbnail</a></li>
		</ul>
		<div class="css-panes">
			<div>
			<?php
			if(isset($getdetail)){
			$no=1;
			foreach($getdetail as $gd){
				if($no%3==0){
					$last='last';
				}else{
					$last='';
				}?>
				
				<div class="imgteaser span-4 <?php echo $last?>">
				<?php echo anchor('admin/deleachphoto/'.$gd->id_title_photopost.'/'.$gd->id,'<img src="'.base_url().$gd->thumb.'" class="" width="142px"/>
					<span class="caption">
						hapus
					</span>',array('class'=>'delete','onclick'=>"return confirm('Apakah photo ini ingin dihapus?')"));
				?></div><?php
				$no++;
			}
			}
?>
			</div>
			<div></div>
		</div>
	</div><!-- END OF DASHBOARD -->
<?php
	$this->load->view('admin/admin_footer');
?>