<hr />
				
<div class="panel panel-default">
  <div class="panel-body text-center">
    <div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-lg btn-info <?php if(!$class_id || $class_id == NULL) echo ' active bold' ?>" href="<?php echo base_url().'admin/invoice_report/0/'.$payment_status; ?>" role="button">ALL</a>
        <?php 
            $class_name = '';
            $payment_status_text = '';
            $classes = $this->db->get('class')->result_array(); 
        ?>
        <?php foreach($classes as $row) { ?>
            <a class="btn btn-lg btn-info <?php if($row['class_id'] == $class_id) {echo ' active bold'; $class_name = ' > '.$row['name'];} ?>" href="<?php echo base_url().'admin/invoice_report/'.$row['class_id'].'/'.$payment_status; ?>" role="button"><?php echo $row['name']; ?></a>
        <?php } ?>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-lg btn-info <?php if($payment_status !== '0' && $payment_status !== '1') echo ' active bold' ?>" href="<?php echo base_url().'admin/invoice_report/'.$class_id; ?>" role="button">ALL</a>
        <a class="btn btn-lg btn-info <?php if($payment_status == '1') {echo ' active bold'; $payment_status_text = ' > (Paid)';} ?>" href="<?php echo base_url().'admin/invoice_report/'.$class_id.'/1'; ?>" role="button">Paid</a>
        <a class="btn btn-lg btn-info <?php if($payment_status == '0') {echo ' active bold'; $payment_status_text = ' > (Unpaid)';} ?>" href="<?php echo base_url().'admin/invoice_report/'.$class_id.'/0'; ?>" role="button">Unpaid</a>
    </div>
  </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <strong >Session (<?php echo $this->session->userdata('session_name'); ?>) <?=$class_name?> <?=$payment_status_text?>  > Total amount :  <span class="total_amount"></span></strong>
    </div>
</div>

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
        <?php $total_amount = 0; ?>
        <?php foreach($invoices as $row):?>
        <tr>
            <td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['amount']; $total_amount+=$row['amount']; ?></td>
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
        <script> $('.total_amount').text("<?php echo $total_amount; ?>"); </script>
    </tbody>
</table>
			