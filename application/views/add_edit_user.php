                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit User</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="user.html">User</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit User</li>
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
                                        <h3 class="panel-title">Add / Edit User</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">User Name<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="user_name" placeholder="" value="Jayesh Shah">
                                                </div>
                                            </div><!-- /.form-group -->

                                           <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Distributor Name<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="distributor_name" placeholder="" value="VKN Enterprises">
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
                