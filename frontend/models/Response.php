<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "response".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_comment
 * @property integer $response_content
 * @property string $response_time
 *
 * @property Comment $idComment
 * @property User $idUser
 */
class Response extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'response';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_comment', 'response_content', 'response_time'], 'required'],
            [['id_user', 'id_comment', 'response_content'], 'integer'],
            [['response_time'], 'safe'],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['id_comment' => 'id']],
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
            'id_comment' => 'Id Comment',
            'response_content' => 'Response Content',
            'response_time' => 'Response Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'id_comment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
