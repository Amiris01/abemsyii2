<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%classsubject}}`.
 */
class m231017_033911_create_classsubject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey(),
            'teacherid' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->string(),
            'image' => $this->string(),
        ]);
        $this->addForeignKey('FK_teacher_subject','subject','teacherid','teacher','id');

        $this->createTable('{{%classsubject}}', [
            'id' => $this->primaryKey(),
            'classid' => $this->integer(),
            'subjectid' => $this->integer(),
        ]);

        $this->addForeignKey('FK_class_classsubject','classsubject','classid','classroom','id');
        $this->addForeignKey('FK_subject_classsubject','classsubject','subjectid','subject','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%classsubject}}');
    }
}
