<?php

/**
 * This is the model class for table "site_menu".
 *
 * The followings are the available columns in table 'site_menu':
 * @property integer $menu_id
 * @property integer $menu_par_id
 * @property string $menu_title
 * @property string $menu_description
 * @property string $menu_link
 * @property integer $menu_page_id
 * @property integer $menu_order_by
 * @property string $menu_location
 * @property string $menu_is_active
 */
class SiteMenu extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SiteMenu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site_menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_location', 'required'),
            array('menu_par_id, menu_page_id, menu_order_by', 'numerical', 'integerOnly' => true),
            array('menu_title, menu_link', 'length', 'max' => 255),
            array('menu_location', 'length', 'max' => 8),
            array('menu_is_active', 'length', 'max' => 1),
            array('menu_description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('menu_id, menu_par_id, menu_title, menu_description, menu_link, menu_page_id, menu_order_by, menu_location, menu_is_active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'menu_id' => 'Menu',
            'menu_par_id' => 'Menu Par',
            'menu_title' => 'Menu Title',
            'menu_description' => 'Menu Description',
            'menu_link' => 'Menu Link',
            'menu_page_id' => 'Menu Page',
            'menu_order_by' => 'Menu Order By',
            'menu_location' => 'Menu Location',
            'menu_is_active' => 'Menu Is Active',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('menu_par_id', $this->menu_par_id);
        $criteria->compare('menu_title', $this->menu_title, true);
        $criteria->compare('menu_description', $this->menu_description, true);
        $criteria->compare('menu_link', $this->menu_link, true);
        $criteria->compare('menu_page_id', $this->menu_page_id);
        $criteria->compare('menu_order_by', $this->menu_order_by);
        $criteria->compare('menu_location', 'admin', true);
        $criteria->compare('menu_is_active', $this->menu_is_active, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Buat Ambil Menu Paling atas sendiri
     */
    public function getMenu($type = 'admin', $menu_par_id = '0') {
        $result = Yii::app()->db->createCommand()->select('*')->from('site_menu')->
                        where('menu_location=:menu AND menu_par_id=:par_id', array(':menu' => $type, ':par_id' => $menu_par_id))->queryAll();
        return $result;
    }

    /**
     * fungsi buat ambil semua menu
     */
    public function getAllMenu($type = 'admin') {
        $result = Yii::app()->db->createCommand()->select('*')->from('site_menu')->
                        where('menu_location=:menu', array(':menu' => $type))->queryAll();
        return $result;
    }

    /**
     * @param array $data data field2 yang akan di rubah
     * @param int $menu_id menu_idnya
     */
    public function updateMenu($data, $menu_id) {
        return Yii::app()->db->createCommand()->update('site_menu', $data, 'menu_id = ' . $menu_id);
    }

    /**
     * fungsi buat ambil menu secara rekursif
     */
    public function getMenuRecursive($menu_id = 0, $data_previlage = array()) {
        $result = Yii::app()->db->createCommand()->select()->from('site_menu')->where('menu_par_id=:menu_id AND menu_location=:menu_location', array(':menu_id' => $menu_id, ':menu_location' => 'admin'))->queryAll();
        $bool = in_array('23', $data_previlage);
//        var_dump($bool);
//        print_r($data_previlage);
//        die();
        $arr = array();
        foreach ($result as $row) {
            $arr[] = array('title' => $row['menu_title'],
                           'id' => $row['menu_id'],
                'select' => in_array($row['menu_id'], $data_previlage) ? true : false,
                'children' => $this->getMenuRecursive($row['menu_id'], $data_previlage));
        }
        return $arr;
    }

}
