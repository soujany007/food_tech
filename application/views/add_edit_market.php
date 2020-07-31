                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit Market</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="market.html">Market</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit  Market</li>
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
                                        <h3 class="panel-title">Add / Edit Market</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal form-bordered" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="title" placeholder="Enter Title" value="East Indore">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control input-sm" name="discription" placeholder="write description !!!!">Write Your description !!!!</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Distribution Level</label>
                                                <div class="col-sm-2">
                                                    <select id="level" name="dis_level" class="form-control input-sm" >
                                                        <option value="1">state</option>
                                                        <option value="2" selected>city</option>
                                                        <option value="3">district</option>
                                                        <option value="4">street</option>
                                                        <option value="5">store</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Level</label>
                                                <div class="col-sm-1">
                                                    <select id="level" name="level" class="form-control input-sm" >
                                                        <option value="">Select</option>
                                                        <option value="1" selected>MP</option>
                                                        <option value="2">indore</option>
                                                        <option value="3">ujjain</option>
                                                        <option value="4">delhi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                            <!--<div class="form-group">
                                                <label class="col-sm-3 control-label">Inserted On</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="inserted_on" placeholder="mm/dd/yyyy">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <!--<div class="form-group">
                                                <label class="col-sm-3 control-label">Inserted By</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="inserted_by" placeholder="">
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div><!-- /.form-body -->
                                        <div class="form-footer">
                                            <div class="col-sm-offset-3">
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
                