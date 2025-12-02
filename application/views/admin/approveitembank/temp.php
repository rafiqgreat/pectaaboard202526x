<?php
if(isset($ib_b21_item1->item_id)&&$ib_b21_item1->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b21_item1->item_image_position=='Top') 
{
 	if($ib_b21_item1->item_image_en!="" && $ib_b21_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item1->item_image_en!=""&&$ib_b21_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item1->item_image_en==""&&$ib_b21_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b21_item1->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.21.1 : <?php echo html_entity_decode($ib_b21_item1->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b21_item1->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b21_item1->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  21.1 : &nbsp; <?php echo html_entity_decode($ib_b21_item1->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b21_item1->item_image_position=='Bottom') 
{
 	if($ib_b21_item1->item_image_en!="" && $ib_b21_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item1->item_image_en!=""&&$ib_b21_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item1->item_image_en==""&&$ib_b21_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b21_item1->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b21_item1->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b21_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item1->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b21_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.21.1 ($ib_b21_item1) Ends here-------------------------------------> 			
<!--------------------Question No.21.2 ($ib_b21_item2) starts here------------------------------------->
 			<?php
		   if(isset($ib_b21_item2->item_id)&&$ib_b21_item2->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b21_item2->item_image_position=='Top') 
{
 	if($ib_b21_item2->item_image_en!="" && $ib_b21_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item2->item_image_en!=""&&$ib_b21_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item2->item_image_en==""&&$ib_b21_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b21_item2->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.21.2 : <?php echo html_entity_decode($ib_b21_item2->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b21_item2->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b21_item2->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  21.2 : &nbsp; <?php echo html_entity_decode($ib_b21_item2->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b21_item2->item_image_position=='Bottom') 
{
 	if($ib_b21_item2->item_image_en!="" && $ib_b21_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item2->item_image_en!=""&&$ib_b21_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item2->item_image_en==""&&$ib_b21_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b21_item2->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b21_item2->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b21_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item2->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b21_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.21.2 ($ib_b21_item2) Ends here------------------------------------->
<!--------------------Question No.21.3 ($ib_b21_item3) starts here------------------------------------->
 			<?php
		   if(isset($ib_b21_item3->item_id)&&$ib_b21_item3->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b21_item3->item_image_position=='Top') 
{
 	if($ib_b21_item3->item_image_en!="" && $ib_b21_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item3->item_image_en!=""&&$ib_b21_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item3->item_image_en==""&&$ib_b21_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                   <?php if($ib_b21_item3->item_stem_en!='') { ?> <tr>
                        <td colspan="2" style="font-weight:bold">Question No.21.3 : <?php echo html_entity_decode($ib_b21_item3->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b21_item3->item_id);?>">Edit Item</a><?php } ?></td>
                   </tr><?php }?>
                   <?php if($ib_b21_item3->item_stem_ur!='') { ?> <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  21.3 : &nbsp; <?php echo html_entity_decode($ib_b21_item3->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b21_item3->item_image_position=='Bottom') 
{
 	if($ib_b21_item3->item_image_en!="" && $ib_b21_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item3->item_image_en!=""&&$ib_b21_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item3->item_image_en==""&&$ib_b21_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b21_item3->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b21_item3->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b21_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item3->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b21_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.21.3 ($ib_b21_item3) Ends here------------------------------------->
<!--------------------Question No.21.4 ($ib_b21_item4) starts here------------------------------------->
 			<?php
		   if(isset($ib_b21_item4->item_id)&&$ib_b21_item4->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b21_item4->item_image_position=='Top') 
{
 	if($ib_b21_item4->item_image_en!="" && $ib_b21_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item4->item_image_en!=""&&$ib_b21_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item4->item_image_en==""&&$ib_b21_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b21_item4->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.21.4 : <?php echo html_entity_decode($ib_b21_item4->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b21_item4->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b21_item4->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  21.4 : &nbsp; <?php echo html_entity_decode($ib_b21_item4->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b21_item4->item_image_position=='Bottom') 
{
 	if($ib_b21_item4->item_image_en!="" && $ib_b21_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b21_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b21_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b21_item4->item_image_en!=""&&$ib_b21_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b21_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b21_item4->item_image_en==""&&$ib_b21_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b21_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b21_item4->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b21_item4->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b21_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b21_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b21_item4->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b21_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b21_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b21_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b21_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b21_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b21_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.21 ends here------------------------------------->
<!--------------------Question No.22 START here------------------------------------->
		   <?php
		   if(isset($ib_b22_item1->item_id)&&$ib_b22_item1->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b22_item1->item_image_position=='Top') 
{
 	if($ib_b22_item1->item_image_en!="" && $ib_b22_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item1->item_image_en!=""&&$ib_b22_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item1->item_image_en==""&&$ib_b22_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b22_item1->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.22.1 :<?php echo html_entity_decode($ib_b22_item1->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b22_item1->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b22_item1->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  22.1 : &nbsp; <?php echo html_entity_decode($ib_b22_item1->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b22_item1->item_image_position=='Bottom') 
{
 	if($ib_b22_item1->item_image_en!="" && $ib_b22_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item1->item_image_en!=""&&$ib_b22_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item1->item_image_en==""&&$ib_b22_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b22_item1->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b22_item1->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b22_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item1->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b22_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.22.1 ($ib_b22_item1) Ends here-------------------------------------> 			
<!--------------------Question No.22.2 ($ib_b22_item2) starts here------------------------------------->
 			<?php
		   if(isset($ib_b22_item2->item_id)&&$ib_b22_item2->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b22_item2->item_image_position=='Top') 
{
 	if($ib_b22_item2->item_image_en!="" && $ib_b22_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item2->item_image_en!=""&&$ib_b22_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item2->item_image_en==""&&$ib_b22_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b22_item2->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.22.2 : <?php echo html_entity_decode($ib_b22_item2->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b22_item2->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b22_item2->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  22.2 : &nbsp; <?php echo html_entity_decode($ib_b22_item2->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b22_item2->item_image_position=='Bottom') 
{
 	if($ib_b22_item2->item_image_en!="" && $ib_b22_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item2->item_image_en!=""&&$ib_b22_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item2->item_image_en==""&&$ib_b22_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b22_item2->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b22_item2->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b22_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item2->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b22_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.22.2 ($ib_b22_item2) Ends here------------------------------------->
<!--------------------Question No.22.3 ($ib_b22_item3) starts here------------------------------------->
 			<?php
		   if(isset($ib_b22_item3->item_id)&&$ib_b22_item3->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b22_item3->item_image_position=='Top') 
{
 	if($ib_b22_item3->item_image_en!="" && $ib_b22_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item3->item_image_en!=""&&$ib_b22_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item3->item_image_en==""&&$ib_b22_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b22_item3->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.22.3 : <?php echo html_entity_decode($ib_b22_item3->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b22_item3->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b22_item3->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  22.3 : &nbsp; <?php echo html_entity_decode($ib_b22_item3->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b22_item3->item_image_position=='Bottom') 
{
 	if($ib_b22_item3->item_image_en!="" && $ib_b22_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item3->item_image_en!=""&&$ib_b22_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item3->item_image_en==""&&$ib_b22_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b22_item3->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b22_item3->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b22_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>

                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item3->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b22_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.22.3 ($ib_b22_item3) Ends here------------------------------------->
<!--------------------Question No.22.4 ($ib_b22_item4) starts here------------------------------------->
 			<?php
		   if(isset($ib_b22_item4->item_id)&&$ib_b22_item4->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b22_item4->item_image_position=='Top') 
{
 	if($ib_b22_item4->item_image_en!="" && $ib_b22_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item4->item_image_en!=""&&$ib_b22_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item4->item_image_en==""&&$ib_b22_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b22_item4->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.22.4 : <?php echo html_entity_decode($ib_b22_item4->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b22_item4->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b22_item4->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  22.4 : &nbsp; <?php echo html_entity_decode($ib_b22_item4->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b22_item4->item_image_position=='Bottom') 
{
 	if($ib_b22_item4->item_image_en!="" && $ib_b22_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b22_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b22_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b22_item4->item_image_en!=""&&$ib_b22_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b22_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b22_item4->item_image_en==""&&$ib_b22_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b22_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b22_item4->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b22_item4->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b22_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b22_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b22_item4->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b22_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b22_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b22_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b22_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b22_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b22_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.22 ends here------------------------------------->
<!--------------------Question No.23 START here------------------------------------->
		   <?php
		   if(isset($ib_b23_item1->item_id)&&$ib_b23_item1->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b23_item1->item_image_position=='Top') 
{
 	if($ib_b23_item1->item_image_en!="" && $ib_b23_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item1->item_image_en!=""&&$ib_b23_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item1->item_image_en==""&&$ib_b23_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                   <?php if($ib_b23_item1->item_stem_en!='') { ?> <tr>
                        <td colspan="2" style="font-weight:bold">Question No.23.1 : <?php echo html_entity_decode($ib_b23_item1->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b23_item1->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b23_item1->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  23.1 : &nbsp; <?php echo html_entity_decode($ib_b23_item1->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b23_item1->item_image_position=='Bottom') 
{
 	if($ib_b23_item1->item_image_en!="" && $ib_b23_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item1->item_image_en!=""&&$ib_b23_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item1->item_image_en==""&&$ib_b23_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b23_item1->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b23_item1->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b23_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item1->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b23_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.23.1 ($ib_b23_item1) Ends here-------------------------------------> 			
<!--------------------Question No.23.2 ($ib_b23_item2) starts here------------------------------------->
 			<?php
		   if(isset($ib_b23_item2->item_id)&&$ib_b23_item2->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b23_item2->item_image_position=='Top') 
{
 	if($ib_b23_item2->item_image_en!="" && $ib_b23_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item2->item_image_en!=""&&$ib_b23_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item2->item_image_en==""&&$ib_b23_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b23_item2->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.23.2 : <?php echo html_entity_decode($ib_b23_item2->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b23_item2->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b23_item2->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  23.2 : &nbsp; <?php echo html_entity_decode($ib_b23_item2->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b23_item2->item_image_position=='Bottom') 
{
 	if($ib_b23_item2->item_image_en!="" && $ib_b23_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item2->item_image_en!=""&&$ib_b23_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item2->item_image_en==""&&$ib_b23_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b23_item2->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b23_item2->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b23_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item2->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b23_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.23.2 ($ib_b23_item2) Ends here------------------------------------->
<!--------------------Question No.23.3 ($ib_b23_item3) starts here------------------------------------->
 			<?php
		   if(isset($ib_b23_item3->item_id)&&$ib_b23_item3->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b23_item3->item_image_position=='Top') 
{
 	if($ib_b23_item3->item_image_en!="" && $ib_b23_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item3->item_image_en!=""&&$ib_b23_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item3->item_image_en==""&&$ib_b23_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b23_item3->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.23.3 : <?php echo html_entity_decode($ib_b23_item3->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b23_item3->item_id);?>">Edit Item</a><?php } ?></td>
                    <?php }?></tr>
                    <?php if($ib_b23_item3->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  23.3 : &nbsp; <?php echo html_entity_decode($ib_b23_item3->item_stem_ur);?> </td>
                    <?php }?></tr>
<?php if ($ib_b23_item3->item_image_position=='Bottom') 
{
 	if($ib_b23_item3->item_image_en!="" && $ib_b23_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item3->item_image_en!=""&&$ib_b23_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item3->item_image_en==""&&$ib_b23_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b23_item3->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b23_item3->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b23_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item3->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b23_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.23.3 ($ib_b23_item3) Ends here------------------------------------->
<!--------------------Question No.23.4 ($ib_b23_item4) starts here------------------------------------->
 			<?php
		   if(isset($ib_b23_item4->item_id)&&$ib_b23_item4->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b23_item4->item_image_position=='Top') 
{
 	if($ib_b23_item4->item_image_en!="" && $ib_b23_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item4->item_image_en!=""&&$ib_b23_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item4->item_image_en==""&&$ib_b23_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b23_item4->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.23.4 : <?php echo html_entity_decode($ib_b23_item4->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b23_item4->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b23_item4->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  23.4 : &nbsp; <?php echo html_entity_decode($ib_b23_item4->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b23_item4->item_image_position=='Bottom') 
{
 	if($ib_b23_item4->item_image_en!="" && $ib_b23_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b23_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b23_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b23_item4->item_image_en!=""&&$ib_b23_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b23_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b23_item4->item_image_en==""&&$ib_b23_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b23_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b23_item4->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b23_item4->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b23_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b23_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b23_item4->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b23_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b23_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b23_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b23_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b23_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b23_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.23 ends here------------------------------------->
<!--------------------Question No.24 START here------------------------------------->
		   <?php
		   if(isset($ib_b24_item1->item_id)&&$ib_b24_item1->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b24_item1->item_image_position=='Top') 
{
 	if($ib_b24_item1->item_image_en!="" && $ib_b24_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item1->item_image_en!=""&&$ib_b24_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item1->item_image_en==""&&$ib_b24_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b24_item1->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.24.1 : <?php echo html_entity_decode($ib_b24_item1->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b24_item1->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b24_item1->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  24.1 : &nbsp; <?php echo html_entity_decode($ib_b24_item1->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b24_item1->item_image_position=='Bottom') 
{
 	if($ib_b24_item1->item_image_en!="" && $ib_b24_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item1->item_image_en!=""&&$ib_b24_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item1->item_image_en==""&&$ib_b24_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b24_item1->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b24_item1->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b24_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item1->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b24_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.24.1 ($ib_b24_item1) Ends here-------------------------------------> 			
<!--------------------Question No.24.2 ($ib_b24_item2) starts here------------------------------------->
 			<?php
		   if(isset($ib_b24_item2->item_id)&&$ib_b24_item2->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b24_item2->item_image_position=='Top') 
{
 	if($ib_b24_item2->item_image_en!="" && $ib_b24_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item2->item_image_en!=""&&$ib_b24_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item2->item_image_en==""&&$ib_b24_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b24_item2->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.24.2 : <?php echo html_entity_decode($ib_b24_item2->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b24_item2->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b24_item2->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  24.2 : &nbsp; <?php echo html_entity_decode($ib_b24_item2->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b24_item2->item_image_position=='Bottom') 
{
 	if($ib_b24_item2->item_image_en!="" && $ib_b24_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item2->item_image_en!=""&&$ib_b24_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item2->item_image_en==""&&$ib_b24_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b24_item2->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b24_item2->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b24_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item2->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b24_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.24.2 ($ib_b24_item2) Ends here------------------------------------->
<!--------------------Question No.24.3 ($ib_b24_item3) starts here------------------------------------->
 			<?php
		   if(isset($ib_b24_item3->item_id)&&$ib_b24_item3->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b24_item3->item_image_position=='Top') 
{
 	if($ib_b24_item3->item_image_en!="" && $ib_b24_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item3->item_image_en!=""&&$ib_b24_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item3->item_image_en==""&&$ib_b24_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                   <?php if($ib_b24_item3->item_stem_en!='') { ?> <tr>
                        <td colspan="2" style="font-weight:bold">Question No.24.3 : <?php echo html_entity_decode($ib_b24_item3->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b24_item3->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b24_item3->item_stem_ur!='') { ?> <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  24.3 : &nbsp; <?php echo html_entity_decode($ib_b24_item3->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b24_item3->item_image_position=='Bottom') 
{
 	if($ib_b24_item3->item_image_en!="" && $ib_b24_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item3->item_image_en!=""&&$ib_b24_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item3->item_image_en==""&&$ib_b24_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b24_item3->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b24_item3->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b24_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item3->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b24_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.24.3 ($ib_b24_item3) Ends here------------------------------------->
<!--------------------Question No.24.4 ($ib_b24_item4) starts here------------------------------------->
 			<?php
		   if(isset($ib_b24_item4->item_id)&&$ib_b24_item4->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b24_item4->item_image_position=='Top') 
{
 	if($ib_b24_item4->item_image_en!="" && $ib_b24_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item4->item_image_en!=""&&$ib_b24_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item4->item_image_en==""&&$ib_b24_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b24_item4->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.24.4 : <?php echo html_entity_decode($ib_b24_item4->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b24_item4->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b24_item4->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  24.4 : &nbsp; <?php echo html_entity_decode($ib_b24_item4->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b24_item4->item_image_position=='Bottom') 
{
 	if($ib_b24_item4->item_image_en!="" && $ib_b24_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b24_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b24_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b24_item4->item_image_en!=""&&$ib_b24_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b24_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b24_item4->item_image_en==""&&$ib_b24_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b24_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b24_item4->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b24_item4->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b24_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b24_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b24_item4->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b24_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b24_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b24_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b24_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b24_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b24_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.24 ends here------------------------------------->
<!--------------------Question No.25 START here------------------------------------->
		   <?php
		   if(isset($ib_b25_item1->item_id)&&$ib_b25_item1->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b25_item1->item_image_position=='Top') 
{
 	if($ib_b25_item1->item_image_en!="" && $ib_b25_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item1->item_image_en!=""&&$ib_b25_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item1->item_image_en==""&&$ib_b25_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b25_item1->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.25.1 :<?php echo html_entity_decode($ib_b25_item1->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b25_item1->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b25_item1->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  25.1 : &nbsp; <?php echo html_entity_decode($ib_b25_item1->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b25_item1->item_image_position=='Bottom') 
{
 	if($ib_b25_item1->item_image_en!="" && $ib_b25_item1->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item1->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item1->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item1->item_image_en!=""&&$ib_b25_item1->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item1->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item1->item_image_en==""&&$ib_b25_item1->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item1->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b25_item1->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b25_item1->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b25_item1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item1->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item1->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item1->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item1->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item1->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item1->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b25_item1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.25.1 ($ib_b25_item1) Ends here-------------------------------------> 			
<!--------------------Question No.25.2 ($ib_b25_item2) starts here------------------------------------->
 			<?php
		   if(isset($ib_b25_item2->item_id)&&$ib_b25_item2->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b25_item2->item_image_position=='Top') 
{
 	if($ib_b25_item2->item_image_en!="" && $ib_b25_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item2->item_image_en!=""&&$ib_b25_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item2->item_image_en==""&&$ib_b25_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b25_item2->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.25.2 : <?php echo html_entity_decode($ib_b25_item2->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b25_item2->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b25_item2->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  25.2 : &nbsp; <?php echo html_entity_decode($ib_b25_item2->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b25_item2->item_image_position=='Bottom') 
{
 	if($ib_b25_item2->item_image_en!="" && $ib_b25_item2->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item2->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item2->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item2->item_image_en!=""&&$ib_b25_item2->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item2->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item2->item_image_en==""&&$ib_b25_item2->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item2->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b25_item2->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b25_item2->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b25_item2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item2->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item2->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item2->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item2->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item2->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item2->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b25_item2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.25.2 ($ib_b25_item2) Ends here------------------------------------->
<!--------------------Question No.25.3 ($ib_b25_item3) starts here------------------------------------->
 			<?php
		   if(isset($ib_b25_item3->item_id)&&$ib_b25_item3->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b25_item3->item_image_position=='Top') 
{
 	if($ib_b25_item3->item_image_en!="" && $ib_b25_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item3->item_image_en!=""&&$ib_b25_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item3->item_image_en==""&&$ib_b25_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                   <?php if($ib_b25_item3->item_stem_en!='') { ?> <tr>
                        <td colspan="2" style="font-weight:bold">Question No.25.3 :<?php echo html_entity_decode($ib_b25_item3->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b25_item3->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b25_item3->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  25.3 : &nbsp; <?php echo html_entity_decode($ib_b25_item3->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b25_item3->item_image_position=='Bottom') 
{
 	if($ib_b25_item3->item_image_en!="" && $ib_b25_item3->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item3->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item3->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item3->item_image_en!=""&&$ib_b25_item3->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item3->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item3->item_image_en==""&&$ib_b25_item3->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item3->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b25_item3->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b25_item3->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b25_item3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item3->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item3->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item3->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item3->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item3->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item3->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b25_item3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
		   ?>
<!--------------------Question No.25.3 ($ib_b25_item3) Ends here------------------------------------->
<!--------------------Question No.25.4 ($ib_b25_item4) starts here------------------------------------->
 			<?php
		   if(isset($ib_b25_item4->item_id)&&$ib_b25_item4->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($ib_b25_item4->item_image_position=='Top') 
{
 	if($ib_b25_item4->item_image_en!="" && $ib_b25_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item4->item_image_en!=""&&$ib_b25_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item4->item_image_en==""&&$ib_b25_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if($ib_b25_item4->item_stem_en!='') { ?><tr>
                        <td colspan="2" style="font-weight:bold">Question No.25.4 : <?php echo html_entity_decode($ib_b25_item4->item_stem_en);?><?php if($this->session->userdata('role_id')==3){ ?> <a style="font-weight:normal;" target="_blank" href="<?= base_url('admin/items/edit/'.$ib_b25_item4->item_id);?>">Edit Item</a><?php } ?></td>
                    </tr><?php }?>
                    <?php if($ib_b25_item4->item_stem_ur!='') { ?><tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر  25.4 : &nbsp; <?php echo html_entity_decode($ib_b25_item4->item_stem_ur);?> </td>
                    </tr><?php }?>
<?php if ($ib_b25_item4->item_image_position=='Bottom') 
{
 	if($ib_b25_item4->item_image_en!="" && $ib_b25_item4->item_image_ur!="") 
	{
		?>
         <tr>
         	<td><img src="<?= base_url().$ib_b25_item4->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right"><img src="<?= base_url().$ib_b25_item4->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($ib_b25_item4->item_image_en!=""&&$ib_b25_item4->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$ib_b25_item4->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($ib_b25_item4->item_image_en==""&&$ib_b25_item4->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$ib_b25_item4->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}

    		if($ib_b25_item4->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" ><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($ib_b25_item4->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td style="width:50%"><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td style="width:25%"><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$ib_b25_item4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$ib_b25_item4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($ib_b25_item4->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($ib_b25_item4->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($ib_b25_item4->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($ib_b25_item4->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($ib_b25_item4->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($ib_b25_item4->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$ib_b25_item4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
	   }
		   ?>
<!--------------------Question No.25 ends here------------------------------------->
