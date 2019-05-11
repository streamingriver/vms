    <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Channels Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('channel/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                    <a href="<?php echo site_url('channel/update'); ?>" class="btn btn-info btn-sm">Update backend</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Name</th>
						<th>Stream Url</th>
						<th>Actions</th>
                        <?php foreach($packages as $package): ?>
                        <th><?php echo $package['name']; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach($channels as $c): ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['name']; ?></td>
						<td><?php echo $c['stream_url']; ?></td>
						<td>
                            <a href="<?php echo site_url('channel/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('channel/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            <a href="<?php echo site_url('channel/restart/'.$c['url']); ?>" class="btn btn-success btn-xs"><span class="fa fa-trash"></span> Restart</a>
                        </td>
                        <?php foreach($packages as $package): ?>
                            <?php $items = array($c['id'] => array()); ?>
                            <?php if(isset($cp[$c['id']])) $items = $cp[$c['id']]; ?>
                            <td>
                            <?php if(!in_array($package['id'], $items)): ?>
                            <?php echo anchor(sprintf("channels_package/add/%s/%s", $c['id'], $package['id']), 'add',array('class'=>'btn btn-danger btn-xs'));?>
                            <?php else: ?>
                            <?php echo anchor(sprintf("channels_package/rm/%s/%s", $c['id'], $package['id']), 'rm',array('class'=>'btn btn-success btn-xs'));?>
                            <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
