<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Channel Add</h3>
            </div>
            <?php echo form_open('channel/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo htmlspecialchars($this->input->post('name')); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="stream_url" class="control-label"><span class="text-danger">*</span>Stream Url</label>
						<div class="form-group">
							<input type="text" name="stream_url" value="<?php echo htmlspecialchars($this->input->post('stream_url')); ?>" class="form-control" id="stream_url" />
							<span class="text-danger"><?php echo form_error('stream_url');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>