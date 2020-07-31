<div class="header-content">
    <h2>
        <i class="fa fa-home"></i>
        <?php echo $heading; ?>
    </h2>
</div>
<div class="body-content no-padding p-10 animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel rounded shadow">
                    <div class="panel-body no-padding rounded-bottom">
                    <form class="form-horizontal" name="addEditDistributionLevel" id="addEditDistributionLevel" method="post">
                        <div class="form-body">
                           <div class="row"> 
                                <div class="form-group col-sm-4 <?php echo (form_error('level_name')) ? 'has-error':'';?>" >
                                    <label class="col-sm-12 ">Distribution Level Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="level_name" id="level_name" value="<?php if(!empty($dataArr['level_name'])){echo set_value('level_name',$dataArr['level_name']);}?>">
                                        <?php echo form_error('level_name','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('description')) ? 'has-error':'';?>" >
                                    <label class="col-sm-12 ">Description</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" name="description" id="description" value=><?php if(!empty($dataArr['description'])){echo set_value('description',$dataArr['description']);}?></textarea>
                                        <?php echo form_error('description','<p class="error" style="display: inline;">','</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 <?php echo (form_error('company_id')) ? 'has-error':'';?>">
                                    <label class="col-sm-12">Company Name</label>
                                    <div class="col-sm-12">
                                        <select id="company_id" name="company_id" class="form-control">
                                    <?php
                                        if(!empty($company_list)){ ?>
                                            <option value="">Select</option>
                                            <?php foreach($company_list as $row){ ?>
                                            <option value="<?php echo $row->company_id; ?>"
                                                <?php 
                                                    if(!empty($dataArr)){
                                                            if($row->company_id==$dataArr['company_id']){
                                                                echo "SELECTED='selected'"; 
                                                            }
                                                        }    
                                                ?>
                                            ><?php echo $row->name; ?></option>
                                                <?php }
                                        }    
                                    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="form-group col-sm-4 <?php echo (form_error('sequence')) ? 'has-error':'';?>">
                                    <label class="col-sm-12">Sequence</label>
                                    <div class="col-sm-12">
                                        <select id="sequence" name="sequence" class="form-control">
                                        <option value="">Select</option>
                                    <?php
                                        for($i=1;$i<=10;$i++){ ?>
                                        <option value="<?php echo $i; ?>"
                                            <?php 
                                                if(!empty($dataArr)){if($i==$dataArr['sequence']){echo "SELECTED='selected'";}}
                                            ?>
                                        ><?php echo $i; ?></option>
                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- /.form-body -->
                            <div class="clearfix"></div>
                            <div class="form-footer">
                                <div class="pull-right">
                                        <a class="btn btn-danger btn-slideright mr-5" href="<?php echo base_url().'distribution_level'?>">Cancel</a>
                                    <button type="submit" class="btn btn-warning btn-slideright">Submit</button>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.form-footer -->
                        </div>    
                    </form>
                </div><!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
   