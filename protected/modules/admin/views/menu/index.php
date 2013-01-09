<?php
$this->breadcrumbs = array(
   'Site Menus'=>array('menu/list', 'type' => $_GET['type']),
);
$id = isset($_GET['id'])?$_GET['id']:0;
$this->menu = array(array('label' => 'Create Menu '.$_GET['type'], 'url' => array('menu/create/', 'type' => $_GET['type'], 'id' => $id)));
$no = 1;
?>
<div class="portlet" id="yw8">
    <div class="portlet-decoration">
        <div class="portlet-title">Menu <?php echo $_GET['type']?></div>
    </div>
    <div class="portlet-content">
        <?php
        echo CHtml::form();
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'disable',
            'caption' => 'disable',
            'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin:5px 0px 5px 50px')));
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'delete',
            'caption' => 'delete',
            'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin:5px 0px 5x 5px')));
        $this->widget('zii.widgets.jui.CJuiButton', array(
            'name' => 'enable',
            'caption' => 'enable',
            'htmlOptions' => array('class' => 'btn-success', 'style' => 'margin:5px 0px 5x 5px')));
        ?>
        
        <div cellspacing="0" cellpadding="0" id="yw9" class="grid-view">


            <table class="table table-hover table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th id="yw9_c0"><?php echo CHtml::checkBox('item', false, array('value' => 'on')); ?></th><th id="yw9_c0">#</th><th id="yw9_c0">Order By</th><th id="yw9_c1">Judul</th><th id="yw9_c2">Publish</th><th id="yw9_c3">Submenu</th><th id="yw9_c4">Edit</th></tr>
                </thead>
                <tbody>
                    <?php if (is_array($menu)): ?>
                        <?php foreach ($menu as $row_menu): ?>
                            <tr>
                                <td><?php echo CHtml::checkBox('item[' . $no . ']', false, array('value' => $row_menu['menu_id'])); ?></td>
                                <td><?php echo $no; ?></td>
                                <td><?php
                    if ($no <= 1) {
                        echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/img/arrow_down.png', array('name' => 'down', 'value' => $row_menu['menu_id']));
                    } elseif ($no >= count($menu)) {
                        echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/img/arrow_up.png', array('name' => 'up', 'value' => $row_menu['menu_id']));
                    } else {
                        echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/img/arrow_up.png', array('name' => 'up', 'value' => $row_menu['menu_id'])) . '&nbsp;' .
                        CHtml::imageButton(Yii::app()->theme->baseUrl . '/img/arrow_down.png', array('name' => 'down', 'value' => $row_menu['menu_id']));
                    }
                            ?></td>
                                <td><?php echo $row_menu['menu_title']; ?></td>
                                <?php
                                if ($row_menu['menu_is_active'] == '1') {
                                    $data_class = array('class' => 'badge badge-success', 'text' => '√');
                                } else {
                                    $data_class = array('class' => 'badge badge-important', 'text' => 'x');
                                }
                                $no++;
                                ?>
                                <td style="padding: auto;"><span class="<?php echo $data_class['class']; ?>"><?php echo $data_class['text']; ?></span></td>
                                <td style="padding: auto;"><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/img/group.png', 'submenu', array('height' => '25', 'width' => '25')), $this->createUrl('menu/list', array('type' => $_GET['type'],'id' => $row_menu['menu_id']))); ?></td>
                                <td style="padding: auto;"><?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/img/page_white_edit.png', 'edit', array('height' => '25', 'width' => '25')), $this->createUrl('menu/update', array('id' => $row_menu['menu_id']))); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="keys" style="display:none" title="/project_start/yii-1.1.12.b600af/andro/index.php/site/page?view=tables"><span>1</span><span>2</span><span>3</span></div>
        </div>
        <?php echo CHtml::endForm(); ?></div>
</div>
