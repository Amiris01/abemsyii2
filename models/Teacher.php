<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property int|null $userid
 * @property string|null $name
 * @property string|null $status
 * @property string|null $email
 * @property string|null $contact_num
 * @property string|null $profile_pic
 * @property string|null $created_at
 *
 * @property User $user
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'status', 'email', 'contact_num', 'profile_pic'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'email' => 'Email',
            'contact_num' => 'Contact Num',
            'profile_pic' => 'Profile Pic',
            'created_at' => 'Created At',
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
