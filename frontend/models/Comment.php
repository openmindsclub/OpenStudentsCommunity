<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_publication
 * @property string $comment_content
 *
 * @property Publication $idPublication
 * @property User $idUser
 * @property Notification[] $notifications
 * @property Response[] $responses
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
            [['id_user', 'id_publication', 'comment_content'], 'required'],
            [['id_user', 'id_publication'], 'integer'],
            [['comment_content'], 'string'],
            [['id_publication'], 'exist', 'skipOnError' => true, 'targetClass' => Publication::className(), 'targetAttribute' => ['id_publication' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_publication' => 'Id Publication',
            'comment_content' => 'Comment Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPublication()
    {
        return $this->hasOne(Publication::className(), ['id' => 'id_publication']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['id_comment' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponses()
    {
        return $this->hasMany(Response::className(), ['id_comment' => 'id']);
    }
}
