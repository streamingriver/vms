<?php 
$config['pagination']['page_query_string'] = TRUE;
$config['pagination']['uri_segment'] = 3;
                
$config['pagination']['per_page'] = RECORDS_PER_PAGE;

$config['pagination']['prev_link'] = '‹';
$config['pagination']['next_link'] = '›';
$config['pagination']['full_tag_open'] = '<ul class="pagination">';
$config['pagination']['next_tag_open'] = '<li>';
$config['pagination']['next_tag_close'] = '</li>';
$config['pagination']['prev_tag_open'] = '<li>';
$config['pagination']['prev_tag_close'] = '</li>';
$config['pagination']['num_tag_open'] = '<li>';
$config['pagination']['num_tag_close'] = '</li>';
$config['pagination']['cur_tag_open'] = '<li class="active"><a href="">';
$config['pagination']['cur_tag_close'] = '</a></li>';
$config['pagination']['full_tag_close'] = '</ul>';
$config['pagination']['first_link'] = '‹‹';
$config['pagination']['first_tag_open'] = '<li>';
$config['pagination']['first_tag_close'] = '</li>';
$config['pagination']['last_link'] = '››';
$config['pagination']['last_tag_open'] = '<li>';
$config['pagination']['last_tag_close'] = '</li>';
?>