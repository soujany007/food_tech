                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit Distributor Order</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="distributor_order.html">Distributor Order</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit  Distributor Order</li>
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
                                        <h3 class="panel-title">Add / Edit Distributor Order</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <!--<div class="row">
                                                <div class="col-sm-4">
                                                    <label class="col-sm-5 control-label">Product Name<span class="asterisk">*</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control input-sm" name="product_name" placeholder="" value="Lays">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label class="col-sm-6 control-label">Distributor Name<span class="asterisk">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control input-sm" name="distributor_name" placeholder="" value="VKN Enterprises">
                                                    </div>
                                                </div>-->
                                                
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-3 control-label">Order Date<span class="asterisk">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control input-sm" name="order_date" placeholder="" value="2016-05-05">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-4 control-label">Delivered Date<span class="asterisk">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control input-sm" name="delivered_date" placeholder="" value="2016-05-08">
                                                    </div>
                                                </div><!-- /.form-group -->
                                            </div><br>    

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-5 control-label">Order Dispatched Date<span class="asterisk">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control input-sm" name="order_dispatched_date" placeholder="" value="2016-05-10">
                                                    </div>
                                                </div><!-- /.form-group -->

                                                <div class="col-sm-6">
                                                    <label class="col-sm-5 control-label">Approx Delivery Date<span class="asterisk">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control input-sm" name="approx_delivery_date" placeholder="" value="2016-05-09">
                                                    </div>
                                                </div><!-- /.form-group -->
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="col-sm-4">Delivered Status</label>
                                                    <div class="col-sm-6">
                                                        <select id="level" name="dis_level" class="form-control input-sm" >
                                                            <option value="created" selected>Created</option>
                                                            <option value="canceled">Canceled</option>
                                                            <option value="pending">Pending</option>
                                                        </select>
                                                    </div>    
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-sm-3 control-label">Remarks<span class="asterisk">*</span></label>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control input-sm" name="remarks" placeholder="Remarks!!!"></textarea>
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
                                                            <td><a id="remove2" class="removeprod btn btn-primary" href="javascript:void(0);"><i class="fa fa-times"></i>Cancel</a></td>

                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Total</td>
                                                            <td>
                                                                <input type="text" readonly="readonly" value="1200" name="g_tax" class="form-control">
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
                                        <div class="form-footer">
                                            <div class="col-sm-offset-4">
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
                