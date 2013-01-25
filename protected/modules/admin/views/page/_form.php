<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'site-page-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<div class="block">
    <div class="alert alert_grey">
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
        $this->widget('ext.redactor.ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'elfinder' => TRUE,
            'attribute' => 'page_content',
            'options' => array('imageUpload' => $this->createUrl('upload')),
                // or just for input field
//    'name' => 'my_input_name',
//
//    // some options, see http://imperavi.com/redactor/docs/
//    'options' => array(
//        'lang' => 'ru',
//        'toolbar' => false,
//        'iframe' => true,
//        'css' => 'wym.css',
//    ),
        ));
//        $this->widget('application.extensions.ckeditor.CKEditor', array(
//            "model" => $model, # Data-Model
//            "attribute" => 'page_content',
//            "width" => '100%',
//            "toolbar" => "Basic",
//                )
//        );
        ?>
        <?php //echo $form->error($model, 'page_content'); ?>
    </div>
    <?php
    $this->widget('zii.widgets.jui.CJuiButton', array(
        'name' => 'disable',
        'caption' => ($model->isNewRecord) ? 'Create' : 'Save',
        'htmlOptions' => array('class' => 'btn-primary')));
    ?>

</div>

<?php $this->endWidget(); ?>

<!-- form -->