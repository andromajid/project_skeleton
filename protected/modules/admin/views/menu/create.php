<?php
/* @var $this MenuController */
/* @var $model SiteMenu */

$this->breadcrumbs=array(
	'Site Menus'=>array('menu/list', 'type' => $_GET['type'], 'id' => $_GET['id']),
	'Create',
);

$this->menu=array(
	array('label'=>'SiteMenu', 'url'=>array('menu/list')),
);
?>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'Create SiteMenu', 'hideOnEmpty' => TRUE)); ?>     

<?php echo $this->renderPartial('_form', array('model'=>$model, 'enum_data' => $enum_data, 'all_menu' => $all_menu)); ?>
<?php $this->endWidget();?>