<!-- Login form -->
<form class="sign-in form-horizontal shadow rounded no-overflow" action="" method="post">
    <div class="sign-header">
        <div class="form-group">
            <div class="sign-text">
                <span><?php echo $heading; ?></span>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.sign-header -->
    <?php if(@$setpassword == '1'){?>
    	You have been added as a new user on FranchiseSoft. <br>
    	Please create a password for yourself to be able to use the system. <br>
    	Your email on whcih you recived the email with an actiavtion link will be your user ID.<br>
    	For any questions contact support@franchisesoft.com
    <div id="password_div" <?php if($setpassword == '1') { ?>style="display:block"<?php  } ?>>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
                <div class="errorMsg"><?php echo form_error('password')?></div>
            </div><!-- /.form-group -->
            <div class="form-group has-error">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Confirm Password" name="confirm_password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                   
                </div> 
                <div class="errorMsg"><?php echo form_error('confirm_password')?></div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <button type="submit" name="set_password_btn" value="set_password_btn" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Set Password</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </div>
    <?php }elseif((isset($reset_forgot_password)) && ($reset_forgot_password == '1')) { ?>
    	Create a new password for yourself to be able to use the system. <br>
    	For any questions contact support@franchisesoft.com
    <div id="password_div" <?php if($reset_forgot_password == '1') { ?>style="display:block"<?php  } ?>>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
                <div class="errorMsg"><?php echo form_error('password')?></div>
            </div><!-- /.form-group -->
            <div class="form-group has-error">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Confirm Password" name="confirm_password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                   
                </div> 
                <div class="errorMsg"><?php echo form_error('confirm_password')?></div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <button type="submit" name="set_password_btn" value="set_password_btn" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Set Password</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </div>
    <?php }else{ ?>
    <div id="login_div" <?php if($this->input->post('forgot_btn')!='') { ?>style="display:none"<?php } ?>>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="text" class="form-control input-sm" placeholder="Username" name="username" value="<?php echo (!empty($user_info->user_name))?$user_info->user_name:'';?>">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                <div class="errorMsg"><?php echo form_error('username')?></div>
            </div><!-- /.form-group -->
            <div class="form-group has-error">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                   
                </div> 
                <div class="errorMsg"><?php echo form_error('password')?></div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="ckbox ckbox-theme">
                            <input type="checkbox" <?php echo (!empty($user_info->user_name))?'checked':'';?> id="rememberme" name="rememberme">
                            <label class="rounded" for="rememberme">Remember me</label>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="#" class="toggel-login-form" title="lost password">Lost password?</a>
                    </div>
                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" name="login_btn" value="login_btn" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </div>
    
    <div id="forget_div" <?php if($this->input->post('forgot_btn')=='') { ?>style="display:none"<?php } ?>>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="text" class="form-control input-sm" placeholder="email " name="email">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                <div class="errorMsg"><?php echo form_error('email')?></div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="#" class="toggel-login-form" title="lost password">Back to Login</a>
                    </div>
                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" name="forgot_btn" value="forgot_btn" class=" btn btn-theme btn-lg btn-block no-margin rounded" id="forget-btn">Submit</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </div>
    <?php } ?>
</form>
<div><?php /*?><b>(Head: <?php echo substr(shell_exec($this->config->item('git_head_command')),-9);?>)</b><?php */?></span></div>
<!-- /.form-horizontal -->
<!--/ Login form -->
<script>
$( ".toggel-login-form" ).click(function() {
    $("#forget_div").toggle();
    $("#login_div").toggle();
});
</script>