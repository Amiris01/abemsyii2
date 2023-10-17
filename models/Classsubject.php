<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classsubject".
 *
 * @property int|null $classid
 * @property int|null $subjectid
 *
 * @property Classroom $class
 * @property Subject $subject
 */
class Classsubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classsubject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classid', 'subjectid'], 'integer'],
            [['classid'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::class, 'targetAttribute' => ['classid' => 'id']],
            [['subjectid'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subjectid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'classid' => 'Classid',
            'subjectid' => 'Subjectid',
        ];
    }

    /**
     * Gets query for [[Class]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(Classroom::class, ['id' => 'classid']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subjectid']);
    }
}
