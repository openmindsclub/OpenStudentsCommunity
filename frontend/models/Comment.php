<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "comment".
 *
 * @property integer $comment_id
 * @property integer $user_id
 * @property integer $publication_id
 * @property string $comment_text_content
 * @property string $comment_file_path
 * @property string $comment_creation_time
 * @property integer $comment_rate
 *
 * @property Publication $publication
 * @property User $user
 * @property Notification[] $notifications
 * @property Report[] $reports
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'publication_id', 'comment_text_content', 'comment_creation_time', 'comment_rate'], 'required'],
            [['user_id', 'publication_id', 'comment_rate'], 'integer'],
            [['comment_text_content'], 'string'],
            [['comment_creation_time'], 'safe'],
            [['comment_file_path'], 'string', 'max' => 256],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::className(), 'targetAttribute' => ['publication_id' => 'publication_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_text_content' => 'Comment Text Content',
            'comment_file_path' => 'Comment File Path',
            'comment_creation_time' => 'Comment Creation Time',
            'comment_rate' => 'Comment Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublication()
    {
        return $this->hasOne(Publication::className(), ['publication_id' => 'publication_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['comment_id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['comment_id' => 'comment_id']);
    }
}
