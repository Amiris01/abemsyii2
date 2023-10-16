<?php

use yii\db\Migration;

/**
 * Class m231016_063500_add_image_to_student
 */
class m231016_063500_add_image_to_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('student', 'profile_pic', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('student', 'profile_pic');
        echo "m231016_063500_add_image_to_student cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231016_063500_add_image_to_student cannot be reverted.\n";

        return false;
    }
    */
}
