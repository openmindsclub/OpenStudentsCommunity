<?php

namespace frontend\models;

use common\models\User;
use backend\models\Module;
use backend\models\Tag;


use Yii;

/**
 * This is the model class for table "publication".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_module
 * @property string $tag_name
 * @property string $publication_name
 * @property string $publication_content
 * @property string $publicaiton_path
 * @property string $publication_time
 * @property string $publication_publisher
 * @property string $publication_date
 * @property string $publication_place
 *
 * @property Comment[] $comments
 * @property Module $idModule
 * @property Tag $tagName
 * @property User $idUser
 * @property Rating[] $ratings
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_module', 'tag_name', 'publication_name', 'publication_content', 'publicaiton_path', 'publication_time', 'publication_place'], 'required'],
            [['id_user', 'id_module'], 'integer'],
            [['publication_content', 'publicaiton_path'], 'string'],
            [['publication_time', 'publication_date'], 'safe'],
            [['tag_name'], 'string', 'max' => 64],
            [['publication_name', 'publication_publisher', 'publication_place'], 'string', 'max' => 256],
            [['id_module'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['id_module' => 'id']],
            [['tag_name'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_name' => 'tag_name']],
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
            'id_module' => 'Id Module',
            'tag_name' => 'Tag Name',
            'publication_name' => 'Publication Name',
            'publication_content' => 'Publication Content',
            'publicaiton_path' => 'Publicaiton Path',
            'publication_time' => 'Publication Time',
            'publication_publisher' => 'Publication Publisher',
            'publication_date' => 'Publication Date',
            'publication_place' => 'Publication Place',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_publication' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'id_module']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagName()
    {
        return $this->hasOne(Tag::className(), ['tag_name' => 'tag_name']);
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
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['id_publication' => 'id']);
    }
}
