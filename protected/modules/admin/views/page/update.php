<?php
$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Data Update '.$model->page_title,
);

$this->menu = array();



//action view
array_push($this->menu, array('label' => 'Detail Page', 'url' => array('view', 'id' => $model->page_id)));

//action list
array_push($this->menu, array('label' => 'List of Page', 'url' => array('list')));
?>
<?php $this->beginWidget('zii.widgets.CPortlet', array('title' => 'create group admin ', 'hideOnEmpty' => TRUE)); ?> 
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
<?php $this->endWidget();?>