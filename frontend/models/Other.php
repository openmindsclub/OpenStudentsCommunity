<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "other".
 *
 * @property integer $other_id
 * @property integer $user_id
 * @property string $other_first_name
 * @property string $other_last_name
 * @property string $other_birth_date
 * @property string $other_activity
 *
 * @property User $user
 */
class Other extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'other';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'other_first_name', 'other_last_name', 'other_birth_date', 'other_activity'], 'required'],
            [['user_id'], 'integer'],
            [['other_birth_date'], 'safe'],
            [['other_activity'], 'string'],
            [['other_first_name', 'other_last_name'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'other_id' => 'Other ID',
            'user_id' => 'User ID',
            'other_first_name' => 'Other First Name',
            'other_last_name' => 'Other Last Name',
            'other_birth_date' => 'Other Birth Date',
            'other_activity' => 'Other Activity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
