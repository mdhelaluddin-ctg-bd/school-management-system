<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <?php echo img(['src' => 'uploads/logo.png', 'style' => 'max-height:100px']); ?>
            </a>
        </div>

    
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>	
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <!-- STUDENT -->
        <li class="<?php
        if ($page_name == 'student_add' ||
                $page_name == 'student_bulk_add' ||
                $page_name == 'student_information' ||
                $page_name == 'student_marksheet')
            echo 'opened has-sub';
        ?> ">
            <a href="#">
                <i class="fa fa-group"></i>
                <span><?php echo get_phrase('student'); ?></span>
            </a>
            <ul>
                <!-- STUDENT ADMISSION -->
                <li class="<?php if ($page_name == 'student_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/student_add">
                        <?php echo get_phrase('admit_student'); ?></span>
                    </a>
                </li>

                <!-- STUDENT BULK ADMISSION -->
                <!--
                <li class="<?php if ($page_name == 'student_bulk_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/student_bulk_add">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('admit_bulk_student'); ?></span>
                    </a>
                </li>
                -->

                <!-- STUDENT INFORMATION -->
                <li class="<?php if ($page_name == 'student_information') echo 'opened'; ?> ">
                    <a href="#">
                        <?php echo get_phrase('student_information'); ?></span>
                    </a>
                    <ul>
                        <?php
                        $classes = $this->db->get('class')->result_array();
                        foreach ($classes as $row):
                            ?>
                            <li class="<?php if ($page_name == 'student_information' && $class_id == $row['class_id']) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>admin/student_information/<?php echo $row['class_id']; ?>">
                                    <?php echo $row['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                
            </ul>
        </li>

        <!-- SESSION & CLASS -->
        <li class="<?php
        if ($page_name == 'class' ||
                $page_name == 'session')
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-flow-tree"></i>
                <span>Session &amp; <?php echo get_phrase('class'); ?></span>
            </a>
            <ul>
                            
                <li class="<?php if ($page_name == 'session') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/sessions">
                        Manage Sessions </span>
                    </a>
                </li>

                <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/classes">
                        <?php echo get_phrase('manage_classes'); ?></span>
                    </a>
                </li>
           
                
            </ul>
        </li>


        <!-- PAYMENT -->
        <li class="<?php if ($page_name == 'invoice' || $page_name == 'generate_invoice') echo 'opened active'; ?> ">
            <a href="#">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('payment'); ?></span>
            </a>
            <ul>         
                <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/invoice_report">
                        Invoice/Payment Report </span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'generate_invoice') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/generate_invoice">
                        Generate Invoice </span>
                    </a>
                </li>
            </ul>
        </li>
    

        <!-- ACCOUNTING -->
        <!--
        <li class="<?php
        if ($page_name == 'income' ||
                $page_name == 'expense' ||
                    $page_name == 'expense_category')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-suitcase"></i>
                <span><?php echo get_phrase('accounting'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'income') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/income">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('income'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/expense">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/expense_category">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('expense_category'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        -->


        <!-- SETTINGS -->
        <li class="<?php
        if ($page_name == 'system_settings' ||
                $page_name == 'manage_language' ||
                    $page_name == 'sms_settings')
                        echo 'opened active';
        ?> ">
            <a href="#">
                <i class="entypo-lifebuoy"></i>
                <span><?php echo get_phrase('settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/system_settings">
                        <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>

                <!--
                <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/sms_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('sms_settings'); ?></span>
                    </a>
                </li>
               

                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/manage_language">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('language_settings'); ?></span>
                    </a>
                </li>
                 -->

            </ul>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>admin/manage_profile">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>

    </ul>

</div>