<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widgetMenu
 *
 * @author arkananta
 */
class widgetMenu extends CWidget {

    //put your code here
    public function getMenu($menu_id = 0, $index = 0) {
        $data_return = array();
        $data_menu = Yii::app()->db->createCommand()->from('site_menu m')->leftJoin('site_menu_privilege mp', 'm.menu_id = mp.privilege_menu_id')
                        ->where('mp.privilege_admin_group_id=:admin_group_id AND m.menu_par_id=:menu_id AND menu_location=:menu_loc AND menu_is_active=:active', array(':admin_group_id' => Yii::app()->getController()->admin_auth->admin_group_id,
                            ':menu_id' => $menu_id, ':menu_loc' => 'admin', ':active' => '1',))->queryAll();
        if (isset($data_menu)) {
            foreach ($data_menu as $row_menu) {
                $count = dbHelper::getOne('COUNT(menu_id)', 'site_menu', 'menu_par_id = ' . $row_menu['menu_id']);
                if ($count > 0) {
                    if ($row_menu['menu_par_id'] != 0) {
                        $index = $index + 1;
                        $data_return[] = array('label' => $row_menu['menu_title'],
                            'url' => array($row_menu['menu_link']),
                            'itemOptions' => array('class' => 'dropdown-submenu', 'tabindex' => "-1"),
                            'items' => $this->getMenu($row_menu['menu_id'], $index++));
                    } else {
                        $index = $index + 1;
                        $data_return[] = array('label' => $row_menu['menu_title'] . '<span class="caret"></span>',
                            'url' => array($row_menu['menu_link']),
                            'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"),
                            'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown"),
                            'items' => $this->getMenu($row_menu['menu_id'], $index++));
                    }
                } else {
                    $data_return[] = array('label' => $row_menu['menu_title'],
                        'url' => array($row_menu['menu_link']));
                }
            }
        }
        return $data_return;
    }

    public function run() {
        //var_dump(Yii::app()->getController()->admin_auth->admin_group_id);
//        echo '<pre>';
//        print_r($this->getMenu());
//        die();
        $data_item = $this->getMenu();
        array_push($data_item, array('label' => 'logout',
                    'url' => array('/site/logout')));
        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'pull-right nav'),
            'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
            'itemCssClass' => 'item-test',
            'encodeLabel' => false,
            'items' => $data_item,
        ));
    }

}

?>
