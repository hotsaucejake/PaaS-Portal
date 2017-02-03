<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["newPP"])){ ?>
        <div class="note note-info">
            <?php echo json_encode($msg); ?>
        </div>

        <?php } else { ?>
        <div class="portlet light bordered">
            <div class="portlet-body">
               <div class="container-fluid">
                 <div class="row">
                    <div class="col-md-12">
                       <div class="jumbotron">
                          <h2 class="text-center">
                             Permanent Placement Billing Request
                          </h2>
                          <p class="text-center">
                             Directions: Use this form to request invoicing for a permanent placement.
                          </p>
                       </div>
                    </div>
                 </div>
                  <form class="form-horizontal" method="post" action="index.php?page=permanent-placement" name="PPform">
                    <div class="row">

                       <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="customerName">Customer Name</label>
                              <div class="col-md-8">
                                 <input id="customerName" name="customerName" type="text" placeholder="Name" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="apContact">AP Contact</label>
                              <div class="col-md-8">
                                 <input id="apContact" name="apContact" type="text" placeholder="Contact" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="apEmail">AP Email</label>
                              <div class="col-md-8">
                                 <input id="apEmail" name="apEmail" type="text" placeholder="Email" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="apPhone">AP Phone</label>
                              <div class="col-md-8">
                                 <input id="apPhone" name="apPhone" type="text" placeholder="555-555-5555" class="form-control input-md" required="">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="customerPO">Customer PO#</label>
                              <div class="col-md-8">
                                 <input id="customerPO" name="customerPO" type="text" placeholder="PO#" class="form-control input-md">
                              </div>
                           </div>
                       </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="radios">Customer</label>
                              <div class="col-md-8">
                                 <label class="radio-inline">
                                   <input type="radio" name="customerStatus" id="customerStatus" value="0"> New
                                 </label>
                                 <label class="radio-inline">
                                   <input type="radio" name="customerStatus" id="customerStatus" value="1"> Existing
                                 </label>
                              </div>
                           </div>
                           <div class="form-group">
                             <label class="col-md-4 control-label" for="billAddress">Bill to Address</label>
                             <div class="col-md-8">
                              <textarea class="form-control" id="billAddress" name="billAddress" rows="6"></textarea>
                             </div>
                           </div>

                       </div>
                     </div>

                     <div class="row">
                        <hr />
                        <div class="col-md-12">
                           <h4 class="text-center" style="margin-bottom:25px; font-weight:700;">Placement Info</h4>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="placementName">Placement Name</label>
                              <div class="col-md-9">
                                 <input id="placementName" name="placementName" type="text" placeholder="Name" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="placementEmail">Placement Email</label>
                              <div class="col-md-9">
                                 <input id="placementEmail" name="placementEmail" type="text" placeholder="Email" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="placementPhone">Placement Phone</label>
                              <div class="col-md-9">
                                 <input id="placementPhone" name="placementPhone" type="text" placeholder="555-5555-5555" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="position">Position</label>
                              <div class="col-md-9">
                                 <input id="position" name="position" type="text" placeholder="Position" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="salary">Salary</label>
                              <div class="col-md-9">
                                 <input id="salary" name="salary" type="text" placeholder="$" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="permFee">Perm Fee</label>
                              <div class="col-md-9">
                                 <input id="permFee" name="permFee" type="text" placeholder="%" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="totalFee">Total Fee</label>
                              <div class="col-md-9">
                                 <input id="totalFee" name="totalFee" type="text" placeholder="$" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="startDate">Start Date</label>
                              <div class="col-md-9">
                                 <input id="startDate" name="startDate" type="text" placeholder="01/31/2018" class="form-control input-md date-picker" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="recruiter">Recruiter</label>
                              <div class="col-md-9">
                                 <input id="recruiter" name="recruiter" type="text" placeholder="Recruiter" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-3 control-label" for="salesRep">Corus360 Sales Rep</label>
                              <div class="col-md-9">
                                 <input id="salesRep" name="salesRep" type="text" placeholder="Sales Rep" class="form-control input-md" required="">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                             <label class="col-md-3 control-label" for="notes">Special Notes</label>
                             <div class="col-md-9">
                              <textarea class="form-control" id="notes" name="notes" rows="6"></textarea>
                             </div>
                           </div>
                        </div>


                     </div>


                    <div class="row">
                        <div class="col-md-12">
                           <button type="submit" name="newPP" class="btn red btn-lg btn-block">
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