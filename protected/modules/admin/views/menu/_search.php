<?php
/* @var $this MenuController */
/* @var $model SiteMenu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_par_id'); ?>
		<?php echo $form->textField($model,'menu_par_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_title'); ?>
		<?php echo $form->textField($model,'menu_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_description'); ?>
		<?php echo $form->textArea($model,'menu_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_link'); ?>
		<?php echo $form->textField($model,'menu_link',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_page_id'); ?>
		<?php echo $form->textField($model,'menu_page_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_order_by'); ?>
		<?php echo $form->textField($model,'menu_order_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_location'); ?>
		<?php echo $form->textField($model,'menu_location',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_is_active'); ?>
		<?php echo $form->textField($model,'menu_is_active',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->