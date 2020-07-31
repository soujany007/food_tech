<div class="body-content no-padding p-10 animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel rounded shadow">
                    <div class="panel-body no-padding rounded-bottom">
                    <form class="form-horizontal" name="addEditCompany" id="addEditCompany" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                           <div class="row"> 
                                <div class="form-group col-sm-4 <?php echo (form_error('name')) ? 'has-error':'';?>" >
                                    <label class="col-sm-12 ">Company Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php if(!empty($dataArr['name'])){echo set_value('name',$dataArr['name']);}?>">
                                        <?php echo form_error('name','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('email')) ? 'has-error':'';?>" >
                                    <label class="col-sm-12 ">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="email" id="email" value="<?php if(!empty($dataArr['email'])){echo set_value('email',$dataArr['email']);}?>">
                                        <?php echo form_error('email','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="col-sm-12 ">Profile Pic</label>
                                    <div class="col-sm-12">
                                    <?php 
                                        if(!empty($dataArr['profile_picture'])){
                                           $img_path=base_url().$this->config->item('company_profile_pic_url').$dataArr['profile_picture'];
                                        ?>
                                           <img src="<?php echo $img_path; ?>" width=50 height=50 class="pull-left"/>
                                  <?php }else{ ?>
                                           <div class="initialChar pull-left">C</div>
                                  <?php } ?>
                                        <input type="file" class="pull-right" name="profile_picture" id="profile_picture">
                                        <?php if( form_error('profile_picture') || isset($error_profile_picture))
                                            { 
                                                echo '<div style="color:red;float:right">'.$error_profile_picture.'</div>';
                                            }
                                        ?>
                                </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="form-group col-sm-4 <?php echo (form_error('mobile')) ? 'has-error':'';?>">
                                    <label class="col-sm-12">Mobile</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php if(!empty($dataArr['mobile'])){echo set_value('mobile',$dataArr['mobile']);}?>">
                                        <?php echo form_error('mobile', '<p class="error" style="display: inline;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('contact1')) ? 'has-error':'';?>">
                                    <label class="col-sm-12 ">First Contact</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="contact1" id="contact1" value="<?php if(!empty($dataArr['contact1'])){echo set_value('contact1',$dataArr['contact1']);}?>">
                                        <?php echo form_error('contact1','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('contact2')) ? 'has-error':'';?>">
                                    <label class="col-sm-12 ">Second Contact</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="contact2" id="contact2" value="<?php if(!empty($dataArr['contact2'])){echo set_value('contact2',$dataArr['contact2']);}?>">
                                        <?php echo form_error('contact2','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 <?php echo (form_error('address1')) ? 'has-error':'';?>"">
                                    <label class="col-sm-12">First Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="address1" id="address1" value="<?php if(!empty($dataArr['address1'])){echo set_value('address1',$dataArr['address1']);}?>">
                                        <?php echo form_error('address1', '<p class="error" style="display: inline;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('address2')) ? 'has-error':'';?>">
                                    <label class="col-sm-12 ">Second Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="address2" id="address2" value="<?php if(!empty($dataArr['address2'])){echo set_value('address2',$dataArr['address2']);}?>">
                                        <?php echo form_error('address2','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('state')) ? 'has-error':'';?>">
                                    <label class="col-sm-12 ">State</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="state" id="state" value="<?php if(!empty($dataArr['state'])){echo set_value('state',$dataArr['state']);}?>">
                                        <?php echo form_error('state','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 <?php echo (form_error('city')) ? 'has-error':'';?>">
                                    <label class="col-sm-12">City</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="city" id="city" value="<?php if(!empty($dataArr['city'])){echo set_value('city',$dataArr['city']);}?>">
                                        <?php echo form_error('city', '<p class="error" style="display: inline;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 <?php echo (form_error('zipcode')) ? 'has-error':'';?>">
                                    <label class="col-sm-12 ">Zipcode</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php if(!empty($dataArr['zipcode'])){echo set_value('zipcode',$dataArr['zipcode']);}?>">
                                        <?php echo form_error('zipcode','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.form-body -->
                        <div class="clearfix"></div>
                        <div class="form-footer">
                            <div class="pull-right">
                                <input type="hidden" name="id" value="<?php echo (!empty($dataArr['company_id']))? $dataArr['company_id']:'';?>">
                                <a class="btn btn-danger btn-slideright mr-5" href="#" data-dismiss="modal">Cancel</a>
                                <button type="button" onclick="submitFileMoldelForm('addEditCompany','company/addEditCompany/')" class="btn btn-warning btn-slideright">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.form-footer -->
                    </form>
                </div><!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
   