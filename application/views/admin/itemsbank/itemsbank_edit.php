  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit ItemsBank </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemsbank'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  ItemsBank List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
           <?php echo '<PRE>';
		   		 print_r($itemsbank);
				 die();?>
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemsbank/edit/'.$itemsbank['ib_id']), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="itembank_edit" name="itembank_edit" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="ib_title" class="col-sm-12 control-label">ItemBank Title *</label>
                   <input type="text" name="ib_title" class="form-control" id="ib_title" placeholder="" required="required" value="" >
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="ib_created" class="col-sm-12 control-label">Date *</label>
                    <input type="date" name="ib_created" class="form-control" id="ib_created" placeholder="" required="required" value="<?php echo date("d/m/Y"); ?>" >
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="ib_year" class="col-sm-12 control-label">Year *</label>
                    <input type="number" name="ib_year" class="form-control" id="ib_year" placeholder="2021" required="required"  value="2021" >
                </div>
             </div>
			<div class="row">
              	<div class="col-lg-4 col-sm-12">  
					<label for="ib_grade_id" class="control-label">Grade *</label>
					<select name="ib_grade_id" class="form-control form-group" id="ib_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>                    
                </div>
				<div class="col-lg-4 col-sm-12">                         
                   <label for="ib_subject_id" class="control-label">Subject *</label>
                <select name="ib_subject_id" class="form-control form-group" id="ib_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>
              </div>
            
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------Start Block-1------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-1/Question-1 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 1.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_cs_id_1" class="form-control form-group" id="ib_b1_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_scs_id_1" class="form-control form-group" id="ib_b1_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_slo_id_1" class="form-control form-group" id="ib_b1_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b1_item1" class="form-control form-group" id="ib_b1_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 1.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_cs_id_2" class="form-control form-group" id="ib_b1_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_scs_id_2" class="form-control form-group" id="ib_b1_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_slo_id_2" class="form-control form-group" id="ib_b1_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b1_item2" class="form-control form-group" id="ib_b1_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 1.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_cs_id_3" class="form-control form-group" id="ib_b1_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_scs_id_3" class="form-control form-group" id="ib_b1_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_slo_id_3" class="form-control form-group" id="ib_b1_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b1_item3" class="form-control form-group" id="ib_b1_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 1.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_cs_id_4" class="form-control form-group" id="ib_b1_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b1_scs_id_4" class="form-control form-group" id="ib_b1_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b1_slo_id_4" class="form-control form-group" id="ib_b1_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b1_item4" class="form-control form-group" id="ib_b1_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>

			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-1------------------------------------------------------------> 
<?php /*?> 
<!---------------------------------------------Start Block-2------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-2/Question-2 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 2.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_cs_id_1" class="form-control form-group" id="ib_b2_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_scs_id_1" class="form-control form-group" id="ib_b2_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_slo_id_1" class="form-control form-group" id="ib_b2_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b2_item1" class="form-control form-group" id="ib_b2_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 2.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_cs_id_2" class="form-control form-group" id="ib_b2_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_scs_id_2" class="form-control form-group" id="ib_b2_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_slo_id_2" class="form-control form-group" id="ib_b2_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b2_item2" class="form-control form-group" id="ib_b2_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 2.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_cs_id_3" class="form-control form-group" id="ib_b2_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_scs_id_3" class="form-control form-group" id="ib_b2_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_slo_id_3" class="form-control form-group" id="ib_b2_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b2_item3" class="form-control form-group" id="ib_b2_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 2.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_cs_id_4" class="form-control form-group" id="ib_b2_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b2_scs_id_4" class="form-control form-group" id="ib_b2_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b2_slo_id_4" class="form-control form-group" id="ib_b2_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b2_item4" class="form-control form-group" id="ib_b2_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-2------------------------------------------------------------> 
<!---------------------------------------------Start Block-3------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-3/Question-3 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 3.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_cs_id_1" class="form-control form-group" id="ib_b3_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_scs_id_1" class="form-control form-group" id="ib_b3_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_slo_id_1" class="form-control form-group" id="ib_b3_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b3_item1" class="form-control form-group" id="ib_b3_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 3.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_cs_id_2" class="form-control form-group" id="ib_b3_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_scs_id_2" class="form-control form-group" id="ib_b3_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_slo_id_2" class="form-control form-group" id="ib_b3_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b3_item2" class="form-control form-group" id="ib_b3_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 3.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_cs_id_3" class="form-control form-group" id="ib_b3_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_scs_id_3" class="form-control form-group" id="ib_b3_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_slo_id_3" class="form-control form-group" id="ib_b3_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b3_item3" class="form-control form-group" id="ib_b3_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 3.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_cs_id_4" class="form-control form-group" id="ib_b3_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b3_scs_id_4" class="form-control form-group" id="ib_b3_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b3_slo_id_4" class="form-control form-group" id="ib_b3_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b3_item4" class="form-control form-group" id="ib_b3_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-3------------------------------------------------------------> 
<!---------------------------------------------Start Block-4------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-4/Question-4 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 4.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_cs_id_1" class="form-control form-group" id="ib_b4_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_scs_id_1" class="form-control form-group" id="ib_b4_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_slo_id_1" class="form-control form-group" id="ib_b4_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b4_item1" class="form-control form-group" id="ib_b4_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 4.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_cs_id_2" class="form-control form-group" id="ib_b4_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_scs_id_2" class="form-control form-group" id="ib_b4_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_slo_id_2" class="form-control form-group" id="ib_b4_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b4_item2" class="form-control form-group" id="ib_b4_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 4.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_cs_id_3" class="form-control form-group" id="ib_b4_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_scs_id_3" class="form-control form-group" id="ib_b4_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_slo_id_3" class="form-control form-group" id="ib_b4_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b4_item3" class="form-control form-group" id="ib_b4_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 4.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_cs_id_4" class="form-control form-group" id="ib_b4_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b4_scs_id_4" class="form-control form-group" id="ib_b4_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b4_slo_id_4" class="form-control form-group" id="ib_b4_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b4_item4" class="form-control form-group" id="ib_b4_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-4------------------------------------------------------------> 
<!---------------------------------------------Start Block-5------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-5/Question-5 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 5.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_cs_id_1" class="form-control form-group" id="ib_b5_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_scs_id_1" class="form-control form-group" id="ib_b5_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_slo_id_1" class="form-control form-group" id="ib_b5_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b5_item1" class="form-control form-group" id="ib_b5_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 5.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_cs_id_2" class="form-control form-group" id="ib_b5_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_scs_id_2" class="form-control form-group" id="ib_b5_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_slo_id_2" class="form-control form-group" id="ib_b5_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b5_item2" class="form-control form-group" id="ib_b5_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 5.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_cs_id_3" class="form-control form-group" id="ib_b5_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_scs_id_3" class="form-control form-group" id="ib_b5_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_slo_id_3" class="form-control form-group" id="ib_b5_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b5_item3" class="form-control form-group" id="ib_b5_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 5.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_cs_id_4" class="form-control form-group" id="ib_b5_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b5_scs_id_4" class="form-control form-group" id="ib_b5_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b5_slo_id_4" class="form-control form-group" id="ib_b5_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b5_item4" class="form-control form-group" id="ib_b5_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-5------------------------------------------------------------> 
<!---------------------------------------------Start Block-6------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-6/Question-6 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 6.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_cs_id_1" class="form-control form-group" id="ib_b6_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_scs_id_1" class="form-control form-group" id="ib_b6_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_slo_id_1" class="form-control form-group" id="ib_b6_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b6_item1" class="form-control form-group" id="ib_b6_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 6.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_cs_id_2" class="form-control form-group" id="ib_b6_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_scs_id_2" class="form-control form-group" id="ib_b6_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_slo_id_2" class="form-control form-group" id="ib_b6_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b6_item2" class="form-control form-group" id="ib_b6_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 6.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_cs_id_3" class="form-control form-group" id="ib_b6_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_scs_id_3" class="form-control form-group" id="ib_b6_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_slo_id_3" class="form-control form-group" id="ib_b6_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b6_item3" class="form-control form-group" id="ib_b6_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 6.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_cs_id_4" class="form-control form-group" id="ib_b6_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b6_scs_id_4" class="form-control form-group" id="ib_b6_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b6_slo_id_4" class="form-control form-group" id="ib_b6_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b6_item4" class="form-control form-group" id="ib_b6_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-6------------------------------------------------------------> 
<!---------------------------------------------Start Block-7------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-7/Question-7 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 7.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_cs_id_1" class="form-control form-group" id="ib_b7_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_scs_id_1" class="form-control form-group" id="ib_b7_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_slo_id_1" class="form-control form-group" id="ib_b7_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b7_item1" class="form-control form-group" id="ib_b7_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 7.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_cs_id_2" class="form-control form-group" id="ib_b7_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_scs_id_2" class="form-control form-group" id="ib_b7_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_slo_id_2" class="form-control form-group" id="ib_b7_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b7_item2" class="form-control form-group" id="ib_b7_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 7.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_cs_id_3" class="form-control form-group" id="ib_b7_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_scs_id_3" class="form-control form-group" id="ib_b7_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_slo_id_3" class="form-control form-group" id="ib_b7_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b7_item3" class="form-control form-group" id="ib_b7_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 7.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_cs_id_4" class="form-control form-group" id="ib_b7_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b7_scs_id_4" class="form-control form-group" id="ib_b7_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b7_slo_id_4" class="form-control form-group" id="ib_b7_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b7_item4" class="form-control form-group" id="ib_b7_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-7------------------------------------------------------------> 
<!---------------------------------------------Start Block-8------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-8/Question-8 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 8.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_cs_id_1" class="form-control form-group" id="ib_b8_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_scs_id_1" class="form-control form-group" id="ib_b8_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_slo_id_1" class="form-control form-group" id="ib_b8_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b8_item1" class="form-control form-group" id="ib_b8_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 8.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_cs_id_2" class="form-control form-group" id="ib_b8_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_scs_id_2" class="form-control form-group" id="ib_b8_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_slo_id_2" class="form-control form-group" id="ib_b8_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b8_item2" class="form-control form-group" id="ib_b8_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 8.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_cs_id_3" class="form-control form-group" id="ib_b8_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_scs_id_3" class="form-control form-group" id="ib_b8_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_slo_id_3" class="form-control form-group" id="ib_b8_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b8_item3" class="form-control form-group" id="ib_b8_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 8.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_cs_id_4" class="form-control form-group" id="ib_b8_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b8_scs_id_4" class="form-control form-group" id="ib_b8_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b8_slo_id_4" class="form-control form-group" id="ib_b8_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b8_item4" class="form-control form-group" id="ib_b8_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-8------------------------------------------------------------> 
<!---------------------------------------------Start Block-9------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-9/Question-9 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 9.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_cs_id_1" class="form-control form-group" id="ib_b9_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_scs_id_1" class="form-control form-group" id="ib_b9_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_slo_id_1" class="form-control form-group" id="ib_b9_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b9_item1" class="form-control form-group" id="ib_b9_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 9.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_cs_id_2" class="form-control form-group" id="ib_b9_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_scs_id_2" class="form-control form-group" id="ib_b9_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_slo_id_2" class="form-control form-group" id="ib_b9_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b9_item2" class="form-control form-group" id="ib_b9_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 9.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_cs_id_3" class="form-control form-group" id="ib_b9_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_scs_id_3" class="form-control form-group" id="ib_b9_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_slo_id_3" class="form-control form-group" id="ib_b9_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b9_item3" class="form-control form-group" id="ib_b9_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 9.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_cs_id_4" class="form-control form-group" id="ib_b9_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b9_scs_id_4" class="form-control form-group" id="ib_b9_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b9_slo_id_4" class="form-control form-group" id="ib_b9_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b9_item4" class="form-control form-group" id="ib_b9_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-9------------------------------------------------------------> 
<!---------------------------------------------Start Block-10------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-10/Question-10 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 10.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_cs_id_1" class="form-control form-group" id="ib_b10_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_scs_id_1" class="form-control form-group" id="ib_b10_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_slo_id_1" class="form-control form-group" id="ib_b10_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b10_item1" class="form-control form-group" id="ib_b10_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 10.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_cs_id_2" class="form-control form-group" id="ib_b10_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_scs_id_2" class="form-control form-group" id="ib_b10_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_slo_id_2" class="form-control form-group" id="ib_b10_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b10_item2" class="form-control form-group" id="ib_b10_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 10.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_cs_id_3" class="form-control form-group" id="ib_b10_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_scs_id_3" class="form-control form-group" id="ib_b10_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_slo_id_3" class="form-control form-group" id="ib_b10_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b10_item3" class="form-control form-group" id="ib_b10_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 10.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_cs_id_4" class="form-control form-group" id="ib_b10_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b10_scs_id_4" class="form-control form-group" id="ib_b10_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b10_slo_id_4" class="form-control form-group" id="ib_b10_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b10_item4" class="form-control form-group" id="ib_b10_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-10------------------------------------------------------------> 
<!---------------------------------------------Start Block-11------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-11/Question-11 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 11.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_cs_id_1" class="form-control form-group" id="ib_b11_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_scs_id_1" class="form-control form-group" id="ib_b11_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_slo_id_1" class="form-control form-group" id="ib_b11_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b11_item1" class="form-control form-group" id="ib_b11_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 11.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_cs_id_2" class="form-control form-group" id="ib_b11_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_scs_id_2" class="form-control form-group" id="ib_b11_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_slo_id_2" class="form-control form-group" id="ib_b11_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b11_item2" class="form-control form-group" id="ib_b11_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 11.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_cs_id_3" class="form-control form-group" id="ib_b11_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_scs_id_3" class="form-control form-group" id="ib_b11_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_slo_id_3" class="form-control form-group" id="ib_b11_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b11_item3" class="form-control form-group" id="ib_b11_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 11.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_cs_id_4" class="form-control form-group" id="ib_b11_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b11_scs_id_4" class="form-control form-group" id="ib_b11_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b11_slo_id_4" class="form-control form-group" id="ib_b11_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b11_item4" class="form-control form-group" id="ib_b11_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-11------------------------------------------------------------> 
<!---------------------------------------------Start Block-12------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-12/Question-12 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 12.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_cs_id_1" class="form-control form-group" id="ib_b12_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_scs_id_1" class="form-control form-group" id="ib_b12_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_slo_id_1" class="form-control form-group" id="ib_b12_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b12_item1" class="form-control form-group" id="ib_b12_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 12.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_cs_id_2" class="form-control form-group" id="ib_b12_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_scs_id_2" class="form-control form-group" id="ib_b12_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_slo_id_2" class="form-control form-group" id="ib_b12_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b12_item2" class="form-control form-group" id="ib_b12_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 12.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_cs_id_3" class="form-control form-group" id="ib_b12_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_scs_id_3" class="form-control form-group" id="ib_b12_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_slo_id_3" class="form-control form-group" id="ib_b12_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b12_item3" class="form-control form-group" id="ib_b12_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 12.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_cs_id_4" class="form-control form-group" id="ib_b12_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b12_scs_id_4" class="form-control form-group" id="ib_b12_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b12_slo_id_4" class="form-control form-group" id="ib_b12_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b12_item4" class="form-control form-group" id="ib_b12_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-12------------------------------------------------------------> 
<!---------------------------------------------Start Block-13------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-13/Question-13 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 13.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_cs_id_1" class="form-control form-group" id="ib_b13_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_scs_id_1" class="form-control form-group" id="ib_b13_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_slo_id_1" class="form-control form-group" id="ib_b13_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b13_item1" class="form-control form-group" id="ib_b13_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 13.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_cs_id_2" class="form-control form-group" id="ib_b13_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_scs_id_2" class="form-control form-group" id="ib_b13_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_slo_id_2" class="form-control form-group" id="ib_b13_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b13_item2" class="form-control form-group" id="ib_b13_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 13.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_cs_id_3" class="form-control form-group" id="ib_b13_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_scs_id_3" class="form-control form-group" id="ib_b13_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_slo_id_3" class="form-control form-group" id="ib_b13_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b13_item3" class="form-control form-group" id="ib_b13_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 13.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_cs_id_4" class="form-control form-group" id="ib_b13_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b13_scs_id_4" class="form-control form-group" id="ib_b13_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b13_slo_id_4" class="form-control form-group" id="ib_b13_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b13_item4" class="form-control form-group" id="ib_b13_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-13------------------------------------------------------------> 
<!---------------------------------------------Start Block-14------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-14/Question-14 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 14.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_cs_id_1" class="form-control form-group" id="ib_b14_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_scs_id_1" class="form-control form-group" id="ib_b14_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_slo_id_1" class="form-control form-group" id="ib_b14_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b14_item1" class="form-control form-group" id="ib_b14_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 14.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_cs_id_2" class="form-control form-group" id="ib_b14_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_scs_id_2" class="form-control form-group" id="ib_b14_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_slo_id_2" class="form-control form-group" id="ib_b14_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b14_item2" class="form-control form-group" id="ib_b14_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 14.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_cs_id_3" class="form-control form-group" id="ib_b14_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_scs_id_3" class="form-control form-group" id="ib_b14_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_slo_id_3" class="form-control form-group" id="ib_b14_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b14_item3" class="form-control form-group" id="ib_b14_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 14.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_cs_id_4" class="form-control form-group" id="ib_b14_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b14_scs_id_4" class="form-control form-group" id="ib_b14_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b14_slo_id_4" class="form-control form-group" id="ib_b14_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b14_item4" class="form-control form-group" id="ib_b14_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-14------------------------------------------------------------> 

<!---------------------------------------------Start Block-15------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-15/Question-15 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 15.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_cs_id_1" class="form-control form-group" id="ib_b15_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_scs_id_1" class="form-control form-group" id="ib_b15_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_slo_id_1" class="form-control form-group" id="ib_b15_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b15_item1" class="form-control form-group" id="ib_b15_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 15.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_cs_id_2" class="form-control form-group" id="ib_b15_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_scs_id_2" class="form-control form-group" id="ib_b15_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_slo_id_2" class="form-control form-group" id="ib_b15_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b15_item2" class="form-control form-group" id="ib_b15_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 15.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_cs_id_3" class="form-control form-group" id="ib_b15_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_scs_id_3" class="form-control form-group" id="ib_b15_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_slo_id_3" class="form-control form-group" id="ib_b15_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b15_item3" class="form-control form-group" id="ib_b15_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 15.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_cs_id_4" class="form-control form-group" id="ib_b15_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b15_scs_id_4" class="form-control form-group" id="ib_b15_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b15_slo_id_4" class="form-control form-group" id="ib_b15_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b15_item4" class="form-control form-group" id="ib_b15_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-15------------------------------------------------------------> 
<!---------------------------------------------Start Block-16------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-16/Question-16 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 16.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_cs_id_1" class="form-control form-group" id="ib_b16_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_scs_id_1" class="form-control form-group" id="ib_b16_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_slo_id_1" class="form-control form-group" id="ib_b16_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b16_item1" class="form-control form-group" id="ib_b16_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 16.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_cs_id_2" class="form-control form-group" id="ib_b16_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_scs_id_2" class="form-control form-group" id="ib_b16_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_slo_id_2" class="form-control form-group" id="ib_b16_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b16_item2" class="form-control form-group" id="ib_b16_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 16.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_cs_id_3" class="form-control form-group" id="ib_b16_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_scs_id_3" class="form-control form-group" id="ib_b16_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_slo_id_3" class="form-control form-group" id="ib_b16_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b16_item3" class="form-control form-group" id="ib_b16_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 16.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_cs_id_4" class="form-control form-group" id="ib_b16_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b16_scs_id_4" class="form-control form-group" id="ib_b16_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b16_slo_id_4" class="form-control form-group" id="ib_b16_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b16_item4" class="form-control form-group" id="ib_b16_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-16------------------------------------------------------------> 
<!---------------------------------------------Start Block-17------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-17/Question-17 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 17.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_cs_id_1" class="form-control form-group" id="ib_b17_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_scs_id_1" class="form-control form-group" id="ib_b17_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_slo_id_1" class="form-control form-group" id="ib_b17_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b17_item1" class="form-control form-group" id="ib_b17_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 17.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_cs_id_2" class="form-control form-group" id="ib_b17_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_scs_id_2" class="form-control form-group" id="ib_b17_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_slo_id_2" class="form-control form-group" id="ib_b17_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b17_item2" class="form-control form-group" id="ib_b17_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 17.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_cs_id_3" class="form-control form-group" id="ib_b17_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_scs_id_3" class="form-control form-group" id="ib_b17_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_slo_id_3" class="form-control form-group" id="ib_b17_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b17_item3" class="form-control form-group" id="ib_b17_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 17.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_cs_id_4" class="form-control form-group" id="ib_b17_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b17_scs_id_4" class="form-control form-group" id="ib_b17_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b17_slo_id_4" class="form-control form-group" id="ib_b17_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b17_item4" class="form-control form-group" id="ib_b17_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-17------------------------------------------------------------> 
<!---------------------------------------------Start Block-18------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-18/Question-18 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 18.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_cs_id_1" class="form-control form-group" id="ib_b18_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_scs_id_1" class="form-control form-group" id="ib_b18_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_slo_id_1" class="form-control form-group" id="ib_b18_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b18_item1" class="form-control form-group" id="ib_b18_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 18.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_cs_id_2" class="form-control form-group" id="ib_b18_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_scs_id_2" class="form-control form-group" id="ib_b18_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_slo_id_2" class="form-control form-group" id="ib_b18_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b18_item2" class="form-control form-group" id="ib_b18_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 18.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_cs_id_3" class="form-control form-group" id="ib_b18_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_scs_id_3" class="form-control form-group" id="ib_b18_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_slo_id_3" class="form-control form-group" id="ib_b18_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b18_item3" class="form-control form-group" id="ib_b18_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 18.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_cs_id_4" class="form-control form-group" id="ib_b18_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b18_scs_id_4" class="form-control form-group" id="ib_b18_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b18_slo_id_4" class="form-control form-group" id="ib_b18_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b18_item4" class="form-control form-group" id="ib_b18_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-18------------------------------------------------------------> 
<!---------------------------------------------Start Block-19------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-19/Question-19 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 19.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_cs_id_1" class="form-control form-group" id="ib_b19_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_scs_id_1" class="form-control form-group" id="ib_b19_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_slo_id_1" class="form-control form-group" id="ib_b19_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b19_item1" class="form-control form-group" id="ib_b19_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 19.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_cs_id_2" class="form-control form-group" id="ib_b19_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_scs_id_2" class="form-control form-group" id="ib_b19_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_slo_id_2" class="form-control form-group" id="ib_b19_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b19_item2" class="form-control form-group" id="ib_b19_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 19.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_cs_id_3" class="form-control form-group" id="ib_b19_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_scs_id_3" class="form-control form-group" id="ib_b19_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_slo_id_3" class="form-control form-group" id="ib_b19_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b19_item3" class="form-control form-group" id="ib_b19_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 19.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_cs_id_4" class="form-control form-group" id="ib_b19_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b19_scs_id_4" class="form-control form-group" id="ib_b19_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b19_slo_id_4" class="form-control form-group" id="ib_b19_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b19_item4" class="form-control form-group" id="ib_b19_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-19------------------------------------------------------------> 
<!---------------------------------------------Start Block-20------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-20/Question-20 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 20.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_cs_id_1" class="form-control form-group" id="ib_b20_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_scs_id_1" class="form-control form-group" id="ib_b20_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_slo_id_1" class="form-control form-group" id="ib_b20_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b20_item1" class="form-control form-group" id="ib_b20_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 20.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_cs_id_2" class="form-control form-group" id="ib_b20_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_scs_id_2" class="form-control form-group" id="ib_b20_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_slo_id_2" class="form-control form-group" id="ib_b20_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b20_item2" class="form-control form-group" id="ib_b20_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 20.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_cs_id_3" class="form-control form-group" id="ib_b20_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_scs_id_3" class="form-control form-group" id="ib_b20_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_slo_id_3" class="form-control form-group" id="ib_b20_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b20_item3" class="form-control form-group" id="ib_b20_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 20.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_cs_id_4" class="form-control form-group" id="ib_b20_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b20_scs_id_4" class="form-control form-group" id="ib_b20_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b20_slo_id_4" class="form-control form-group" id="ib_b20_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b20_item4" class="form-control form-group" id="ib_b20_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-20------------------------------------------------------------> 
<!---------------------------------------------Start Block-21------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-21/Question-21 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 21.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_cs_id_1" class="form-control form-group" id="ib_b21_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_scs_id_1" class="form-control form-group" id="ib_b21_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_slo_id_1" class="form-control form-group" id="ib_b21_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b21_item1" class="form-control form-group" id="ib_b21_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 21.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_cs_id_2" class="form-control form-group" id="ib_b21_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_scs_id_2" class="form-control form-group" id="ib_b21_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_slo_id_2" class="form-control form-group" id="ib_b21_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b21_item2" class="form-control form-group" id="ib_b21_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 21.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_cs_id_3" class="form-control form-group" id="ib_b21_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_scs_id_3" class="form-control form-group" id="ib_b21_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_slo_id_3" class="form-control form-group" id="ib_b21_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b21_item3" class="form-control form-group" id="ib_b21_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 21.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_cs_id_4" class="form-control form-group" id="ib_b21_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b21_scs_id_4" class="form-control form-group" id="ib_b21_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b21_slo_id_4" class="form-control form-group" id="ib_b21_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b21_item4" class="form-control form-group" id="ib_b21_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-21------------------------------------------------------------> 
<!---------------------------------------------Start Block-22------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-22/Question-22 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 22.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_cs_id_1" class="form-control form-group" id="ib_b22_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_scs_id_1" class="form-control form-group" id="ib_b22_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_slo_id_1" class="form-control form-group" id="ib_b22_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b22_item1" class="form-control form-group" id="ib_b22_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 22.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_cs_id_2" class="form-control form-group" id="ib_b22_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_scs_id_2" class="form-control form-group" id="ib_b22_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_slo_id_2" class="form-control form-group" id="ib_b22_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b22_item2" class="form-control form-group" id="ib_b22_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 22.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_cs_id_3" class="form-control form-group" id="ib_b22_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_scs_id_3" class="form-control form-group" id="ib_b22_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_slo_id_3" class="form-control form-group" id="ib_b22_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b22_item3" class="form-control form-group" id="ib_b22_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 22.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_cs_id_4" class="form-control form-group" id="ib_b22_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b22_scs_id_4" class="form-control form-group" id="ib_b22_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b22_slo_id_4" class="form-control form-group" id="ib_b22_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b22_item4" class="form-control form-group" id="ib_b22_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-22------------------------------------------------------------> 
<!---------------------------------------------Start Block-23------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-23/Question-23 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 23.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_cs_id_1" class="form-control form-group" id="ib_b23_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_scs_id_1" class="form-control form-group" id="ib_b23_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_slo_id_1" class="form-control form-group" id="ib_b23_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b23_item1" class="form-control form-group" id="ib_b23_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 23.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_cs_id_2" class="form-control form-group" id="ib_b23_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_scs_id_2" class="form-control form-group" id="ib_b23_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_slo_id_2" class="form-control form-group" id="ib_b23_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b23_item2" class="form-control form-group" id="ib_b23_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 23.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_cs_id_3" class="form-control form-group" id="ib_b23_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_scs_id_3" class="form-control form-group" id="ib_b23_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_slo_id_3" class="form-control form-group" id="ib_b23_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b23_item3" class="form-control form-group" id="ib_b23_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 23.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_cs_id_4" class="form-control form-group" id="ib_b23_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b23_scs_id_4" class="form-control form-group" id="ib_b23_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b23_slo_id_4" class="form-control form-group" id="ib_b23_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b23_item4" class="form-control form-group" id="ib_b23_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-23------------------------------------------------------------> 
<!---------------------------------------------Start Block-24------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-24/Question-24 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 24.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_cs_id_1" class="form-control form-group" id="ib_b24_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_scs_id_1" class="form-control form-group" id="ib_b24_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_slo_id_1" class="form-control form-group" id="ib_b24_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b24_item1" class="form-control form-group" id="ib_b24_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 24.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_cs_id_2" class="form-control form-group" id="ib_b24_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_scs_id_2" class="form-control form-group" id="ib_b24_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_slo_id_2" class="form-control form-group" id="ib_b24_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b24_item2" class="form-control form-group" id="ib_b24_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 24.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_cs_id_3" class="form-control form-group" id="ib_b24_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_scs_id_3" class="form-control form-group" id="ib_b24_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_slo_id_3" class="form-control form-group" id="ib_b24_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b24_item3" class="form-control form-group" id="ib_b24_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 24.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_cs_id_4" class="form-control form-group" id="ib_b24_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b24_scs_id_4" class="form-control form-group" id="ib_b24_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b24_slo_id_4" class="form-control form-group" id="ib_b24_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b24_item4" class="form-control form-group" id="ib_b24_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-24------------------------------------------------------------> 
<!---------------------------------------------Start Block-25------------------------------------------------------------>             
            <div class="row form-group" style="font-size:20px; font-weight:bold">Select Block-25/Question-25 Items</div>  

            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 25.1
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_cs_id_1" class="form-control form-group" id="ib_b25_cs_id_1"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_scs_id_1" class="form-control form-group" id="ib_b25_scs_id_1"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_slo_id_1" class="form-control form-group" id="ib_b25_slo_id_1"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b25_item1" class="form-control form-group" id="ib_b25_item1"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 25.2
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_cs_id_2" class="form-control form-group" id="ib_b25_cs_id_2"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_scs_id_2" class="form-control form-group" id="ib_b25_scs_id_2"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_slo_id_2" class="form-control form-group" id="ib_b25_slo_id_2"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b25_item2" class="form-control form-group" id="ib_b25_item2"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 25.3
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_cs_id_3" class="form-control form-group" id="ib_b25_cs_id_3"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_scs_id_3" class="form-control form-group" id="ib_b25_scs_id_3"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_slo_id_3" class="form-control form-group" id="ib_b25_slo_id_3"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b25_item3" class="form-control form-group" id="ib_b25_item3"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
            
            <div class="row">
				<div class="col-lg-1 col-sm-12" style=" font-size:18px; font-weight:bold">                         
                Q# 25.4
                </div>				
				<div class="col-lg-11 col-sm-12">                         
                    <div class="row">
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_cs_id_4" class="form-control form-group" id="ib_b25_cs_id_4"  required>
                            <option value="">--Select Content Strand--</option>
                            </select>
                        </div>				
                        <div class="col-lg-2 col-sm-12">                         
                            <select name="ib_b25_scs_id_4" class="form-control form-group" id="ib_b25_scs_id_4"  required>
                            <option value="">--Select SubContent Strand--</option>
                            </select>
                        </div>	
                        <div class="col-lg-3 col-sm-12">                         
                            <select name="ib_b25_slo_id_4" class="form-control form-group" id="ib_b25_slo_id_4"  required>
                            <option value="">--Select SLO Statement--</option>
                            </select>
                        </div>				
                        <div class="col-lg-5 col-sm-12">                         
                        <select name="ib_b25_item4" class="form-control form-group" id="ib_b25_item4"  required>
                        <option value="">--Select Item--</option>
                        </select>
                    </div>					
                  </div>
                </div>	
            </div>
<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-25------------------------------------------------------------>            
 <?php */?>             
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#ib_grade_id').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#ib_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
	
});

$('#ib_subject_id').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
<!-----------------------------------Start Block-1-------------------------------------------------------->
      $('#ib_b1_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b1_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b1_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b1_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b1_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b1_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b1_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-1------------------------------------------------------------>

<!-----------------------------------Start Block-2-------------------------------------------------------->
      $('#ib_b2_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b2_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b2_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b2_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b2_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b2_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b2_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-2------------------------------------------------------------>

<!-----------------------------------Start Block-3-------------------------------------------------------->
      $('#ib_b3_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b3_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b3_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b3_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b3_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b3_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b3_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-3------------------------------------------------------------>

<!-----------------------------------Start Block-4-------------------------------------------------------->
      $('#ib_b4_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b4_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b4_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b4_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b4_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b4_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b4_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-4------------------------------------------------------------>

<!-----------------------------------Start Block-5-------------------------------------------------------->
      $('#ib_b5_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b5_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b5_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b5_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b5_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b5_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b5_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-5------------------------------------------------------------>

<!-----------------------------------Start Block-6-------------------------------------------------------->
      $('#ib_b6_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b6_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b6_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b6_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b6_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b6_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b6_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-6------------------------------------------------------------>

<!-----------------------------------Start Block-7-------------------------------------------------------->
      $('#ib_b7_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b7_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b7_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b7_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b7_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b7_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b7_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-7------------------------------------------------------------>

<!-----------------------------------Start Block-8-------------------------------------------------------->
      $('#ib_b8_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b8_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b8_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b8_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b8_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b8_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b8_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-8------------------------------------------------------------>

<!-----------------------------------Start Block-9-------------------------------------------------------->
      $('#ib_b9_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b9_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b9_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b9_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b9_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b9_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b9_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-9------------------------------------------------------------>

<!-----------------------------------Start Block-10-------------------------------------------------------->
      $('#ib_b10_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b10_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b10_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b10_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b10_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b10_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b10_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-10------------------------------------------------------------>

<!-----------------------------------Start Block-11-------------------------------------------------------->
      $('#ib_b11_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b11_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b11_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b11_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b11_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b11_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b11_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-11------------------------------------------------------------>

<!-----------------------------------Start Block-12-------------------------------------------------------->
      $('#ib_b12_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b12_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b12_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b12_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b12_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b12_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b12_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-12------------------------------------------------------------>

<!-----------------------------------Start Block-13-------------------------------------------------------->
      $('#ib_b13_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b13_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b13_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b13_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b13_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b13_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b13_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-13------------------------------------------------------------>

<!-----------------------------------Start Block-14-------------------------------------------------------->
      $('#ib_b14_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b14_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b14_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b14_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b14_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b14_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b14_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-14------------------------------------------------------------>

<!-----------------------------------Start Block-15-------------------------------------------------------->
      $('#ib_b15_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b15_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b15_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b15_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b15_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b15_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b15_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-15------------------------------------------------------------>

<!-----------------------------------Start Block-16-------------------------------------------------------->
      $('#ib_b16_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b16_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b16_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b16_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b16_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b16_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b16_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-16------------------------------------------------------------>

<!-----------------------------------Start Block-17-------------------------------------------------------->
      $('#ib_b17_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b17_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b17_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b17_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b17_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b17_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b17_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-17------------------------------------------------------------>

<!-----------------------------------Start Block-18-------------------------------------------------------->
      $('#ib_b18_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b18_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b18_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b18_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b18_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b18_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b18_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-18------------------------------------------------------------>

<!-----------------------------------Start Block-19-------------------------------------------------------->
      $('#ib_b19_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b19_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b19_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b19_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b19_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b19_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b19_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-19------------------------------------------------------------>

<!-----------------------------------Start Block-20-------------------------------------------------------->
      $('#ib_b20_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b20_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b20_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b20_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b20_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b20_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b20_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-20------------------------------------------------------------>

<!-----------------------------------Start Block-21-------------------------------------------------------->
      $('#ib_b21_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b21_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b21_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b21_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b21_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b21_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b21_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-21------------------------------------------------------------>

<!-----------------------------------Start Block-22-------------------------------------------------------->
      $('#ib_b22_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b22_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b22_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b22_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b22_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b22_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b22_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-22------------------------------------------------------------>

<!-----------------------------------Start Block-23-------------------------------------------------------->
      $('#ib_b23_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b23_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b23_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b23_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b23_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b23_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b23_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-23------------------------------------------------------------>

<!-----------------------------------Start Block-24-------------------------------------------------------->
      $('#ib_b24_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b24_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b24_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b24_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b24_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b24_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b24_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-24------------------------------------------------------------>

<!-----------------------------------Start Block-25-------------------------------------------------------->
      $('#ib_b25_cs_id_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_cs_id_1')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
       });
	  $('#ib_b25_cs_id_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#ib_b25_cs_id_2')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b25_cs_id_3 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b25_cs_id_3')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        });
	   $('#ib_b25_cs_id_4 option:not(:first)').remove();
	   $.each(arr, function(key, value) {           
       $('#ib_b25_cs_id_4')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en)
                  ); 
        }); 
<!-----------------------------------End Block-25------------------------------------------------------------>
    });
});

<!-----------------------------------Start Block-1 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b1_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b1_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b1_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });

});
$('#ib_b1_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b1_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b1_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b1_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b1_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b1_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-1------------------------------------------------------------>

<!-----------------------------------Start Block-2 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b2_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b2_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b2_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b2_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b2_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b2_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b2_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b2_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-2------------------------------------------------------------>

<!-----------------------------------Start Block-3 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b3_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b3_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b3_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b3_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b3_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b3_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b3_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b3_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-3------------------------------------------------------------>

<!-----------------------------------Start Block-4 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b4_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b4_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b4_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b4_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b4_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b4_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b4_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b4_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-4------------------------------------------------------------>

<!-----------------------------------Start Block-5 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b5_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b5_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b5_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b5_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b5_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b5_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b5_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b5_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-5------------------------------------------------------------>

<!-----------------------------------Start Block-6 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b6_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b6_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b6_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b6_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b6_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b6_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b6_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b6_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-6------------------------------------------------------------>

<!-----------------------------------Start Block-7 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b7_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b7_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b7_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b7_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b7_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b7_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b7_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b7_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-7------------------------------------------------------------>

<!-----------------------------------Start Block-8 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b8_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b8_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b8_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b8_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b8_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b8_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b8_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b8_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-8------------------------------------------------------------>

<!-----------------------------------Start Block-9 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b9_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b9_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b9_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b9_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b9_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b9_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b9_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b9_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-9------------------------------------------------------------>

<!-----------------------------------Start Block-10 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b10_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b10_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b10_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b10_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b10_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b10_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b10_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b10_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-10------------------------------------------------------------>

<!-----------------------------------Start Block-11 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b11_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b11_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b11_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b11_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b11_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b11_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b11_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b11_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-11------------------------------------------------------------>

<!-----------------------------------Start Block-12 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b12_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b12_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b12_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b12_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b12_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b12_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b12_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b12_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-12------------------------------------------------------------>

<!-----------------------------------Start Block-13 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b13_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b13_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b13_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b13_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b13_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b13_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b13_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b13_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-13------------------------------------------------------------>

<!-----------------------------------Start Block-14 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b14_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b14_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b14_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b14_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b14_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b14_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b14_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b14_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-14------------------------------------------------------------>

<!-----------------------------------Start Block-15 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b15_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b15_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b15_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b15_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b15_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b15_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b15_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b15_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-15------------------------------------------------------------>

<!-----------------------------------Start Block-16 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b16_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b16_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b16_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b16_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b16_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b16_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b16_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b16_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-16------------------------------------------------------------>

<!-----------------------------------Start Block-17 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b17_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b17_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b17_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b17_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b17_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b17_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b17_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b17_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-17------------------------------------------------------------>

<!-----------------------------------Start Block-18 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b18_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b18_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b18_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b18_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b18_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b18_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b18_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b18_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-18------------------------------------------------------------>

<!-----------------------------------Start Block-19 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b19_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b19_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b19_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b19_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b19_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b19_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b19_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b19_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-19------------------------------------------------------------>

<!-----------------------------------Start Block-20 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b20_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b20_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b20_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b20_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b20_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b20_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b20_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b20_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-20------------------------------------------------------------>

<!-----------------------------------Start Block-21 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b21_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b21_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b21_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b21_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b21_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b21_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b21_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b21_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-21------------------------------------------------------------>

<!-----------------------------------Start Block-22 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b22_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b22_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b22_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b22_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b22_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b22_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b22_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b22_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-22------------------------------------------------------------>

<!-----------------------------------Start Block-23 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b23_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b23_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b23_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
$('#ib_b23_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b23_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b23_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b23_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b23_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b23_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b23_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b23_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b23_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b23_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b23_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-23------------------------------------------------------------>

<!-----------------------------------Start Block-24 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b24_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b24_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b24_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b24_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b24_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b24_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b24_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b24_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b24_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b24_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b24_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b24_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b24_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b24_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});
<!-----------------------------------End Block-24------------------------------------------------------------>

<!-----------------------------------Start Block-25 (On change CS & SCS & SLO)------------------------------------------------------------>
$('#ib_b25_cs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_scs_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_scs_id_1')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b25_scs_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_slo_id_1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_slo_id_1')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b25_slo_id_1').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_item1 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_item1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b25_cs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_scs_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_scs_id_2')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b25_scs_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_slo_id_2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_slo_id_2')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b25_slo_id_2').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_item2 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_item2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b25_cs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_scs_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_scs_id_3')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b25_scs_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_slo_id_3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_slo_id_3')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b25_slo_id_3').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_item3 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_item3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
});

$('#ib_b25_cs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_scs_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_scs_id_4')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});
$('#ib_b25_scs_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_slo_id_4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_slo_id_4')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});
$('#ib_b25_slo_id_4').on('change', function() {
      $.post('<?=base_url("admin/itemsbank/item_by_slo")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#ib_b25_item4 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#ib_b25_item4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_stem_en+'-'+value.item_stem_ur)					
                  ); 
        });   
    });
	
});
<!-----------------------------------End Block-25------------------------------------------------------------>\
function onSubmitFunc()
{
if($('#ib_b1_item1').val()==$('#ib_b1_item1').val()||$('#ib_b1_item1').val()==$('#ib_b1_item2').val()||$('#ib_b1_item1').val()==$('#ib_b1_item3').val()||$('#ib_b1_item1').val()==$('#ib_b1_item4').val()){
	if($('#ib_b1_item2').val()==$('#ib_b1_item3').val()||$('#ib_b1_item2').val()==$('#ib_b1_item4').val()){
		if($('#ib_b1_item3').val()==$('#ib_b1_item4').val()){
			alert('Items Selection must be Unique in Each Block! Try another items.');
			return false;
		}
	}
}
alert('success');
return true;
}
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>