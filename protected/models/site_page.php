<?php

/**
 * This is the model class for table "site_page".
 *
 * The followings are the available columns in table 'site_page':
 * @property string $page_id
 * @property string $page_par_id
 * @property string $page_key
 * @property string $page_title
 * @property string $page_content
 * @property string $page_location
 * @property string $page_is_active
 */
class site_page extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return site_page the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site_page';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
            array('page_par_id', 'length', 'max' => 10),
            array('page_key, page_title', 'length', 'max' => 100),
            array('page_location', 'length', 'max' => 8),
            array('page_is_active', 'length', 'max' => 1),
            array('page_content', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('page_id, page_par_id, page_key, page_title, page_content, page_location, page_is_active', 'safe', 'on' => 'search'),
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
            'page_id' => 'Page',
            'page_par_id' => 'Page Parent',
            'page_key' => 'Page Key',
            'page_title' => 'Page Title',
            'page_content' => 'Page Content',
            'page_location' => 'Page Location',
            'page_is_active' => 'Is Active',
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

        $criteria->compare('page_id', $this->page_id, true);
        $criteria->compare('page_par_id', $this->page_par_id, true);
        $criteria->compare('page_key', $this->page_key, true);
        $criteria->compare('page_title', $this->page_title, true);
        $criteria->compare('page_content', $this->page_content, true);
        $criteria->compare('page_location', $this->page_location, true);
        $criteria->compare('page_is_active', $this->page_is_active, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}