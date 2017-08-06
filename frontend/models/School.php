<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $school_id
 * @property string $school_name
 * @property string $school_address
 *
 * @property Student[] $students
 * @property Teacher[] $teachers
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_name', 'school_address'], 'required'],
            [['school_name', 'school_address'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'school_id' => 'School ID',
            'school_name' => 'School Name',
            'school_address' => 'School Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['school_id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['school_id' => 'school_id']);
    }
}
