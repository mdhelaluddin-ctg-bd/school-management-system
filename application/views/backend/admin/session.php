<hr />

<!------CONTROL TABS START------>
<ul class="nav nav-tabs bordered">
    <li class="active">
        <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
            Session List
                </a></li>
    <li>
        <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
            Add Session
                </a></li>
</ul>
<!------CONTROL TABS END------>

<div class="tab-content">
    <!----TABLE LISTING STARTS-->
    <div class="tab-pane box active" id="list">
        
        <table class="table table-bordered datatable" id="table_export">
            <thead>
                <tr>
                    <th><div>#</div></th>
                    <th><div>Session name</div></th>
                    <th><div>Session description</div></th>
                    <th><div><?php echo get_phrase('options');?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1;foreach($sessions as $row):?>
                <tr>
                    <td><?php echo $count++;?></td>
                    <td><?php echo $row['session_name'];?></td>
                    <td><?php echo $row['session_description'];?></td>
                    
                    <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                            
                            <!-- EDITING LINK -->
                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_edit_session/<?php echo $row['session_id'];?>');">
                                    <i class="entypo-pencil"></i>
                                        <?php echo get_phrase('edit');?>
                                    </a>
                                            </li>
                            <li class="divider"></li>
                            
                            <!-- DELETION LINK -->
                            <li>
                                <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/sessions/delete/<?php echo $row['session_id'];?>');">
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
    </div>
    <!----TABLE LISTING ENDS--->
    
    
    <!----CREATION FORM STARTS---->
    <div class="tab-pane box" id="add" style="padding: 5px">
        <div class="box-content">
            <?php echo form_open(base_url() . 'admin/sessions/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="padded">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Session name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="session_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Session description</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="session_description"/>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Add Session</button>
                        </div>
                    </div>
            </form>                
        </div>                
    </div>
    <!----CREATION FORM ENDS-->
</div>




<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>