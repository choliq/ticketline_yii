<?php

class m120222_185409_create_project extends CDbMigration {

  public function up() {
    $this->createTable('tbl_project', array(
      'id' => 'pk',
      'name' => 'string NOT NULL',
      'description' => 'text NOT NULL',
    ));
  }

  public function down() {
    $this->dropTable('tbl_project');
  }

}
