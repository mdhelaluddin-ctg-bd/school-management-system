<hr />


                
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th width="80"><div><?php echo get_phrase('roll');?></div></th>
            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
            <th><div><?php echo get_phrase('name');?></div></th>
            <th class="span3"><div><?php echo get_phrase('address');?></div></th>
            <th><div><?php echo get_phrase('email');?></div></th>
            <th><div><?php echo get_phrase('options');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php 
                $this->db->select('student.*');
                $this->db->join('session_class_student', 'session_class_student.student_id = student.student_id');
                $students   =   $this->db->get_where('student' , array(
                    'session_class_student.class_id'=>$class_id, 
                    'session_class_student.session_id' => $this->session->userdata('session_id')
                ))->result_array();
                foreach($students as $row):?>
        <tr>
            <td><?php echo $row['roll'];?></td>
            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['email'];?></td>
            <td>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                        
                        <!-- STUDENT PROFILE LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');">
                                <i class="entypo-user"></i>
                                    <?php echo get_phrase('profile');?>
                                </a>
                        </li>
                        
                        <!-- STUDENT EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_student_edit/<?php echo $row['student_id'];?>');">
                                <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit');?>
                                </a>
                        </li>
                        <li class="divider"></li>
                        
                        <!-- STUDENT DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');">
                                <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete');?>
                                </a>
                        </li>
                    </ul>
                </div>
                
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>