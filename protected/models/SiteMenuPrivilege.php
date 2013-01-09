<?php

/**
 * This is the model class for table "site_menu_privilege".
 *
 * The followings are the available columns in table 'site_menu_privilege':
 * @property integer $privilege_admin_group_id
 * @property integer $privilege_menu_id
 */
class SiteMenuPrivilege extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SiteMenuPrivilege the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site_menu_privilege';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('privilege_admin_group_id, privilege_menu_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('privilege_admin_group_id, privilege_menu_id', 'safe', 'on' => 'search'),
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
            'privilege_admin_group_id' => 'Privilege Admin Group',
            'privilege_menu_id' => 'Privilege Menu',
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

        $criteria->compare('privilege_admin_group_id', $this->privilege_admin_group_id);
        $criteria->compare('privilege_menu_id', $this->privilege_menu_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    /**
     * ambil data secara rekursif
     * @param Int $user_id 
     */
    public function getUserMenuPrivilage($group_id) {
        return Yii::app()->db->createCommand()->from('site_menu_privilege')->where('privilege_admin_group_id = :group_id', array(':group_id' => $group_id))
               ->queryAll();
    }
}