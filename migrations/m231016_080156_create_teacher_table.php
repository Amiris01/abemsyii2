<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher}}`.
 */
class m231016_080156_create_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer(),
            'name' => $this->string(),
            'status' => $this->string(),
            'email' => $this->string(),
            'contact_num' => $this->string(),
        ]);
        
        $this->addColumn('teacher', 'profile_pic', $this->string()->defaultValue(null));
        $this->addForeignKey('FK_user_teacher','teacher','userid','user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher}}');
    }
}
