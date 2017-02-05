<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Contract Billing Forms </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
         <?php if(isset($_GET['delete'])){ ?>
            <div class="note note-info">
               <?php echo '<pre>' . print_r($msg, true) . '</pre>'; ?>
            </div>
         <?php } ?>
         <?php if(isset($_GET['approve'])){ ?>
            <div class="note note-info">
               <?php echo '<pre>' . print_r($msg, true) . '</pre>'; ?>
            </div>
         <?php } ?>

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-circle font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Forms</span>
                </div>
            </div>
            <div class="portlet-body">
               <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="user_list">
                  <thead>
                      <tr>
                          <th class="min-desktop">ID</th>
                          <th class="all">First</th>
                          <th class="all">Last</th>
                          <th class="all">Client</th>
                          <th class="all">Title</th>
                          <th class="all">Created</th>
                          <th class="all">User</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($cbforms as $form) {
                        if($_SESSION['user_name'] == $form->user_name || $_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin"){
                           echo '<tr>';
                           echo '<td>' . $form->id . '</td>';
                           echo '<td>' . $form->first_name . '</td>';
                           echo '<td>' . $form->last_name . '</td>';
                           echo '<td>' . $form->client_name . '</td>';
                           echo '<td>' . $form->job_title . '</td>';
                           echo '<td>' . $form->created . '</td>';
                           echo '<td>' . $form->user_name . '</td>';
                           echo '<td>'; ?>
                                   <div class="actions">
                                          <a class="btn btn-circle btn-icon-only btn-success font-dark bold"
                                                href="pdf.php?form=contract-billing&id=<?php echo $form->id; ?>" target="_blank" title="PDF">
                                               <i class="fa fa-file-pdf-o"></i>
                                          </a>
                                          <a class="btn btn-circle btn-icon-only btn-warning font-dark bold"
                                                href="index.php?page=contract-billing-edit&id=<?php echo $form->id; ?>" title="Edit">
                                               <i class="fa fa-edit"></i>
                                          </a>
                                          <?php if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                                          <a class="btn btn-circle btn-icon-only btn-danger font-dark bold"
                                                href="index.php?page=contract-billing-view&delete=<?php echo $form->id; ?>"
                                                onclick="return confirm('Are you sure you wish to delete this form?');" title="Delete">
                                               <i class="icon-trash"></i>
                                          </a>
                                          <?php if($form->approved == 0) { ?>
                                             <a class="btn btn-circle btn-icon-only btn-success font-dark bold"
                                                   href="index.php?page=contract-billing-view&approve=<?php echo $form->id; ?>" title="Approve">
                                                  <i class="icon-check"></i>
                                             </a>
                                             <?php } ?>
                                          <?php } ?>
                                   </div>
                          <?php
                           echo '</td>';
                           echo '</tr>';
                        }
                       
                     }
                      ?>
                  </tbody>
               </table>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->