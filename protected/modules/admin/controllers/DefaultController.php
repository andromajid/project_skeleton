<?php

class DefaultController extends adminController {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionLogin() {
        Yii::app()->theme = 'abound';
        $this->layout = '//layouts/admin_login';
        $model = new LoginForm;

//		// if it is ajax validation request
//		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('admin_login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        $admin = new adminAuth;
        $admin->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}