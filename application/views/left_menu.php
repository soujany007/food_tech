<?php
$user_task = getUserTask();
//echo "<pre>";print_r($user_task);die();
$current_entity = $this->router->fetch_class();
$current_method = $this->router->fetch_method();
$user_role = getUserRole();
$user_session_data = getUserSession();
//echo "<pre>";print_r($user_session_data);die();
?>
<aside id="sidebar-left" class="sidebar-circle">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="#">
                <img src="http://img.djavaui.com/?create=50x50,4888E1?f=ffffff" alt="admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello, 
                    <span>
                    <?php 
                    if(!empty($user_session_data))
                    {
                        if($user_session_data->is_super_admin == 1)
                        {
                            echo "Super Admin";
                        }
                        else
                        {
                            echo ucfirst(@$user_session_data->name);
                        }
                    }
                    ?>
                    </span>
                </h4>
                <?php /* <small>Web Designer</small> */ ?>
            </div>
        </div>
    </div><!-- /.sidebar-content -->
    <!--/ End left navigation -  profile shortcut -->

    <!-- Start left navigation - menu -->
    <ul class="sidebar-menu">
        <!-- Start navigation -->
    <?php
    if(!empty($user_session_data->code)){
        if($user_session_data->code == 'SA'){?>
            <li class="">
                <a href="<?php echo base_url().'Company'?>">
                    <span class="icon"><i class="fa fa-list"></i></span>
                    <span class="text">Company</span>
                    <!--<span class="arrow"></span>-->
                </a>
                <!--<ul>
                    <li><a href="#">Level 2</a></li>
                    <li><a href="#">Level 2</a></li>
                    <li><a href="#">Level 2</a></li>
                </ul>-->
            </li>
  <?php } 
  } ?>
    <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
                <li class="">
                    <a href="<?php echo base_url(); ?>user/userList">
                        <span class="icon"><i class="fa fa-list"></i></span>
                        <span class="text">User</span>
                        <!--<span class="arrow"></span>-->
                    </a>
                    <!--<ul>
                        <li><a href="#">Level 2</a></li>
                        <li><a href="#">Level 2</a></li>
                        <li><a href="#">Level 2</a></li>
                    </ul>-->
                </li>
        <?php } }?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>employee_beat_instance">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Employee Beat Instance</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code == 'CA' || $user_session_data->code == 'DA' ){?>
        <li class="">
            <a href="<?php echo base_url().'Distribution_level'; ?>">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Distribution Level</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="submenu">
            <a href="<?php echo base_url(); ?>Market">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Market</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="submenu">
            <a href="<?php echo base_url(); ?>Distributor">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Distributors</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }}?>

        <?php 
        /*if(!empty($user_session_data->code)){
            if($user_session_data->code != 'CA' && $user_session_data->code == 'DA'){?>
        <li class="submenu">
            <a href="<?php echo base_url().'distributor_market'; ?>">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Distributor Market</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }}*/?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>Order">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Order</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>
        
        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>Invoice">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Invoice</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>
       
        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>Employee">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Employee</span>
                <!--<span class="plus"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>Product">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Product</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>product_attribute">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Product Attribute</span>
                <!--<span class="plus"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>product_and_attribute">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Product And Attribute</span>
                <!--<span class="plus"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>                    
        <?php }} ?>

        <?php 
        if(!empty($user_session_data->code)){
            if($user_session_data->code != 'SA'){?>
        <li class="">
            <a href="<?php echo base_url(); ?>return_product">
                <span class="icon"><i class="fa fa-list"></i></span>
                <span class="text">Return Product</span>
                <!--<span class="arrow"></span>-->
            </a>
            <!--<ul>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
                <li><a href="#">Level 2</a></li>
            </ul>-->
        </li>
        <?php }}?>
    </ul>    
        <!--/ End navigation -->

      
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="page-signin.html" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="page-lock-screen.html" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div><!-- /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
<!--/ END SIDEBAR LEFT -->

