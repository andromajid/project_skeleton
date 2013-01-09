<?php
$this->breadcrumbs = array(
    'Content',
    'Page' => array('list'),
    'Index',
);
$this->menu = array();

//action create
if(isset($this->action_create)) {
    array_push($this->menu, array('label' => 'Create Page', 'url' => array('create')));
}

//action list
array_push($this->menu, array('label' => 'List of Page', 'url' => array('list')));
?>

<div class="flat_area grid_16">
    <h2>Index of Page</h2>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'pager' => array(
        'header' => '',
        'firstPageLabel' => 'First',
        'prevPageLabel' => 'Previous',
        'nextPageLabel' => 'Next',
        'lastPageLabel' => 'Last',
    ),
));
?>