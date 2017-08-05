<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "report".
 *
 * @property integer $report_id
 * @property integer $user_id
 * @property integer $publication_id
 * @property integer $comment_id
 * @property integer $reportedUser_id
 * @property string $report_content
 * @property string $report_time
 *
 * @property Comment $comment
 * @property Publication $publication
 * @property User $user
 * @property User $reportedUser
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'report_content', 'report_time'], 'required'],
            [['user_id', 'publication_id', 'comment_id', 'reportedUser_id'], 'integer'],
            [['report_content'], 'string'],
            [['report_time'], 'safe'],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'comment_id']],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::className(), 'targetAttribute' => ['publication_id' => 'publication_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['reportedUser_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['reportedUser_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => 'Report ID',
            'user_id' => 'User ID',
            'publication_id' => 'Publication ID',
            'comment_id' => 'Comment ID',
            'reportedUser_id' => 'Reported User ID',
            'report_content' => 'Report Content',
            'report_time' => 'Report Time',
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
    public function getReportedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'reportedUser_id']);
    }
}
