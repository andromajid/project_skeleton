<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'site-page-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<div class="block">
    <div class="alert alert_grey">
        <img height="24" width="24" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/grey/alert_2.png">
        Fields with <span class="required"><strong>*</strong></span> are required.
    </div>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->labelEx($model, 'page_title'); ?>
    <?php echo $form->textField($model, 'page_title', array('size' => 60, 'maxlength' => 255)); ?>
    <?php //echo $form->error($model, 'page_title'); ?>
    
    <div class="input_group">
        <?php echo $form->labelEx($model, 'page_content'); ?>
        <?php
        $this->widget('application.extensions.ckeditor.CKEditor', array(
            "model" => $model, # Data-Model
            "attribute" => 'page_content',
            "width" => '100%',
            "toolbar" => "Basic",
                )
        );
        ?>
        <?php //echo $form->error($model, 'page_content'); ?>
    </div>

    <button class="button_colour round_all"><img height="24" width="24" alt="Bended Arrow Right" src="<?php echo Yii::app()->params['backendUrl']; ?>/images/icons/small/white/bended_arrow_right.png"><span><?php echo ($model->isNewRecord) ? 'Create' : 'Save'; ?></span></button>

</div>

<?php $this->endWidget(); ?>

<!-- form -->