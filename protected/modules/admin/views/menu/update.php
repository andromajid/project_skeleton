<?php
/* @var $this MenuController */
/* @var $model SiteMenu */

$this->breadcrumbs = array(
    'Site Menus' => array('index'),
    $model->menu_id => array('view', 'id' => $model->menu_id),
    'Update',
);
$this->menu = array(array('label' => 'Create Menu', 'url' => array('menu/create/'.$_GET['id']),
                         array('label' => 'Site Menu', 'url' => array('menu/list'))));
?>

<h1>Update SiteMenu <?php echo $model->menu_id; ?></h1>
<div class="portlet" id="yw8">
    <div class="portlet-decoration">
        <div class="portlet-title">Menu Admin</div>
    </div>
    <div class="portlet-content">
        <?php echo $this->renderPartial('_form', array('model' => $model, 'all_menu' => $all_menu, 'enum_data' => $enum_data)); ?>
    </div>
</div>
