<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paper List</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		@import url(//fonts.googleapis.com/earlyaccess/notonastaliqurdu.css); 
	  
	   @font-face {
		font-family:"Jameel Noori Nastaleeq";
		src:url("<?= base_url()?>assets/fonts/Jameel Noori Nastaleeq.ttf");
		font-weight: bold;
		}

		.urdufont-right{
		font-family: 'Jameel Noori Nastaleeq' ,'Open Sans', sans-serif;
		direction: rtl;
		font-size:14px;
		}
		.urdufont-center{
		font-family: 'Noto Nastaliq Urdu', serif; 
		direction: rtl;
		text-align:center;
		}
		.nori_font {
		font-family: 'Jameel Noori Nastaleeq' ,'Open Sans', sans-serif;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div style="width: 100%">

				<?php
				if(!empty($items)){
					foreach($items as $item){
						if($item->item_type == 'MCQ'){
					?>
						<table width="100%" style="margin-top:10px;">
					<?php if ($item->item_image_position=='Top') 
						{
							if($item->item_image_en!="" && $item->item_image_ur!="") 
							{
								?>
									<tr>
										<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
										</td>
										<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
										</td>
									</tr>
									<?php 
							}
							elseif($item->item_image_en!=""&&$item->item_image_ur=="")
							{
							?>
					<tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
						</td>
					</tr>
					<?php 	
					}
					elseif($item->item_image_en==""&&$item->item_image_ur!="")
					{
					?>
					<tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
						</td>
					</tr>
					<?php 	
								}
							}
					?>
					<?php if ($item->item_stem_en!=""){?>
					<tr>
						<td colspan="2" style="font-weight:bold; font-size:12px">Question :
							<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
		{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
							<?php }?>
							<span style="padding-left:50px">
								<?php echo html_entity_decode($item->item_stem_en);?>
							</span>
							<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
		{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
							<?php }?>
						</td>
					</tr>
					<?php }?>

					<?php if ($item->item_stem_ur!=""){?>
					<tr>
						<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp;
							<?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
		{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
							<?php }?>
							<span style="padding-left:50px:">
								<?php echo html_entity_decode($item->item_stem_ur);?> </span>
							<?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
		{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
							<?php }?>
						</td>
					</tr>
					<?php }?>

					<?php if ($item->item_image_position=='Bottom') 
					{
						if($item->item_image_en!="" && $item->item_image_ur!="") 
						{
							?>
								<tr>
									<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
									</td>
									<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 
						}
						elseif($item->item_image_en!=""&&$item->item_image_ur=="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
						elseif($item->item_image_en==""&&$item->item_image_ur!="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
					}

				if($item->item_option_layout=='1')
				{
					?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td style="font-size:12px">(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td style="padding-left:50px">
													<div class="urdufont-right">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td style="font-size:12px">(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td style="padding-left:50px">
													<div class="urdufont-right">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td style="font-size:12px">(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td style="padding-left:50px">
													<div class="urdufont-right">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td style="font-size:12px">(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>

												<td style="padding-left:50px">
													<div class="urdufont-right" style="text-align:right">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '2' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '3' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '4' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '5' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '6' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '7' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '8' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
												<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '9' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2"><span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2"> <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2"><span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>

										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '10' )
					{
						?>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>

										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '11' )
					{
						?>
					<tr>
						<td>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
						</td>
					</tr>

					<?php
					} elseif ( $item->item_option_layout == '12' )
					{
						?>
					<tr>
						<td colspan="2">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(a)
													<span>
														<?php echo html_entity_decode($item->item_option_a_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_a_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(b)
													<span>
														<?php echo html_entity_decode($item->item_option_b_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_b_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(c)
													<span>
														<?php echo html_entity_decode($item->item_option_c_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_c_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<table border="0" cellspacing="2" cellpadding="2">
											<tr>
												<td>(d)
													<span>
														<?php echo html_entity_decode($item->item_option_d_en);?>
													</span>
												</td>
												<td>
													<div class="urdufont-right" style="padding-left:20px">
														<?php echo html_entity_decode($item->item_option_d_ur);?>
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php
					}
					?>
				</table>
					<?php 
						}
						if($item->item_type == 'ERQ'){
							?>
							 

						<?php 

  if($item->item_rubric_image!='')

  {

	  if($item->item_rubric_urdu!=''&&$item->item_rubric_english!='')

	  {?>

		  <table style="width: 100%">

			<?php if($item->item_rubric_image_position=='Top'){?>

			<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

			<?php }?>

			<tr><td style="width:50%"><?php echo html_entity_decode($item->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></td></tr>

			<?php if($item->item_rubric_image_position=='Bottom'){?>

			<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

			<?php }?>

		  </table>

	  <?php }

	  

	  elseif($item->item_rubric_urdu==''&&$item->item_rubric_english!='')

	  {?>

		  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

		  <table width="100%" >

			<?php if($item->item_rubric_image_position=='Top'){?>

			<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

			<?php }?>

		   

			<tr>

				<?php if($item->item_rubric_image_position=='Left'){?>

				<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>

				<?php }?>

			

				<td><?php echo html_entity_decode($item->item_rubric_english);?></td>

				

				<?php if($item->item_rubric_image_position=='Right'){?>

				<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>

				<?php }?>

			</tr>

		   

			<?php if($item->item_rubric_image_position=='Bottom'){?>

			<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

			<?php }?>

		  </table>

  <?php }

  

	  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')

	  { ?>

	  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>

	  <table width="100%">

		<?php if($item->item_rubric_image_position=='Top'){?>

		<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

		<?php }?>

		<tr>

			<?php if($item->item_rubric_image_position=='Left'){?>

			<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>

			<?php }?>

			<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td>

			<?php if($item->item_rubric_image_position=='Right'){?>

			<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>

			<?php }?>

		</tr>

		<?php if($item->item_rubric_image_position=='Bottom'){?>

		<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

		<?php }?>

	  </table>

  <?php }

	  

	  else

	  {?>

		  <table width="100%">

			<tr><td style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

		  </table>

  <?php }

  }

  else

  {

	  if($item->item_rubric_urdu==''&&$item->item_rubric_english!='')

	  {?>

		  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

		  <table width="100%" ><tr><td><?php echo  html_entity_decode($item->item_rubric_english);?></td></tr></table>

  <?php 

	  }

	  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')

	  { ?>

	  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>

	  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td></tr></table>

  <?php }

	  //$item->item_rubric_urdu!=''&&$item->item_rubric_english!=''

	  else

	  {

		  ?>

		  <table style="width:100%">

			<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($item->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></tr>

		  </table>

	  <?php 

	  }

  }
						}
					}
				}else{
					print '<div style="text-align:center">No data available</div>';
				}
			   ?>
			</div>
		</div>
		<!---- end  here is item view filmzy --->
	</div>
</body>
</html>

<?php

	 /*$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	 $fontDirs = $defaultConfig['fontDir'];

	 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	 $fontData = $defaultFontConfig['fontdata'];
	 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
	 'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
	'fontdata' => $fontData + [
		'urdufont' => [
			'R' => 'NotoNastaliqUrdu-Regular.ttf',
			'I' => 'NotoNastaliqUrdu-Regular.ttf',
		]
	],
	'default_font' => 'verdana']);
	$mpdf->autoScriptToLang = true;
	$mpdf->autoLangToFont = true;
	$mpdf->SetAuthor("PEC IT TEAM");
	$mpdf->SetTitle("Flimzy List");
	$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
	$filename = 'Flimzy_list';
	ob_clean();

	$mpdf->WriteHTML($html);
	$mpdf->Output($filename . '.pdf', 'D');
	exit();	*/
?>