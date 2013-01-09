<?php
/* @var $this MenuController */
/* @var $model SiteMenu */

$this->breadcrumbs=array(
	'Site Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SiteMenu', 'url'=>array('index')),
	array('label'=>'Create SiteMenu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-menu-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Site Menus</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'site-menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'menu_id',
		'menu_par_id',
		'menu_title',
		'menu_description',
		'menu_link',
		'menu_page_id',
		/*
		'menu_order_by',
		'menu_location',
		'menu_is_active',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
