<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Channels Packages Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('channels_package/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Channel Id</th>
						<th>Package Id</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($channels_packages as $c){ ?>
                    <tr>
						<td><?php echo $c['channel_id']; ?></td>
						<td><?php echo $c['package_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('channels_package/edit/'.$c['channel_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('channels_package/remove/'.$c['channel_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
