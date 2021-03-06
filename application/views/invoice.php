                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-table"></i>Distributor Invoice</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Distributor Invoice</li>
                        </ol>
                    </div><!-- /.breadcrumb-wrapper -->
                </div><!-- /.header-content -->
                <!--/ End page header -->
                <!-- Start body content -->
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Start repeater -->
                            <div class="panel rounded shadow no-overflow">
                                <div class="panel-heading">
                    <div class="dt-buttons pull-left">
                        <a href="<?php echo base_url(); ?>Invoice/addEditInvoice" tabindex="0" class="runner rounded btn btn-mini btn-warning btn-slideright btn-block"><span>Add New</span></a>
                    </div>                       
                   <div class="pull-right">
                        <div class="btn-group">
                            <button data-title="Change language" data-placement="top" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm dropdown-toggle tooltips" type="button" data-original-title="" title="">
                                <i class="fa fa-globe"></i> <span class="text-language">English</span>
                            </button>
                            <div class="dropdown-menu dropdown-table-language pull-right bg-default">
                                <span data-title="English" data-placement="top" data-language="English" class="dropdown-list tooltips flag-icon flag-icon-gb change-language" data-original-title="" title=""></span>
                                <span data-title="Indonesian" data-placement="top" data-language="Indonesian" class="dropdown-list tooltips flag-icon flag-icon-id change-language" data-original-title="" title=""></span>
                                <span data-title="Africa" data-placement="top" data-language="Afrikaans" class="dropdown-list tooltips flag-icon flag-icon-af change-language" data-original-title="" title=""></span>
                                <span data-title="Chinese" data-placement="top" data-language="Chinese" class="dropdown-list tooltips flag-icon flag-icon-cn change-language" data-original-title="" title=""></span>
                                <span data-title="Germany" data-placement="top" data-language="German" class="dropdown-list tooltips flag-icon flag-icon-de change-language" data-original-title="" title=""></span>
                                <span data-title="France" data-placement="top" data-language="French" class="dropdown-list tooltips flag-icon flag-icon-fr change-language" data-original-title="" title=""></span>
                                <span data-title="Japanese" data-placement="top" data-language="Japanese" class="dropdown-list tooltips flag-icon flag-icon-jp change-language" data-original-title="" title=""></span>
                                <span data-title="Spain" data-placement="top" data-language="Spanish" class="dropdown-list tooltips flag-icon flag-icon-es change-language" data-original-title="" title=""></span>
                                <span data-title="Portugal" data-placement="top" data-language="Portuguese" class="dropdown-list tooltips flag-icon flag-icon-pt change-language" data-original-title="" title=""></span>
                                <span data-title="Korea" data-placement="top" data-language="Korean" class="dropdown-list tooltips flag-icon flag-icon-kr change-language" data-original-title="" title=""></span>
                                <span data-title="Italy" data-placement="top" data-language="Italian" class="dropdown-list tooltips flag-icon flag-icon-it change-language" data-original-title="" title=""></span>
                                <span data-title="India" data-placement="top" data-language="Hindi" class="dropdown-list tooltips flag-icon flag-icon-in change-language" data-original-title="" title=""></span>
                            </div>
                        </div>
                        <div class="btn-group">
                             <button data-title="Change color" data-placement="top" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm dropdown-toggle tooltips" type="button" data-original-title="" title="">
                              <i class="fa fa-paint-brush"></i></button>
                              <div class="dropdown-menu pull-right dropdown-table-colors">
                                    <span class="dropdown-list bg-default" data-color="default">&nbsp;</span>
                                    <span class="dropdown-list bg-primary" data-color="primary">&nbsp;</span>
                                    <span class="dropdown-list bg-danger" data-color="danger">&nbsp;</span>
                                    <span class="dropdown-list bg-success" data-color="success">&nbsp;</span>
                                    <span class="dropdown-list bg-info" data-color="info">&nbsp;</span>
                                    <span class="dropdown-list bg-warning" data-color="warning">&nbsp;</span>
                                    <span class="dropdown-list bg-lilac" data-color="lilac">&nbsp;</span>
                                    <span class="dropdown-list bg-inverse" data-color="inverse">&nbsp;</span>
                                </div>
                          </div>
                          <div class="btn-group">
                          <button data-title="Change column" data-placement="top" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm dropdown-toggle tooltips" type="button" data-original-title="" title="">
                          <i class="fa fa-columns"></i></button>
                                <ul class="dropdown-menu pull-right dropdown-toggle-column">
                                    <li>
                                        <a data-column="1" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Invoice Number</a>
                                    </li>
                                    <li>
                                        <a data-column="1" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Invoice Date</a>
                                    </li>
                                    <li>
                                        <a data-column="1" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Total</a>
                                    </li>
                                    <li>
                                        <a data-column="1" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Tax Total</a>
                                    </li>
                                    <li>
                                        <a data-column="1" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Shipping Total</a>
                                    </li>
                                     <li>
                                        <a data-column="2" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Discount Total</a>
                                    </li>
                                    <li>
                                        <a data-column="2" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Paid Amount</a>
                                    </li>
                                    <li>
                                        <a data-column="2" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Created Date</a>
                                    </li>
                                    <li>
                                        <a data-column="2" class="toggle-column" href="javascript:void(0);"><i class="fa fa-check-circle-o"></i>Updated Date</a>
                                    </li>
                                </ul>
                            </div>
                            <button data-title="Expand" data-placement="top" data-toggle="tooltip" data-action="expand" class="btn btn-sm" data-original-title="" title=""><i class="fa fa-expand"></i></button>
                            <button data-title="Collapse" data-placement="top" data-toggle="tooltip" data-action="collapse" class="btn btn-sm" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
                        </div>
                        <div class="clearfix"></div>
                </div>
                        <div class="panel-body">
                            <div class="panel panel-default panel-table no-margin">
                                <div class="panel-body no-padding">
                                    <div class="table-responsive">
                                        <table id="region_table" class="table table-default table-middle table-striped table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <div class="ckbox ckbox-primary">
                                                        <input id="checkbox-all" type="checkbox" name="select_all" value="1" class="display-hide">
                                                        <label for="checkbox-all"></label>
                                                    </div>
                                                </th>
                                                <th style="text-align :center">Invoice Number</th>
                                                <th style="text-align :center">Invoice Date</th>
                                                <th style="text-align :center">Total</th>
                                                <th style="text-align :center">Tax Total</th>
                                                <th style="text-align :center">Shipping Total</th>
                                                <th style="text-align :center">Discount Total</th>
                                                <th style="text-align :center">Paid Amount</th>
                                                <th style="text-align :center">Created Date</th>
                                                <th style="text-align :center">Updated Date</th>
                                                <th style="text-align :center">#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <div class="ckbox ckbox-primary">
                                                        <input id="checkbox-all1" type="checkbox" name="select_all1" value="1" class="display-hide">
                                                        <label for="checkbox-all1"></label>
                                                    </div>
                                                </td>
                                                <td style="text-align :center">111</td>
                                                <td style="text-align :center">2016-05-05</td>
                                                <td style="text-align :center">1200</td>
                                                <td style="text-align :center">200</td>
                                                <td style="text-align :center">500</td>
                                                <td style="text-align :center">200</td>
                                                <td style="text-align :center">1700</td>
                                                <td style="text-align :center">2016-05-05 15:00:00</td>
                                                <td style="text-align :center"></td>
                                                <td><div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                    <a href="<?php echo base_url(); ?>Invoice/addEditInvoice"><li>Edit</li></a>
                                                    <li role="separator" class="divider"></li>
                                                    <a href="#"><li>Active</li></a>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tbody>
                                            <tbody>
                                                <th>
                                                    <div class="ckbox ckbox-primary">
                                                        <input id="checkbox-all2" type="checkbox" name="select_all2" value="1" class="display-hide">
                                                        <label for="checkbox-all2"></label>
                                                    </div>
                                                </th>
                                                <td style="text-align :center">112</td>
                                                <td style="text-align :center">2016-05-05</td>
                                                <td style="text-align :center">1300</td>
                                                <td style="text-align :center">200</td>
                                                <td style="text-align :center">500</td>
                                                <td style="text-align :center">200</td>
                                                <td style="text-align :center">1800</td>
                                                <td style="text-align :center">2016-05-05 15:00:00</td>
                                                <td style="text-align :center"></td>
                                                
                                                <td><div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                    <a href="<?php echo base_url(); ?>Invoice/addEditInvoice"><li>Edit</li></a>
                                                    <li role="separator" class="divider"></li>
                                                    <a href="#"><li>Deactive</li></a>
                                                    </ul>
                                                    </div>
                                                </td>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th style="text-align :center">Distributor Name</th>
                                                <th style="text-align :center">Email Id </th>
                                                <th style="text-align :center">Address</th>
                                                <th style="text-align :center">Phone Number</th>
                                                <th style="text-align :center">Description</th>
                                                <th style="text-align :center">Distribution Level</th>
                                                <th style="text-align :center">Head Distributor</th>
                                                <th style="text-align :center">Inserted By</th>
                                                <th style="text-align :center">Inserted On</th>
                                                <th style="text-align :center">#</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <br>
                                        <div style="float:left" id="region_table_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                        <span>
                                        <div class="dataTables_paginate paging_full_numbers" id="region_table_paginate"><ul class="pagination"><li class="paginate_button first disabled" aria-controls="region_table" tabindex="0" id="region_table_first"><a href="#">First</a></li><li class="paginate_button previous disabled" aria-controls="region_table" tabindex="0" id="region_table_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="region_table" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="region_table" tabindex="0" id="region_table_next"><a href="#">Next</a></li><li class="paginate_button last disabled" aria-controls="region_table" tabindex="0" id="region_table_last"><a href="#">Last</a></li></ul></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <!--/ End repeater -->
        </div><!-- /.panel-body -->
        