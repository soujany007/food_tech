                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit Distributor Invoice</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="distributor_order.html">Distributor Invoice</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit  Distributor Invoice</li>
                        </ol>
                    </div><!-- /.breadcrumb-wrapper -->
                </div><!-- /.header-content -->
                <!--/ End page header -->
                <!-- Start body content -->
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Start basic validation -->
                            <div class="panel rounded shadow">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h3 class="panel-title">Add / Edit Distributor Invoice</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-4 control-label">Invoice Number<span class="asterisk">*</span></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" name="invoice_no" placeholder="" value="111">
                                                    </div>
                                                </div><!-- /.form-group -->
                                                <div class="col-sm-6">
                                                    <label class="col-sm-3 control-label">Invoice Date<span class="asterisk">*</span></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control input-sm" name="invoice_date" placeholder="" value="2016-05-05">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <table class="table table-bordered table-striped table-white ">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align :center">Product</th>
                                                            <th style="text-align :center">Quantity (pkt.)</th>
                                                            <th style="text-align :center">Rate</th>
                                                            <th style="text-align :center">Invoice Amount</th>
                                                            <th style="text-align :center">Tax</th>
                                                            <th style="text-align :center">Total Invoice Amount</th>
                                                            <th>
                                                               <a id="kk" class="btn btn-info">
                                                                    <i class="fa fa-plus fa-fw"></i>
                                                                                    Add to list
                                                                </a>
                                                              <!--<a id="kk" href="javascript:void(0);" onclick="addProducts()">Add Products</a>-->
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align :center">Lays</td>
                                                            <td style="text-align :center">50</td>
                                                            <td>
                                                                <input type="text" value="10" name="rate" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" readonly="readonly" value="600" name="total1" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="100" name="tax1" class="form-control">
                                                            </td>
                                                            <td><input type="text" value="700" name="final_amt1" class="form-control"></td>
                                                            <td><a id="remove1" class="removeprod btn btn-primary" href="javascript:void(0);"><i class="fa fa-times"></i>Cancel</a></td>

                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align :center">Kurkure</td>
                                                            <td style="text-align :center">50</td>
                                                            <td>
                                                                <input type="text" value="10" name="rate" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" readonly="readonly" value="600" name="total2" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="100" name="tax2" class="form-control">
                                                            </td>
                                                            <td><input type="text" value="700" name="final_amt2" class="form-control"></td>
                                                            <td><a id="remove2" class="removeprod btn btn-primary" href="javascript:void(0);"><i class="fa fa-times"></i>Cancel</a></td>

                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Grand Total Invoice Amount</td>
                                                            <td>
                                                                <input type="text" readonly="readonly" value="1400" name="g_tax" class="form-control">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Shippment</td>
                                                            <td>
                                                                <input type="text" class="form-control input-sm" name="shipment" placeholder="" value="500">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Discount</td>
                                                            <td>
                                                                <input type="text" class="form-control input-sm" name="shipment" placeholder="" value="200">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Pay Amount</td>
                                                            <td>
                                                                <input type="text" readonly="readonly" class="form-control input-sm" name="shipment" placeholder="" value="1700">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- /.form-body -->
                                        <div class="form-footer">
                                            <div class="col-sm-offset-5">
                                                <a href="#"><button type="button" class="btn btn-theme">Save</button></a>
                                                <?php 
                                                /*
                                                <button type="button" onclick="submitFileMoldelForm('addEditCompany','company/addEditCompany/')" class="btn btn-warning btn-slideright">Submit</button>
                                                */
                                                ?>
                                                <a class="btn btn-danger btn-slideright mr-5" href="#" data-dismiss="modal">Cancel</a>
                                            </div>
                                        </div><!-- /.form-footer -->
                                    </form>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
                            <!--/ End basic validation -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.body-content -->
                <!--/ End body content -->
                