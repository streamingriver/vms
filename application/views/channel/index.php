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
                        <th>
                            <?php  if(null !== $this->input->get('sort')  && null!==$this->input->get('type')): ?>
                            <?php  if($this->input->get('sort')==='id'  && $this->input->get('type')==='asc'):  ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=id&type=desc" >ID 
                                <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                            </a>
                            <?php  elseif($this->input->get('sort')==='id'  && $this->input->get('type')==='desc'): ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=id&type=asc" >ID 
                                <i class="fa fa-sort-numeric-desc" aria-hidden="true"></i>
                            </a>
                            <?php  else:?>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=id&type=desc" >ID 
                                <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                            </a>
                            <?php  endif; ?>    
                            <?php else: ?>   
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=id&type=desc" >ID 
                                <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                            </a>
                            <?php endif;?>                            
                        </th>
                        <th>
                            <?php  if(null !== $this->input->get('sort')  && null!==$this->input->get('type')): ?>
                            <?php  if($this->input->get('sort')==='name'  && $this->input->get('type')==='asc'):  ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=name&type=desc" >Name 
                               <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php  elseif($this->input->get('sort')==='name'  && $this->input->get('type')==='desc'): ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=name&type=asc" >Name 
                                <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                            </a>
                            <?php  else: ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=name&type=desc" >Name 
                                <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php  endif; ?>    
                            <?php else: ?>   
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=name&type=desc" >Name 
                                <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php endif;?> 
                        </th>
                        <th>                            

                            <?php  if(null !== $this->input->get('sort')  && null!==$this->input->get('type')): ?>
                            <?php  if($this->input->get('sort')==='url'  && $this->input->get('type')==='asc'):  ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=url&type=desc" >   Stream Url 
                               <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php  elseif($this->input->get('sort')==='url'  && $this->input->get('type')==='desc'): ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=url&type=asc" >   Stream Url 
                                <i class="fa fa-sort-alpha-desc" aria-hidden="true"></i>
                            </a>
                            <?php  else: ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=url&type=desc" >  Stream Url 
                                <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php  endif; ?>    
                            <?php else: ?>   
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?sort=url&type=desc" >  Stream Url 
                                <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                            </a>
                            <?php endif;?> 
                        </th>
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
                            <?php if($c['ffmpeg']): ?>
                            <a href="<?php echo site_url('channel/restart/'.$c['url']); ?>" class="btn btn-success btn-xs"><span class="fa fa-recycle"></span> Restart</a>
                            <?php endif;?>
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
