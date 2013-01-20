<?php

class PageController extends adminController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new site_page;
        $menu = new site_menu;
        $menu->menu_title = $_POST['site_page']['page_title'];
        $menu->menu_description = "Page Generator - " . $_POST['site_page']['page_title'];
        $menu->menu_link = "page";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['site_page'])) {
            $model->attributes = $_POST['site_page'];
            if ($model->save())
                $page_id = $model->page_id;
            $order_by = Yii::app()->db->createCommand()
                    ->select('menu_order_by')
                    ->from('site_menu')
                    ->order('menu_order_by DESC')
                    ->queryScalar();

            $menu->menu_order_by = $orderby + 1;
            $menu->menu_title = $_POST['site_page']['page_title'];
            $menu->menu_description = "Page Generator - " . $_POST['site_page']['page_title'];
            $menu->menu_link = "page/" . $page_id;
            $menu->menu_is_active = 1;
            $menu->menu_location = 'user';

            $menu->save();
            $this->redirect(array('list'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['site_page'])) {
            $model->attributes = $_POST['site_page'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Halaman ' . $model->page_title . ' berhasil di ubah');
                $this->redirect(array('update', 'id' => $model->page_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('site_page');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionList() {
        $model = new site_page('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['site_page']))
            $model->attributes = $_GET['site_page'];

        $this->render('list', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = site_page::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'site-page-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUpload() {
        //echo stripcslashes(json_encode($_FILES));
        $extension_mime = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif');
        $file_type = strtolower($_FILES['file']['type']);
        if (in_array($file_type, $extension_mime)) {
            $uploadedFile = CUploadedFile::getInstanceByName('file');
            if($uploadedFile->saveAs(Yii::app()->basePath.'/images/'.$uploadedFile->getName())) {
                echo stripslashes(json_encode(array('filelink' => Yii::app()->baseUrl.'/images/'.$uploadedFile->getName())));
            }
        }
    }

    public function actionGetjson() {
        
    }

}
