<?php

class MenuController extends adminController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new SiteMenu;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $all_menu = SiteMenu::model()->getAllMenu();
        $enum_data = dbHelper::getEnumValue('site_menu', 'menu_location');
        if (isset($_POST['SiteMenu'])) {
            $model->attributes = $_POST['SiteMenu'];
            $model->menu_is_active = '1';
            $menu_last_order_by = dbHelper::getOne('menu_order_by', 'site_menu', 'menu_location = \''.$_GET['type'].'\' ORDER BY menu_order_by DESC');
            $model->menu_order_by = $menu_last_order_by + 1;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'data Menu : '.$model->menu_title.' Berhasil ditambah');
                $this->redirect(array('list', 'id' => $_GET['id'], 'type' => $_GET['type']));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'enum_data' => $enum_data,
            'all_menu' => $all_menu,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $all_menu = SiteMenu::model()->getAllMenu();
        $enum_data = dbHelper::getEnumValue('site_menu', 'menu_location');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SiteMenu'])) {
            $model->attributes = $_POST['SiteMenu'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'data berhasil diganti');
                $this->redirect(array('list', 'type' => $model->menu_location, 'id' => $model->menu_par_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'all_menu' => $all_menu,
            'enum_data' => $enum_data,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionList($id = 0, $type = 'admin') {
        $text_message = '';
//        if($_POST['down'] || $_POST['up']) {
//            
//        }
        if (isset($_POST['delete']) || isset($_POST['disable']) || isset($_POST['enable'])) {
            if (is_array($_POST['item'])) {
                foreach ($_POST['item'] as $key => $value) {
                    $menu_title_txt = dbHelper::getOne('menu_title', 'site_menu', 'menu_id = \'' . $value . '\'');
                    if (isset($_POST['delete'])) {
                        $feedback = Yii::app()->db->createCommand()->delete('site_menu', 'menu_id=:menu_id', array(':menu_id' => $value));
                        if ($feedback) {
                            $text_message .= $menu_title_txt . ' berhasil Dihapus<br />';
                        } else {
                            $text_message .= $menu_title_txt . ' Gagal Dihapus<br />';
                        }
                    }
                    if (isset($_POST['disable'])) {
                        $feedback = SiteMenu::model()->updateMenu(array('menu_is_active' => '0'), $value);
                        if ($feedback) {
                            $text_message .= $menu_title_txt . ' berhasil di ubah<br />';
                        } else {
                            $text_message .= $menu_title_txt . ' gagal di ubah<br />';
                        }
                    }
                    if (isset($_POST['enable'])) {
                        $feedback = SiteMenu::model()->updateMenu(array('menu_is_active' => '1'), $value);
                        if ($feedback) {
                            $text_message .= $menu_title_txt . ' berhasil di ubah<br />';
                        } else {
                            $text_message .= $menu_title_txt . ' gagal di ubah<br />';
                        }
                    }
                }
            }
            Yii::app()->user->setFlash('success', $text_message);
            $this->redirect(array('menu/list/'.$id));
        }
        $menu = SiteMenu::model()->getMenu($type, $id);
        $this->render('index', array('menu' => $menu));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SiteMenu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * fungsi buat ambil data dari parent menu-nya
     * @param Int $menu_id ambil dari data menu id nya
     */
    public function actionIndex()
	{
		$this->render('index');
	}

}
