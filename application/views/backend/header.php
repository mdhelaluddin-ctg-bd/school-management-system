<div class="row header-top">
	<!-- Raw Links -->
	<div class="col-md-12 col-sm-12 clearfix ">
		
        <ul class="list-inline links-list pull-left">	
			<li>
				<h2 style="font-weight:200; margin:0px;"><?php echo $system_name;?></h2>
			</li>
		</ul>
        
		<ul class="list-inline links-list pull-right">
			
			<li>
                <strong class="text-danger">Session (<?php echo $this->session->userdata('session_name'); ?>)</strong>
			</li>
			

			<li class="dropdown language-selector">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        	<i class="entypo-user"></i> <?php echo $this->session->userdata('login_type');?>
                    </a>
				<?php if ($account_type != 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-left'; else echo 'pull-right';?>">
					<li>
						<a href="<?php echo base_url();?><?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?><?php echo $account_type;?>/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('login/logout'); ?>">
						<i class="entypo-logout right"></i>
						<span>Log Out</span>
						</a>
					</li>
				</ul>
				<?php endif;?>
				<?php if ($account_type == 'parent'):?>
				<ul class="dropdown-menu <?php if ($text_align == 'right-to-left') echo 'pull-right'; else echo 'pull-left';?>">
					<li>
						<a href="<?php echo base_url();?>parents/manage_profile">
                        	<i class="entypo-info"></i>
							<span><?php echo get_phrase('edit_profile');?></span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>parents/manage_profile">
                        	<i class="entypo-key"></i>
							<span><?php echo get_phrase('change_password');?></span>
						</a>
					</li>
				</ul>
				<?php endif;?>
			</li>
		
		</ul>
	</div>

	<hr style="margin:0px;" />
	
</div>