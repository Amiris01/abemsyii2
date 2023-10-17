<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property int $id
 * @property int|null $agerequirement
 * @property string|null $name
 *
 * @property Classsubject[] $classsubjects
 * @property Student[] $students
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agerequirement'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agerequirement' => 'Umur Kelayakan',
            'name' => 'Nama Kelas',
        ];
    }

    /**
     * Gets query for [[Classsubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasssubjects()
    {
        return $this->hasMany(Classsubject::class, ['classid' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::class, ['classid' => 'id']);
    }
}
