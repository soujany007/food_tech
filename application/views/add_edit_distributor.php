                <!-- Start page header -->
                <div class="header-content">
                    <h2>Add / Edit Distributor</h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="dashboard.html">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="market.html">Distributor</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add / Edit  Distributor</li>
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
                                        <h3 class="panel-title">Add / Edit Distributor</h3>
                                    </div><!-- /.pull-left -->
                                   
                                    <div class="clearfix"></div>
                                </div><!-- /.panel-heading -->
                                <div class="panel-body no-padding">
                                    <form class="form-horizontal" role="form" id="basic-validate" action="#">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Distributor Name<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="distributor_name" placeholder="" value="Krati Sales And Distribution">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email Id<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="emailid" placeholder="" value="K@gmail.com">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="addres" placeholder="" value="11,vijaynagar">
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Phone Number<span class="asterisk">*</span></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control input-sm" name="phone number" placeholder="" value="07352132">
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
                                                        <option value="1">State</option>
                                                        <option value="2" selected>City</option>
                                                        <option value="3">District</option>
                                                        <option value="4">Streets</option>
                                                        <option value="5">Stores</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Head Distributors</label>
                                                <div class="col-sm-3">
                                                    <select id="level" multiple="multiple"name="dis_level" class="form-control input-sm" >
                                                        <option value="">Select</option>
                                                        <option value="1" selected>VKN Enterprises-MP,Delhi</option>
                                                        <option value="2" selected>SD Associates-PNB</option>
                                                        <option value="3">Rawat Associates-MH</option>
                                                        <option value="4">Streets-GJ</option>
                                                        <option value="5">Ganesh Stockist-RJ</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Cities</label>
                                                <div class="col-sm-2">
                                                    <select id="level" multiple="mulitple" name="dis_level" class="form-control input-sm" >
                                                        <option value="1" selected>Indore</option>
                                                        <option value="2" selected>Ujjain</option>
                                                        <option value="3" >Dewas</option>
                                                        <option value="3" selected>Ali Pur</option>
                                                        <option value="4">Bhopal</option>
                                                        <option value="5">Jabalpur</option>
                                                        <option value="5" selected>Chandigarh</option>
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
                