<!-- Start page header -->
<div id="tour-11" class="header-content">
    <h2><i class="fa fa-home"></i><?php echo $heading;?></h2>
</div><!-- /.header-content -->
<?php 
$succMsg = $this->session->flashdata('succMsg');
if(isset($succMsg) && !empty($succMsg)){ ?> <div class="custom_alert alert alert-success"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><?php echo $succMsg;?></div><?php }?>
<div class="body-content animated fadeIn">
    <div class = "row">
        <div class = "col-md-12">
            <div class="panel panel-default shadow no-overflow">
                <div class="panel-heading">
                    <div class="dt-buttons pull-left">
                        <?php // $user_task = getUserTask();
                            // $user_session_data = getUserSession();
                            /*if(in_array('add_contact_type',$user_task))
                            {*/?>
                                <a class="runner btn btn-mini btn-warning btn-slideright btn-block" tabindex="0" href="<?php echo base_url().'distribution_level/addEditDistributionLevel'?>"><span>Add New</span></a>
                   <?php  /*}*/ ?>
                   </div>                       
                   <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm dropdown-toggle tooltips" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" data-title="Change language">
                                <i class="fa fa-globe"></i> <span class="text-language">English</span>
                            </button>
                            <div class="dropdown-menu dropdown-table-language pull-right bg-default">
                                <span class="dropdown-list tooltips flag-icon flag-icon-gb change-language" data-language="English" data-placement="top" data-title="English"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-id change-language" data-language="Indonesian" data-placement="top" data-title="Indonesian"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-af change-language" data-language="Afrikaans" data-placement="top" data-title="Africa"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-cn change-language" data-language="Chinese" data-placement="top" data-title="Chinese"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-de change-language" data-language="German" data-placement="top" data-title="Germany"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-fr change-language" data-language="French" data-placement="top" data-title="France"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-jp change-language" data-language="Japanese" data-placement="top" data-title="Japanese"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-es change-language" data-language="Spanish" data-placement="top" data-title="Spain"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-pt change-language" data-language="Portuguese" data-placement="top" data-title="Portugal"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-kr change-language" data-language="Korean" data-placement="top" data-title="Korea"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-it change-language" data-language="Italian" data-placement="top" data-title="Italy"></span>
                                <span class="dropdown-list tooltips flag-icon flag-icon-in change-language" data-language="Hindi" data-placement="top" data-title="India"></span>
                            </div>
                        </div>
                        <div class="btn-group">
                             <button type="button" class="btn btn-sm dropdown-toggle tooltips" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-placement="top" data-title="Change color">
                              <i class="fa fa-paint-brush"></i></button>
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
                          <i class="fa fa-columns"></i></button>
                                <ul class="dropdown-menu pull-right dropdown-toggle-column">
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="1"><i class="fa fa-check-circle-o"></i>Level Name</a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0);" class="toggle-column" data-column="2"><i class="fa fa-check-circle-o"></i>Company Name</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="2"><i class="fa fa-check-circle-o"></i>Sequence</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="toggle-column" data-column="2"><i class="fa fa-check-circle-o"></i>Description</a>
                                    </li>
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
                                <div class="table-responsive">
                                    <table id="distribution_level_table" class="table table-default table-middle table-striped table-bordered table-condensed">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="ckbox ckbox-primary">
                                                    <input id="checkbox-all" type="checkbox" name="select_all" value="1" class="display-hide">
                                                    <label for="checkbox-all"></label>
                                                </div>
                                            </th>
                                            <th>Level Name</th>
                                            <th>Company Name</th>
                                            <th>Sequence</th>
                                            <th>Description</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Level Name</th>
                                            <th>Company Name</th>
                                            <th>Sequence</th>
                                            <th>Description</th>
                                            <th>#</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    </div>
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
    BlankonTableAdvanced.init('distribution_level_table',base_url+'distribution_level/getAllDistributionLevel',5);
  });
</script>