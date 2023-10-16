<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property int|null $userid
 * @property string|null $name
 * @property int|null $age
 * @property string|null $status
 * @property string|null $parent_name
 * @property string|null $address
 * @property string|null $parent_contact
 *
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'age'], 'integer'],
            [['name', 'status', 'parent_name', 'address', 'parent_contact'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'name' => 'Name',
            'age' => 'Age',
            'status' => 'Status',
            'parent_name' => 'Parent Name',
            'address' => 'Address',
            'parent_contact' => 'Parent Contact',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userid']);
    }
}
