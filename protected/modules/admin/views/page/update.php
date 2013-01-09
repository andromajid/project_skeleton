<?php
$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Data Update '.$model->page_title,
);

$this->menu = array();

//action create
if($this->action_create == 1) {
    array_push($this->menu, array('label' => 'Create Page', 'url' => array('create')));
}

//action view
array_push($this->menu, array('label' => 'Detail Page', 'url' => array('view', 'id' => $model->page_id)));

//action list
array_push($this->menu, array('label' => 'List of Page', 'url' => array('list')));
?>
<div class="flat_area grid_16">
    <h2>Update Page</h2>
</div>
<div class="box grid_16 round_all">
    <h2 class="box_head grad_colour">&nbsp;</h2>
    <a href="#" class="grabber">&nbsp;</a>
    <a href="#" class="toggle">&nbsp;</a>
    <div class="toggle_container">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>