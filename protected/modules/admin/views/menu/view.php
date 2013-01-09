<?php
/* @var $this MenuController */
/* @var $model SiteMenu */

$this->breadcrumbs=array(
	'Site Menus'=>array('index'),
	$model->menu_id,
);

$this->menu=array(
	array('label'=>'List SiteMenu', 'url'=>array('index')),
	array('label'=>'Create SiteMenu', 'url'=>array('create')),
	array('label'=>'Update SiteMenu', 'url'=>array('update', 'id'=>$model->menu_id)),
	array('label'=>'Delete SiteMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->menu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SiteMenu', 'url'=>array('admin')),
);
?>

<h1>View SiteMenu #<?php echo $model->menu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'menu_id',
		'menu_par_id',
		'menu_title',
		'menu_description',
		'menu_link',
		'menu_page_id',
		'menu_order_by',
		'menu_location',
		'menu_is_active',
	),
)); ?>
