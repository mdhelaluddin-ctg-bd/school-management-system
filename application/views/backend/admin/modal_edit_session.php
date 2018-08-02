<?php 
$edit_data		=	$this->db->get_where('session' , array('session_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Edit session
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'admin/sessions/do_update/'.$row['session_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Session name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="session_name" value="<?php echo $row['session_name'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Session description</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="session_description" value="<?php echo $row['session_description'];?>"/>
                        </div>
                    </div>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info">Edit session</button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


