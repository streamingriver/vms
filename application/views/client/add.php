<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Client Add</h3>
            </div>
            <?php echo form_open('client/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="package_id" class="control-label"><span class="text-danger">*</span>Package</label>
						<div class="form-group">
							<select name="package_id" class="form-control">
								<option value="">select package</option>
								<?php 
								foreach($all_packages as $package)
								{
									$selected = ($package['id'] == $this->input->post('package_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$package['id'].'" '.$selected.'>'.$package['name'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('package_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="mac" class="control-label"><span class="text-danger">*</span>Mac</label>
						<div class="form-group">
							<input type="text" name="mac" value="<?php echo $this->input->post('mac'); ?>" class="form-control" id="mac" />
							<span class="text-danger"><?php echo form_error('mac');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="comment" class="control-label"><span class="text-danger">*</span>Comment</label>
						<div class="form-group">
							<textarea name="comment" class="form-control" id="comment"><?php echo $this->input->post('comment'); ?></textarea>
							<span class="text-danger"><?php echo form_error('comment');?></span>
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