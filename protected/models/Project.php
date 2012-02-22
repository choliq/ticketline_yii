<?php

class Project extends CActiveRecord {

  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  public function tableName() {
    return '{{project}}';
  }

  public function rules() {
    return array(
      array('name, description', 'required'),
    );
  }

  public function attributeLabels() {
    return array(
      'name' => 'Project name',
    );
  }

}
