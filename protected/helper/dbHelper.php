<?php
/**
 * Description of dbHelper
 *
 * @author arkananta
 */
class dbHelper {
    /**
     * buat ngambil data enum yang ada di siatu field database
     * @param String $table Nama Table
     * @param String $field Nama fieldnya
     */
    public static function getEnumValue($table , $field) {
        $sql = "SHOW COLUMNS FROM ".$table." LIKE '".$field."'";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        if(is_array($result)) {
            preg_match_all("/'([^']+)'/", $result['Type'], $matches,PREG_PATTERN_ORDER );
            return $matches[1];
        } else {
            return array();
        }
    }
    
    public static function getOne($field_name, $table_name, $where) {
        $result = Yii::app()->db->createCommand("SELECT ".$field_name." FROM ".$table_name." WHERE ".$where.' LIMIT 1')->queryRow();
        if($result) {
            return $result[$field_name];
        } else {
            return false;
        }
    }
}

?>
