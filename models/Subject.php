<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int|null $teacherid
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 *
 * @property Classsubject[] $classsubjects
 * @property Teacher $teacher
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacherid'], 'integer'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['teacherid'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacherid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teacherid' => 'Guru Pengajar',
            'name' => 'Nama',
            'description' => 'Penerangan',
            'image' => 'Gambar',
        ];
    }

    /**
     * Gets query for [[Classsubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasssubjects()
    {
        return $this->hasMany(Classsubject::class, ['subjectid' => 'id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::class, ['id' => 'teacherid']);
    }
}
