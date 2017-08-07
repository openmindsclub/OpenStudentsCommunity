<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $teacher_id
 * @property integer $user_id
 * @property integer $school_id
 * @property integer $domain_id
 * @property string $teacher_first_name
 * @property string $teacher_last_name
 * @property string $teacher_birth_date
 *
 * @property Domain $domain
 * @property School $school
 * @property User $user
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id', 'domain_id', 'teacher_first_name', 'teacher_last_name', 'teacher_birth_date'], 'required'],
            [['user_id', 'school_id', 'domain_id'], 'integer'],
            [['teacher_birth_date'], 'safe'],
            ['teacher_birth_date', 'checkDate'],
            [['teacher_first_name', 'teacher_last_name'], 'string', 'max' => 100],
            [['domain_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::className(), 'targetAttribute' => ['domain_id' => 'domain_id']],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'school_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function checkDate($attribute,$params)
    {
        $today = Date ('Y-m-d');
        if($this->teacher_birth_date > $today)
        {
            $this->addError($attribute, 'Invalid date, enter a valid one');
        }
    }


    public function attributeLabels()
    {
        return [
            'teacher_id' => 'Teacher ID',
            'user_id' => 'User ID',
            'school_id' => 'School',
            'domain_id' => 'Domain',
            'teacher_first_name' => 'Teacher First Name',
            'teacher_last_name' => 'Teacher Last Name',
            'teacher_birth_date' => 'Teacher Birth Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['domain_id' => 'domain_id']);
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
