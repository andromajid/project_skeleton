<?php
$menu_arr = CHtml::listData($all_menu, 'menu_id', 'menu_title');
$menu_arr[0] = 'root';
foreach ($enum_data as $row_enum) {
    $drop_down[$row_enum] = $row_enum;
}
?>
 

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'site-menu-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php
    if (!$model->isNewRecord):
        ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'menu_par_id'); ?>
            <?php
            if ($model->isNewRecord) {
                echo $form->hiddenField($model, 'menu_par_id', array('value' => $_GET['id']));
            } else {
                echo $form->dropDownList($model, 'menu_par_id', $menu_arr);
            }
            ?>
            <?php echo $form->error($model, 'menu_par_id'); ?>
        </div>
    <?php else: ?>
        <?php echo $form->hiddenField($model, 'menu_par_id', array('value' => $_GET['id'])); ?>
    <?php endif; ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'menu_title'); ?>
        <?php echo $form->textField($model, 'menu_title', array('size' => 60, 'maxlength' => 255, 'class' => 'span5')); ?>
        <?php echo $form->error($model, 'menu_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'menu_description'); ?>
        <?php echo $form->textArea($model, 'menu_description', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>
        <?php echo $form->error($model, 'menu_description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'menu_link'); ?>
        <?php echo $form->textField($model, 'menu_link', array('size' => 60, 'maxlength' => 255, 'class' => 'span5')); ?>
        <?php echo $form->error($model, 'menu_link'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'menu_location'); ?>
        <?php echo $form->dropDownList($model, 'menu_location', $drop_down); ?>
        <?php echo $form->error($model, 'menu_location'); ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'submit',
            'caption' => $model->isNewRecord ? 'Create' : 'Save',
            'htmlOptions' => array('class' => 'btn-primary')));
        // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
        ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->