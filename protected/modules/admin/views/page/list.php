<?php
$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'List',
);

$this->menu = array();

//action create
array_push($this->menu, array('label' => 'Create Page', 'url' => array('create')));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-page-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="portlet" id="yw8">
    <div class="portlet-decoration">
        <div class="portlet-title">Page List</div>
    </div>
    <div class="portlet-content">
        <!-- search-form -->
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'site-support-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                array(
                    'header' => 'No.',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
                    'htmlOptions' => array('style' => 'text-align:center;'),
                ),
                array(
                    'name' => 'page_title',
                    'value' => '$data->page_title',
                ),
                array(
                    'name' => 'page_is_active',
                    'type' => 'raw',
                    'value' => '($data->page_is_active == 1 ? CHtml::tag("span", array("class" => "badge badge-success"), "√") :CHtml::tag("span", array("class" => "badge badge-important"), "x"))',
                    'filter' => CHtml::activeDropDownList($model, 'page_is_active', array('' => '', '1' => 'Active', '0' => 'InActive')),
                    'htmlOptions' => array('style' => 'text-align:center;'),
                ),
                array(
                    'header' => 'Action',
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                ),
            ),
        ));
        ?>
    </div>
</div>