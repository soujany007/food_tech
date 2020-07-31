                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit Employee</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="employee.html">Employee</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit  Employee</li>
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
                                        <h3 class="panel-title">Add / Edit Employee</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Employee Name<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="employee_name" placeholder="" value="Jayesh Shah">
                                                </div>
                                            </div><!-- /.form-group -->

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email Id<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="email_id" placeholder="" value="Jayesh@gmail.com">
                                                </div>
                                            </div><!-- /.form-group -->    
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="address" placeholder="" value="12,vijaynagar">
                                                </div>
                                            </div><!-- /.form-group -->        
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Phone Number<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="nno" placeholder="" value="0731245689">
                                                </div>
                                            </div><!-- /.form-group -->            

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Distribution Level</label>
                                                <div class="col-sm-2">
                                                    <select id="level" name="dis_level" class="form-control input-sm" >
                                                        <option value="1">State</option>
                                                        <option value="2" selected>City</option>
                                                        <option value="3">District</option>
                                                        <option value="4">Streets</option>
                                                        <option value="5">Stores</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Distributors</label>
                                                <div class="col-sm-2">
                                                    <select id="level" name="city" class="form-control input-sm" >
                                                        <option value="">Select</option>
                                                        <option value="1" selected>VKN Enterprises</option>
                                                        <option value="2" selected>SD Associates</option>
                                                        <option value="3">Rawat Associates</option>
                                                        <option value="4">Streets</option>
                                                        <option value="5">Ganesh Stockist</option>
                                                    </select>
                                                </div>
                                            </div>
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
                