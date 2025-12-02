<style>
   .required.control-label:after {
      content: " *";
      color: red;
   }
   .select2-container--default .select2-selection--multiple {
	  background-color: #fff !important;
	  color: #000 !important;
	}
	
	.select2-container--default .select2-results__option {
	  color: #000 !important;
	}
	
	.select2-container * {
	  color: #000 !important;
	}
</style>
<div class="form-background" style="min-height: 100vh;">
   <div class="container" style="max-width:960px;">
      <div class="row">
         <div class="col-md-12">
            <div class="login-logo">
               <div><img src="<?php echo base_url('assets/img/pectaa-logo.jpg'); ?>" width="125" alt="" /></div>
               <h2 style="font-size: 1em;">
                  <?= $this->general_settings['application_name']; ?>
               </h2>
            </div>
            <section class="content">
               <div class="card card-default color-palette-bo">
                  <div class="card-header text-center">
                     <h3 class="card-title">
                        <i class="fa fa-plus"></i>&nbsp; <strong>ITEM WRITER REGISTRATION FORM</strong>
                     </h3>
                  </div>
                  <div class="card-body">
                     <!-- For Messages -->
                     <?php $this->load->view('admin/includes/_messages.php') ?>
                     <?php echo form_open(base_url('admin/itemwriter/add'), 'class="form-horizontal" name="frm_itmewriter_add" id="frm_itmewriter_add" method="POST" enctype="multipart/form-data" ');  ?>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="username" class="col-sm-12 control-label required">User Name(Unique)</label>
                           <input autocomplete="off" type="text" name="username" class="form-control form-group required" id="username" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="password" class="col-sm-12 control-label required">Password</label>
                           <input autocomplete="new-password" type="password" name="password" class="form-control form-group" id="password" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="email" class="col-sm-12 control-label required">Email</label>
                           <input type="email" name="email" class="form-control form-group" id="email" placeholder="" required="required">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="firstname" class="col-sm-12 control-label required">First Name</label>
                           <input type="text" name="firstname" class="form-control form-group" id="firstname" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="lastname" class="col-sm-12 control-label required">Last Name</label>
                           <input type="text" name="lastname" class="form-control form-group" id="lastname" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="fathername" class="col-sm-12 control-label required">Father's Name</label>
                           <input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" required="required">
                        </div>
                     </div>
                     <div class="row ">
                        <div class="col-lg-4 col-sm-12">
                           <label for="gender" class="col-sm-12 control-label required">Gender</label>
                           <select name="gender" class="form-control" id="gender" placeholder="" required="required">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="dob" class="col-sm-12 control-label required">Date of Birth</label>
                           <input type="date" name="dob" class="form-control form-group" i4d="dob" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="mobilenumber" class="col-sm-12 control-label required">Mobile Number</label>
                           <input type="number" name="mobilenumber" class="form-control form-group" id="mobilenumber" placeholder="" required="required">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="cnic" class="col-sm-12 control-label required">CNIC</label>
                           <input type="number" name="cnic" class="form-control form-group" id="cnic" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
                           <input type="file" name="cniccopy" class="form-control form-group" id="cniccopy" placeholder="">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="picture" class="col-sm-12 control-label">Picture</label>
                           <input type="file" name="picture" class="form-control form-group" id="picture" placeholder="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="district" class="col-sm-12 control-label required">District</label>
                           <select name="district" class="form-control form-group" id="district" placeholder="" required="required">
                              <option value="">---Select District---</option>
                              <?php
                              foreach ($districts as $row) {
                                 echo '<option value="' . $row['district_id'] . '">' . $row['district_name_en'] . '</option>';
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="tehsil" class="col-sm-12 control-label required">Tehsil</label>
                           <select name="tehsil" class="form-control form-group" id="tehsil" placeholder="" required="required">
                              <option value="">---Select Tehsil---</option>
                           </select>
                        </div>

                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-sm-12">
                           <label for="address" class="col-sm-12 control-label required">Address</label>
                           <input type="text" name="address" class="form-control form-group" id="address" placeholder="" required="required">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="subject" class="col-sm-12 control-label required">Subject</label>
                           <select name="subject" class="form-control form-group" id="subject" required>
                                <option value="">---Select Subjects---</option>
                                <?php
                                foreach ($subjects as $row) {
                                    echo '<option value="'.$row['subject_name_en'].'">'.$row['subject_name_en'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="designation" class="col-sm-12 control-label required">Designation</label>
                           <input type="text" name="designation" class="form-control form-group" id="designation" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="placeofposting" class="col-sm-12 control-label required">Place of Posting</label>
                           <input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" placeholder="" required="required">
                        </div>
                     </div>
                     <div class="row">

                        <div class="col-lg-4 col-sm-12">
                           <label for="department" class="col-sm-12 control-label required">Department</label>
                           <select name="department" class="form-control" id="department" placeholder="" required="required">
                              <option value="0">-----Select Department----</option>
                              <option value="Public">Public</option>
                              <option value="Private">Private</option>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="publictype" class="col-sm-12 control-label required">Public School Type</label>
                           <select name="publictype" class="form-control" id="publictype" placeholder="" required="required">
                              <option value="0">----Select School Type----</option>
                              <option value="SED">SED</option>
                              <option value="FEDERAL">FEDERAL</option>
                              <option value="PEF">PEF</option>
                              <option value="WORKERSWELFARE">WORKERSWELFARE</option>
                              <option value="COMMUNITY">COMMUNITY</option>
                              <option value="LITERACY">LITERACY</option>
                              <option value="PSSP">PSSP</option>
                              <option value="DANISH">DANISH</option>
                              <option value="INSAFAFTERNOON">INSAFAFTERNOON</option>
                              <option value="OTHERS">OTHERS</option>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="area" class="col-sm-12 control-label required">Area</label>
                           <select name="area" class="form-control" id="area" placeholder="" required="required">
                              <option value="Urban">Urban</option>
                              <option value="Rural">Rural</option>
                           </select>
                        </div>
                     </div>
                     <div class="row" style="padding-top:15px">
                        <div class="col-lg-4 col-sm-12">
                           <label for="qualification" class="col-sm-12 control-label required">Qualification</label>
                           <select name="qualification" class="form-control form-group" id="qualification" placeholder="" required="required">
                              <option value="">---Select Qualification---</option>
                              <?php
                              foreach ($qualifications as $qualification) {
                                 echo '<option value="' . $qualification['q_degree_name'] . '">' . $qualification['q_degree_name'] . '</option>';
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>
                           <input type="file" name="latestdegree" class="form-control form-group" id="latestdegree" placeholder="">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="experienceschool" class="col-sm-12 control-label required">Experience School (No. of years)</label>
                           <input type="number" name="experienceschool" class="form-control form-group" id="experienceschool" placeholder="" required="required">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>
                           <input type="file" name="experienceletter" class="form-control form-group" id="experienceletter" placeholder="">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-sm-12">
                           <label for="bankname" class="col-sm-12 control-label">Bank Name</label>
                           <select name="bankname" class="form-control form-group" id="bankname" placeholder="">
                              <option value="Other">Other</option>
                              <?php
                              foreach ($banks as $bank) {
                                 echo '<option value="' . $bank['b_bank_name'] . '">' . $bank['b_bank_name'] . '</option>';
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="branchcode" class="col-sm-12 control-label">Branch Code</label>
                           <input type="text" name="branchcode" class="form-control form-group" id="branchcode" placeholder="">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="accountnumber" class="col-sm-12 control-label">Account Number</label>
                           <input type="text" name="accountnumber" class="form-control form-group" id="accountnumber" placeholder="">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="accounttitle" class="col-sm-12 control-label">Account Title</label>
                           <input type="text" name="accounttitle" class="form-control form-group" id="accounttitle" placeholder="">
                        </div>
                        <div class="col-lg-4 col-sm-12">
                           <label for="iban" class="col-sm-12 control-label">IBAN</label>
                           <input type="text" name="iban" class="form-control form-group" id="iban" placeholder="">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12 text-center">
                           <input style="min-width:150px;" type="submit" name="submit" value="Register" class="btn btn-info">
                        </div>
                     </div>
                     <?php echo form_close(); ?>
                     <!-- /.box-body -->
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<script language="javascript">
   $('#div_sel_roles').hide();
   $('#div_sel_subjects').hide();
   $('#admin_role_id').on('change', function() {
      if (this.value == 2) {
         $('#div_sel_roles').hide();
         $('#div_sel_subjects').show();
      } else if (this.value == 3) {
         $('#div_sel_roles').show();
         $('#div_sel_subjects').hide();
      } else {
         $('#div_sel_roles').hide();
         $('#div_sel_subjects').hide();
      }
   });
   $('#username').on('blur', function() {
      $.post('<?= base_url("admin/itemwriter/username_exist") ?>', {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            username: this.value
         },
         function(data) {
            if (data == 1) {
               alert('Username already exist!');
               $('#username').select();
            }
         })
   });
   $('#cnic').on('blur', function() {
      $.post('<?= base_url("admin/itemwriter/cnic_exist") ?>', {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            cnic: this.value
         },
         function(data) {
            if (data == 1) {
               alert('CNIC already exist!');
               $('#cnic').select();
            }
         })
   });

   $('#district').on('change', function() {
      $.post('<?= base_url("admin/itemwriter/tehsil_by_district") ?>', {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            district_id: this.value
         },
         function(data) {
            arr = $.parseJSON(data);
            console.log(arr);
            $('#tehsil option:not(:first)').remove();
            $.each(arr, function(key, value) {
               $('#tehsil')
                  .append($("<option></option>")
                     .attr("value", value.tehsil_id)
                     .text(value.tehsil_name_en)
                  );
            });
         });
   });

   function checkRoles() {
      if ($('#admin_role_id').val() == 3) {
         if ($('#parent_admin_id').val() == "") {
            alert('select preent');
            return false;
         } else {
            return true;
         }

         return false;
      } else if ($('#admin_role_id').val() == 2) {
         var boxes = $('.subs:checked');
         if (boxes.length > 0) {
            return true;
         } else {
            alert('Please select atleast one subject!');
            return false;
         }
      }

   }
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
/*$(document).ready(function() {
  // initialize select2 for the subject field
  $('#subject').select2({
    placeholder: "---Select Subjects---",
    allowClear: true,
    width: '100%'
  });
});*/

document.getElementById("username").addEventListener("input", function () {
  const originalValue = this.value;
  const cleanedValue = originalValue.replace(/[^a-zA-Z0-9]/g, '');

  if (originalValue !== cleanedValue) {
    alert("Only alphabets and numbers are allowed.");
    this.value = cleanedValue;
  }
});
</script>