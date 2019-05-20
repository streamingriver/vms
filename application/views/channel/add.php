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
					<?php if(config_item("gui.can_edit_channel_url")): ?>
					<div class="col-md-6">
						<label for="url" class="control-label"><span class="text-danger">*</span>url</label>
						<div class="form-group">
							<input type="text" name="url" value="<?php echo htmlspecialchars($this->input->post('url')); ?>" class="form-control" id="url" />
							<span class="text-danger"><?php echo form_error('url');?></span>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-6">
						<label for="stream_url" class="control-label"><span class="text-danger">*</span>Stream Url</label>
						<div class="form-group">
							<input type="text" name="stream_url" value="<?php echo htmlspecialchars($this->input->post('stream_url')); ?>" class="form-control" id="stream_url" />
							<span class="text-danger"><?php echo form_error('stream_url');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<label for="epg1" class="control-label"><span class="text-danger">*</span>TVG-ID</label>
						<div class="form-group">
							<input type="text" name="epg1" value="<?php echo htmlspecialchars($this->input->post('epg1')); ?>" class="form-control" id="epg1" />
							<span class="text-danger"><?php echo form_error('epg1');?></span>
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