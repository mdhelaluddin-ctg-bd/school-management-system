<hr />
				
<table  class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div><?php echo get_phrase('student');?></div></th>
            <th><div><?php echo get_phrase('title');?></div></th>
            <th><div>Invoice Amount</div></th>
            <th><div><?php echo get_phrase('paid');?></div></th>
            <th><div><?php echo get_phrase('status');?></div></th>
            <th><div>Due Date</div></th>
            <th><div><?php echo get_phrase('options');?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($invoices as $row):?>
        <tr>
            <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo $row['amount_paid'];?></td>
            <td>
                <span class="label label-<?php if($row['status']=='1')echo 'success';else echo 'secondary';?>">
                    <?php echo $row['status'] ? 'Paid' : 'Unpaid';?>
                </span>
            </td>
            <td><?php echo date('d M, Y', strtotime($row['due_date']));?></td>
            <td>
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                    <?php if ($row['status'] == 0):?>

                    <li>
                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_take_payment/<?php echo $row['invoice_id'];?>');">
                            <i class="entypo-bookmarks"></i>
                                <?php echo get_phrase('take_payment');?>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php endif;?>
                    
                    <!-- VIEWING LINK -->
                    <li>
                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_view_invoice/<?php echo $row['invoice_id'];?>');">
                            <i class="entypo-credit-card"></i>
                                <?php echo get_phrase('view_invoice');?>
                            </a>
                                    </li>

                                    <!--
                    <li class="divider"></li> -->
                    
                    <!-- EDITING LINK -->
                    <!--
                    <li>
                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_invoice/<?php echo $row['invoice_id'];?>');">
                            <i class="entypo-pencil"></i>
                                <?php echo get_phrase('edit');?>
                        </a>
                    </li>
                    <li class="divider"></li> -->

                    <!-- DELETION LINK -->
                    <!--
                    <li>
                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/invoice/delete/<?php echo $row['invoice_id'];?>');">
                            <i class="entypo-trash"></i>
                                <?php echo get_phrase('delete');?>
                            </a>
                                    </li>
                        -->
                </ul>
            </div>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
			