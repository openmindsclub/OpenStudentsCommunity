<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_publication
 * @property integer $rating_value
 *
 * @property Publication $idPublication
 * @property User $idUser
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_publication', 'rating_value'], 'required'],
            [['id_user', 'id_publication', 'rating_value'], 'integer'],
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
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_publication' => Yii::t('app', 'Id Publication'),
            'rating_value' => Yii::t('app', 'Rating Value'),
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
}
