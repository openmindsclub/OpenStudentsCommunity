<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "college".
 *
 * @property integer $id
 * @property string $college_name
 * @property string $college_address
 * @property string $college_website
 *
 * @property Specialty[] $specialties
 * @property Student[] $students
 */
class College extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'college';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['college_name', 'college_address', 'college_website'], 'required'],
            [['college_address'], 'string'],
            [['college_name', 'college_website'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'college_name' => 'College Name',
            'college_address' => 'College Address',
            'college_website' => 'College Website',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialties()
    {
        return $this->hasMany(Specialty::className(), ['college_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['college_id' => 'id']);
    }
}
