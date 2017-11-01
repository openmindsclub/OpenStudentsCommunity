<?php

namespace frontend\models;
use backend\models\College;
use common\models\User;
use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $college_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_date
 *
 * @property College $college
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
            [['user_id', 'first_name', 'last_name', 'birth_date'], 'required'],
            [['user_id', 'college_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 64],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['college_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'college_id' => 'College ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
