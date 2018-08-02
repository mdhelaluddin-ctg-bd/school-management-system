<hr />
<?php echo form_open(base_url() . 'admin/invoice/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
    
    <div class="panel panel-default panel-shadow" data-collapsed="0">
    
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">Session</label>
                <div class="col-sm-9">
                    <span class="form-control">
                        <strong><?php echo $this->session->userdata('session_name'); ?></strong>
                    <span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Class</label>
                <div class="col-sm-9">
                    <input type="hidden" name="session_id" value="<?php echo $this->session->userdata('session_id'); ?>" />
                    <select name="class_id" class="form-control" style="" >
                        <?php 
                        $this->db->order_by('class_id', 'asc');
                        $classes = $this->db->get('class')->result_array();
                        foreach($classes as $row):
                        ?>
                            <option value="<?php echo $row['class_id'];?>">
                                <?php echo $row['name'];?>
                            </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="description"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Due date</label>
                <div class="col-sm-9">
                    <input type="text" class="datepicker form-control" name="due_date"/>
                </div>
            </div>

                <div class="form-group">
                <label class="col-sm-3 control-label">Invoice Amount</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount"
                        placeholder="<?php echo get_phrase('enter_total_amount');?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-info"><?php echo get_phrase('add_invoice');?></button>
                </div>
            </div>
            
        </div>
    </div>

<?php echo form_close();?>
</div>
<!----CREATION FORM ENDS-->
