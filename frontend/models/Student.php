<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property integer $user_id
 * @property integer $school_id
 * @property string $student_fisrt_name
 * @property string $student_last_name
 * @property string $student_birth_date
 *
 * @property School $school
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id', 'student_fisrt_name', 'student_last_name', 'student_birth_date'], 'required'],
            [['user_id', 'school_id'], 'integer'],
            [['student_birth_date'], 'safe'],
            ['student_birth_date','checkDate'],
            [['student_fisrt_name', 'student_last_name'], 'string', 'max' => 100],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'school_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    
     public function checkDate($attribute,$params)
    {
        $today = Date ('Y-m-d');
        if($this->student_birth_date > $today)
        {
            $this->addError($attribute, 'Invalid date, enter a valid one');
        }
    }

    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'user_id' => 'User ID',
            'school_id' => 'School name',
            'student_fisrt_name' => 'Student Fisrt Name',
            'student_last_name' => 'Student Last Name',
            'student_birth_date' => 'Student Birth Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['school_id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
