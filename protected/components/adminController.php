<?php

/**
 * Description of adminController
 *
 * @author arkananta
 */
class adminController extends Controller {

    public $admin_auth;

    /**
     * authentifikasi di sini
     */
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        Yii::app()->theme = 'abound';
        parent::__construct($id, $module);
        $this->admin_auth = new adminAuth();
        $data_sesi = $this->admin_auth->authAdmin();
        $data_password = $this->admin_auth->checkPassword();
        if ($data_sesi['error'] || $data_password['error']) {
            Yii::app()->user->setFlash('error', isset($data_password['message']) ? $data_password['message'] : $data_sesi['message']);
            $this->redirect(array('/admin/login'));
        }
    }

    public function beforeAction($action) {
        $data_auth = $this->admin_auth->auth_action_cont($this);
//        var_dump($data_auth);
//        die();
        if ($data_auth['error']) {
            Yii::app()->user->setFlash('error', $data_auth['message']);
            $this->redirect(array('/admin/login'));
        }


        return parent::beforeAction($action);
    }

}

?>
