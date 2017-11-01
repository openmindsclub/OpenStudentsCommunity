<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property integer $id
 * @property integer $id_user_notified
 * @property integer $id_comment
 *
 * @property Comment $idComment
 * @property User $idUserNotified
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
            [['id_user_notified', 'id_comment'], 'required'],
            [['id_user_notified', 'id_comment'], 'integer'],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['id_comment' => 'id']],
            [['id_user_notified'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_notified' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user_notified' => Yii::t('app', 'Id User Notified'),
            'id_comment' => Yii::t('app', 'Id Comment'),
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
    public function getIdUserNotified()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_notified']);
    }
}
