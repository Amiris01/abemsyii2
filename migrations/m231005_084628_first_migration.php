<?php

use yii\db\Migration;

/**
 * Class m231005_084628_first_migration
 */
class m231005_084628_first_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
            'status' => $this->integer(),
            'role' => $this->string(),
        ]);

        $this->createTable('student',[
            'id' => $this->primaryKey(),
            'userid' => $this->integer(),
            'name' => $this->string(),
            'age' => $this->integer(),
            'status' => $this->string(),
            'parent_name' => $this->string(),
            'address' => $this->string(),
            'parent_contact' => $this->string(),
        ]);

        $this->addForeignKey('FK_user_student','student','userid','user','id');
        $this->addColumn('user', 'created_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231005_084628_first_migration cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231005_084628_first_migration cannot be reverted.\n";

        return false;
    }
    */
}
