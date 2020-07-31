<div id="tour-11" class="header-content">
    <h2><i class="fa fa-home"></i><?php echo $heading;?></h2>
</div><!-- /.header-content -->
<?php 
$succMsg = $this->session->flashdata('succMsg');
if(isset($succMsg) && !empty($succMsg)){ ?>
    <div class="custom_alert alert alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php echo $succMsg;?>
    </div>
<?php }?>
<div class="body-content animated fadeIn">
    <input type="hidden" name="page" value="<?php if(isset($page)) {  echo $page; } else {  echo 1; }  ?>" id="page" />
    <div class = "row">
        <div class = "col-md-12">
        <!--Start basic color table -->
            <div class="panel panel-default shadow no-overflow">
                <div class="panel-heading">
                    <div class="dt-buttons pull-left">
                <?php   //$user_task = getUserTask();
                        //$user_session_data = getUserSession();
                        //if(in_array('add_product_service',$user_task)){?>  
                            <a class="runner btn btn-mini btn-warning btn-slideright" tabindex="0" href="javascript:void('');" onclick="showAjaxModel('Company','company/addEditCompany/\'\'/90');"><span>Add New</span></a>
                      <?php  //} ?>
                    </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle tooltips" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" data-title="Change color">
                                    <i class="fa fa-paint-brush"></i>
                                </button>
                                <div class="dropdown-menu pull-right dropdown-table-colors">
                                    <span data-color="default" class="dropdown-list bg-default">&nbsp;</span>
                                    <span data-color="primary" class="dropdown-list bg-primary">&nbsp;</span>
                                    <span data-color="danger" class="dropdown-list bg-danger">&nbsp;</span>
                                    <span data-color="success" class="dropdown-list bg-success">&nbsp;</span>
                                    <span data-color="info" class="dropdown-list bg-info">&nbsp;</span>
                                    <span data-color="warning" class="dropdown-list bg-warning">&nbsp;</span>
                                    <span data-color="lilac" class="dropdown-list bg-lilac">&nbsp;</span>
                                    <span data-color="inverse" class="dropdown-list bg-inverse">&nbsp;</span>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle tooltips" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" data-title="Change column">
                                    <i class="fa fa-columns"></i>
                                </button>
                                <ul class="dropdown-menu pull-right dropdown-toggle-column">
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Company Name</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Email</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Profile Picture</a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Mobile</a>
                                    </li>

                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>First Contact</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Second Contact</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>First Address</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Second Address</a>
                                    </li>
                                    <!--<li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>State</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>City</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Zipcode</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Created By</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Created Date</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="3"><i class="fa fa-check-circle-o"></i>Updated Date</a>
                                    </li>-->

                                </ul>
                            </div>
                            <button class="btn btn-sm" data-action="expand" data-toggle="tooltip" data-placement="top" data-title="Expand"><i class="fa fa-expand"></i></button>
                            <button class="btn btn-sm" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            </div>
                            <div class="clearfix"></div>
                </div><!-- /.panel-heading -->
                <div class="panel-body no-padding">
                    <form id="frm-example" name="frm-example" action="javascript:void(0);" method="POST">
                        <div class="panel-body">
                            <div class="panel panel-default panel-table no-margin">
                                <div class="panel-body no-padding">
                                    <table id="company_table" class="table table-default table-middle table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="ckbox ckbox-primary">
                                                        <input id="checkbox-all" type="checkbox" name="select_all" value="1" class="display-hide">
                                                        <label for="checkbox-all"></label>
                                                    </div>
                                                </th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Profile Picture</th>
                                                <th>Mobile</th>
                                                <th>First Contact</th>
                                                <th>Second Contact</th>
                                                <th>First Address</th>
                                                <th>Second Address</th>
                                                <!--<th>State</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>-->
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Profile Picture</th>
                                                <th>Mobile</th>
                                                <th>First Contact</th>
                                                <th>Second Contact</th>
                                                <th>First Address</th>
                                                <th>Second Address</th>
                                                <!--<th>State</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>-->
                                                <th>#</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div><!-- /.panel-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    jQuery(document).ready(function(){
      BlankonTableAdvanced.init('company_table',base_url+'company/getAllCompanies',9);
   });
</script>                            
