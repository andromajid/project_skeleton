<?php
/* @var $this MenuController */
/* @var $data SiteMenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->menu_id), array('view', 'id'=>$data->menu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_par_id')); ?>:</b>
	<?php echo CHtml::encode($data->menu_par_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_title')); ?>:</b>
	<?php echo CHtml::encode($data->menu_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_description')); ?>:</b>
	<?php echo CHtml::encode($data->menu_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_link')); ?>:</b>
	<?php echo CHtml::encode($data->menu_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_page_id')); ?>:</b>
	<?php echo CHtml::encode($data->menu_page_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_order_by')); ?>:</b>
	<?php echo CHtml::encode($data->menu_order_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_location')); ?>:</b>
	<?php echo CHtml::encode($data->menu_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->menu_is_active); ?>
	<br />

	*/ ?>

</div>