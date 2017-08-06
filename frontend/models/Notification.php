<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "notification".
 *
 * @property integer $notification_id
 * @property integer $comment_id
 * @property integer $user_id
 * @property string $notification_time
 *
 * @property Comment $comment
 * @property User $user
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_id', 'user_id', 'notification_time'], 'required'],
            [['comment_id', 'user_id'], 'integer'],
            [['notification_time'], 'safe'],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'comment_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notification_id' => 'Notification ID',
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'notification_time' => 'Notification Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['comment_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
