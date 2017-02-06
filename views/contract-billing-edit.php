<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Update Form </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["updateForm"])){ ?>
        <div class="note note-info">
            <?php echo '<pre>' . print_r($msg, true) . '</pre>'; ?>
        </div>

        <?php } else { ?>
           <div class="portlet light bordered">
               <div class="portlet-body">
                  <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                          <div class="jumbotron">
                             <h2 class="text-center">
                                New Contractor Request
                             </h2>
                             <p class="text-center">
                                Please prepare and email the new hire paperwork for review ASAP
                             </p>
                          </div>
                       </div>
                    </div>

                     <form class="form-horizontal" method="post" action="index.php?page=contract-billing-edit&update-id=<?php echo $_GET["id"] ?>" name="CBform">

                        <div class="row">
                           <div class="col-md-12">
                              <h4 class="text-center" style="margin-bottom:25px; font-weight:700;">Candidate Info</h4>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-2 control-label" for="candidateFirst">First Name</label>
                                 <div class="col-md-3">
                                    <input id="candidateFirst" name="candidateFirst" type="text" value="<?php echo $cb_form[0]->first_name; ?>" class="form-control input-md" required="">
                                 </div>
                                 <label class="col-md-1 control-label" for="candidateMI">MI</label>
                                 <div class="col-md-1">
                                    <input id="candidateMI" name="candidateMI" type="text" value="<?php echo $cb_form[0]->mi; ?>" class="form-control input-md" required="">
                                 </div>
                                 <label class="col-md-2 control-label" for="candidateLast">Last Name</label>
                                 <div class="col-md-3">
                                    <input id="candidateLast" name="candidateLast" type="text" value="<?php echo $cb_form[0]->last_name; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="consultantCompany">Consultant Company Name</label>
                                 <div class="col-md-8">
                                    <input id="consultantCompany" name="consultantCompany" type="text" value="<?php echo $cb_form[0]->consultant_company; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="candidatePhone">Phone</label>
                                 <div class="col-md-8">
                                    <input id="candidatePhone" name="candidatePhone" type="text" value="<?php echo $cb_form[0]->phone; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="candidateEmail">Email</label>
                                 <div class="col-md-8">
                                    <input id="candidateEmail" name="candidateEmail" type="text" value="<?php echo $cb_form[0]->email; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="candidateAddress">Address</label>
                                 <div class="col-md-8">
                                  <textarea class="form-control" id="candidateAddress" name="candidateAddress" rows="6"><?php echo $cb_form[0]->address; ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <hr />
                           <div class="col-md-12">
                              <h4 class="text-center" style="margin-bottom:25px; font-weight:700;">Position Details</h4>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="clientName">Company/Client Name</label>
                                 <div class="col-md-8">
                                    <input id="clientName" name="clientName" type="text" value="<?php echo $cb_form[0]->client_name; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="jobTitle">Job Title</label>
                                 <div class="col-md-8">
                                    <input id="jobTitle" name="jobTitle" type="text" value="<?php echo $cb_form[0]->job_title; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="jobLocation">Job Location Address</label>
                                 <div class="col-md-8">
                                  <textarea class="form-control" id="jobLocation" name="jobLocation" rows="6"><?php echo $cb_form[0]->job_location; ?></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="environment">Environment</label>
                                 <div class="col-md-8">
                                    <label class="radio-inline">
                                      <input type="radio" name="environment" id="environment" value="onsite" <?php if($cb_form[0]->environment == "onsite") { echo "checked"; } ?> > Onsite
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="environment" id="environment" value="remote" <?php if($cb_form[0]->environment == "remote") { echo "checked"; } ?> > Remote
                                    </label>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="hireType">Hire Type</label>
                                 <div class="col-md-8">
                                    <select class="form-control" name="hireType">
                                       <option value="W2" <?php if($cb_form[0]->hire_type == "W2") { echo "selected"; } ?> >W2</option>
                                       <option value="1099" <?php if($cb_form[0]->hire_type == "1099") { echo "selected"; } ?> >1099</option>
                                       <option value="corp" <?php if($cb_form[0]->hire_type == "corp") { echo "selected"; } ?> >Corp to Corp</option>
                                    </select>
                                 </div>
                              </div>

                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="contractRate">Contract Rate</label>
                                 <div class="col-md-8">
                                    <input id="contractRate" name="contractRate" type="text" value="<?php echo $cb_form[0]->contract_rate; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="billRate">Bill Rate</label>
                                 <div class="col-md-8">
                                    <input id="billRate" name="billRate" type="text" value="<?php echo $cb_form[0]->bill_rate; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="baseSalary">Base Salary</label>
                                 <div class="col-md-8">
                                    <input id="baseSalary" name="baseSalary" type="text" value="<?php echo $cb_form[0]->base_salary; ?>" class="form-control input-md">
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                              <label class="col-md-4 control-label" for="projectType">Project Type</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="projectType" id="projectType" value="aug" <?php if($cb_form[0]->project_type == "aug") { echo "checked"; } ?> > Staff Augmentation
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="projectType" id="projectType" value="sow" <?php if($cb_form[0]->project_type == "sow") { echo "checked"; } ?> > SOW
                                 </label>
                              </div>
                           </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="issuedHardware">Issued Hardware</label>
                                 <div class="col-md-8">
                                    <label class="radio-inline">
                                      <input type="radio" name="issuedHardware" id="issuedHardware" value="corus360" <?php if($cb_form[0]->issued_hardware == "corus360") { echo "checked"; } ?> > Corus360
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="issuedHardware" id="issuedHardware" value="client" <?php if($cb_form[0]->issued_hardware == "client") { echo "checked"; } ?> > Client
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="issuedHardware" id="issuedHardware" value="client" <?php if($cb_form[0]->issued_hardware == "none") { echo "checked"; } ?> > None
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="corusEmail">Corus360 Email?</label>
                                 <div class="col-md-8">
                                    <label class="radio-inline">
                                      <input type="radio" name="corusEmail" id="corusEmail" value="1" <?php if($cb_form[0]->corus_email == "1") { echo "checked"; } ?> > Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="corusEmail" id="corusEmail" value="0" <?php if($cb_form[0]->corus_email == "0") { echo "checked"; } ?> > No
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="backgroundCheck">Background Check</label>
                                 <div class="col-md-8">
                                    <label class="radio-inline">
                                      <input type="radio" name="backgroundCheck" id="backgroundCheck" value="1" <?php if($cb_form[0]->background_check == "y") { echo "checked"; } ?> > Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="backgroundCheck" id="backgroundCheck" value="0" <?php if($cb_form[0]->background_check == "n") { echo "checked"; } ?> > No
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="backgroundCheck" id="backgroundCheck" value="0" <?php if($cb_form[0]->background_check == "c") { echo "checked"; } ?> > Completed
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="traveling">Traveling, expense reporting?</label>
                                 <div class="col-md-8">
                                    <label class="radio-inline">
                                      <input type="radio" name="traveling" id="traveling" value="1" <?php if($cb_form[0]->travel_reporting == "1") { echo "checked"; } ?> > Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="traveling" id="traveling" value="0" <?php if($cb_form[0]->travel_reporting == "0") { echo "checked"; } ?> > No
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="startDate">Start Date</label>
                                 <div class="col-md-8">
                                    <input id="startDate" name="startDate" type="text" value="<?php echo date('m/d/Y', strtotime($cb_form[0]->start_date)); ?>" class="form-control input-md date-picker" required="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="contractPeriod">Contract Period</label>
                                 <div class="col-md-8">
                                    <input id="contractPeriod" name="contractPeriod" type="text" value="<?php echo $cb_form[0]->contract_period; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="drugTest">Drug Test?</label>
                                 <div class="col-md-8">
                                    <select multiple class="form-control" name="drugTest[]">
                                       <?php
                                          // break the comma separated string down into array
                                          $dtests = explode(",", $cb_form[0]->drug_test);
                                       ?>
                                       <option value="no" <?php foreach($dtests as $dtest){ if($dtest == "no") { echo "selected"; }} ?> >No</option>
                                       <option value="p5" <?php foreach($dtests as $dtest){ if($dtest == "p5") { echo "selected"; }} ?> >Panel 5</option>
                                       <option value="p9" <?php foreach($dtests as $dtest){ if($dtest == "p9") { echo "selected"; }} ?> >Panel 9</option>
                                       <option value="p10" <?php foreach($dtests as $dtest){ if($dtest == "p10") { echo "selected"; }} ?> >Panel 10</option>
                                       <option value="p11" <?php foreach($dtests as $dtest){ if($dtest == "p11") { echo "selected"; }} ?> >Panel 11</option>
                                       <option value="other" <?php foreach($dtests as $dtest){ if($dtest == "other") { echo "selected"; }} ?> >Other</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <hr />

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="clientContact">Client Contact</label>
                                 <div class="col-md-8">
                                    <input id="clientContact" name="clientContact" type="text" value="<?php echo $cb_form[0]->client_contact; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="hiringManager">Hiring Manager / Timesheet Approver</label>
                                 <div class="col-md-8">
                                    <input id="hiringManager" name="hiringManager" type="text" value="<?php echo $cb_form[0]->manager; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="hiringEmail">Hiring Manager / Timesheet Approver Email</label>
                                 <div class="col-md-8">
                                    <input id="hiringEmail" name="hiringEmail" type="text" value="<?php echo $cb_form[0]->manager_email; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="hiringPhone">Hiring Manager / Timesheet Approver Phone</label>
                                 <div class="col-md-8">
                                    <input id="hiringPhone" name="hiringPhone" type="text" value="<?php echo $cb_form[0]->manager_phone; ?>" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="recruiters">Recruiter(s)</label>
                                 <div class="col-md-8">
                                    <input id="recruiters" name="recruiters" type="text" value="<?php echo $cb_form[0]->recruiter; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="accountManager">Account Manager</label>
                                 <div class="col-md-8">
                                    <input id="accountManager" name="accountManager" type="text" value="<?php echo $cb_form[0]->account_manager; ?>" class="form-control input-md" required="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="col-md-4 control-label" for="notes">Notes per AM or Client Request:</label>
                                 <div class="col-md-8">
                                  <textarea class="form-control" id="notes" name="notes" rows="6"><?php echo $cb_form[0]->notes; ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>







                       <div class="row">
                           <div class="col-md-12">
                              <button type="submit" name="updateForm" class="btn red btn-lg btn-block">
                                 Submit
                              </button>
                           </div>
                       </div>

                     </form>


                  </div>
               </div>
           </div>
           <?php } ?>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->