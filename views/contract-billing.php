<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["newCB"])){ ?>
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

                  <form class="form-horizontal" method="post" action="index.php?page=contract-billing" name="CBform">

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
                                 <input id="candidateFirst" name="candidateFirst" type="text" placeholder="First" class="form-control input-md" required="">
                              </div>
                              <label class="col-md-1 control-label" for="candidateMI">MI</label>
                              <div class="col-md-1">
                                 <input id="candidateMI" name="candidateMI" type="text" placeholder="MI" class="form-control input-md" required="">
                              </div>
                              <label class="col-md-2 control-label" for="candidateLast">Last Name</label>
                              <div class="col-md-3">
                                 <input id="candidateLast" name="candidateLast" type="text" placeholder="Last" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="consultantCompany">Consultant Company Name</label>
                              <div class="col-md-8">
                                 <input id="consultantCompany" name="consultantCompany" type="text" placeholder="(Corp to Corp)" class="form-control input-md" required="">
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-4 control-label" for="candidatePhone">Phone</label>
                              <div class="col-md-8">
                                 <input id="candidatePhone" name="candidatePhone" type="text" placeholder="555-555-5555" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="candidateEmail">Email</label>
                              <div class="col-md-8">
                                 <input id="candidateEmail" name="candidateEmail" type="text" placeholder="Email" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="candidateAddress">Address</label>
                              <div class="col-md-8">
                               <textarea class="form-control" id="candidateAddress" name="candidateAddress" rows="6"></textarea>
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
                                 <input id="clientName" name="clientName" type="text" placeholder="Name" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="jobTitle">Job Title</label>
                              <div class="col-md-8">
                                 <input id="jobTitle" name="jobTitle" type="text" placeholder="Title" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="jobLocation">Job Location Address</label>
                              <div class="col-md-8">
                               <textarea class="form-control" id="jobLocation" name="jobLocation" rows="6"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="environment">Environment</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="environment" id="environment" value="onsite"> Onsite
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="environment" id="environment" value="remote"> Remote
                                 </label>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-4 control-label" for="hireType">Hire Type</label>
                              <div class="col-md-8">
                                 <select class="form-control" name="hireType">
                                    <option value="W2">W2</option>
                                    <option value="1099">1099</option>
                                    <option value="corp">Corp to Corp</option>
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
                                 <input id="contractRate" name="contractRate" type="text" placeholder="$" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="billRate">Bill Rate</label>
                              <div class="col-md-8">
                                 <input id="billRate" name="billRate" type="text" placeholder="$" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="baseSalary">Base Salary</label>
                              <div class="col-md-8">
                                 <input id="baseSalary" name="baseSalary" type="text" placeholder="$" class="form-control input-md">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="issuedHardware">Issued Hardware</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="issuedHardware" id="issuedHardware" value="corus360"> Corus360
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="issuedHardware" id="issuedHardware" value="client"> Client
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="issuedHardware" id="issuedHardware" value="none"> None
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="corusEmail">Corus360 Email?</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="corusEmail" id="corusEmail" value="1"> Yes
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="corusEmail" id="corusEmail" value="0"> No
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="backgroundCheck">Background Check</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="backgroundCheck" id="backgroundCheck" value="y"> Yes
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="backgroundCheck" id="backgroundCheck" value="n"> No
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="backgroundCheck" id="backgroundCheck" value="c"> Completed
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="traveling">Traveling, expense reporting?</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="traveling" id="traveling" value="1"> Yes
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="traveling" id="traveling" value="0"> No
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
                                 <input id="startDate" name="startDate" type="text" placeholder="2017-02-28" class="form-control input-md date-picker" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="contractPeriod">Contract Period</label>
                              <div class="col-md-8">
                                    <input id="contractPeriod" name="contractPeriod" type="text" placeholder="6 mo." class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="drugTest">Drug Test?</label>
                              <div class="col-md-8">
                                 <select class="form-control" name="drugTest">
                                    <option value="no">No</option>
                                    <option value="p5">Panel 5</option>
                                    <option value="p9">Panel 9</option>
                                    <option value="p10">Panel 10</option>
                                    <option value="p11">Panel 11</option>
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
                                 <input id="clientContact" name="clientContact" type="text" placeholder="Name" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="hiringManager">Hiring Manager / Timesheet Approver</label>
                              <div class="col-md-8">
                                 <input id="hiringManager" name="hiringManager" type="text" placeholder="Name" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="hiringEmail">Hiring Manager / Timesheet Approver Email</label>
                              <div class="col-md-8">
                                 <input id="hiringEmail" name="hiringEmail" type="text" placeholder="Email" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="hiringPhone">Hiring Manager / Timesheet Approver Phone</label>
                              <div class="col-md-8">
                                 <input id="hiringPhone" name="hiringPhone" type="text" placeholder="555-555-5555" class="form-control input-md">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="recruiters">Recruiter(s)</label>
                              <div class="col-md-8">
                                 <input id="recruiters" name="recruiters" type="text" placeholder="Recruiter(s)" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="accountManager">Account Manager</label>
                              <div class="col-md-8">
                                 <input id="accountManager" name="accountManager" type="text" placeholder="(include split information)" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="notes">Notes per AM or Client Request:</label>
                              <div class="col-md-8">
                               <textarea class="form-control" id="notes" name="notes" rows="6"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>







                    <div class="row">
                        <div class="col-md-12">
                           <button type="submit" name="newCB" class="btn red btn-lg btn-block">
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