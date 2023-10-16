<?php

namespace app\models;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'status', 'role'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'role', 'authKey', 'accessToken'], 'safe'],
            [['username', 'password', 'authKey', 'accessToken', 'role'], 'string', 'max' => 255],
            [['username'], 'unique'],
            ['status','default','value' => self::STATUS_ACTIVE],
            ['status','in','range' => [self::STATUS_ACTIVE, self::STATUS_DELETE]],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = self::find()->where(['accessToken' => $token])->all();
        foreach ($users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getStudents()
    {
        return $this->hasMany(Student::class, ['userid' => 'id']);
    }

    

}
