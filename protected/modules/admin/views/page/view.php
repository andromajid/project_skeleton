<?php
$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Detail Data '.$model->page_title,
);

$this->menu = array();

//action list
array_push($this->menu, array('label' => 'List of Page', 'url' => array('list')));

//action create
if($this->action_create == 1) {
    array_push($this->menu, array('label' => 'Create Page', 'url' => array('create')));
}

//action update
if($this->action_update == 1) {
    array_push($this->menu, array('label' => 'Update Page', 'url' => array('update', 'id' => $model->page_id)));
}

//action delete
if($this->action_delete == 1) {
    array_push($this->menu, array('label' => 'Delete Page', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->page_id), 'confirm' => 'Are you sure you want to delete this item?')));
}
?>
<div class="flat_area grid_16">
    <h2>Detail Page</h2>
</div>
<div class="box grid_16 round_all">
    <h2 class="box_head grad_colour">Data Detail</h2>
    <a href="#" class="grabber">&nbsp;</a>
    <a href="#" class="toggle">&nbsp;</a>
    <div class="toggle_container">
        <div class="block no_padding">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'page_title',
                    'page_content',
                    'page_is_active',
                ),
                'htmlOptions' => array('class' => 'detail'),
            ));
            ?>
        </div>
    </div>
</div>