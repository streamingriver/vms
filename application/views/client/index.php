<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Clients Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('client/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Package Id</th>
						<th>Mac</th>
						<th>Comment</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($clients as $c): ?>
                    <tr>
						<td><?php echo $c['id']; ?></td>
						<td><?php echo $c['package_id']; ?></td>
						<td><?php echo $c['mac']; ?></td>
						<td><?php echo $c['comment']; ?></td>
						<td>
                            <a href="<?php echo site_url('client/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('client/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <tr>
                    <?php $proto = "https"; if($_SERVER['HTTP_PORT'] == 80) $proto = $http;
                    <td colspan="6"><?php echo sprintf("%s://%s/apis/ii1/register/%s", $proto,/*config_item("host")*/ $_SERVER["HTTP_HOST"], $c['token']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
