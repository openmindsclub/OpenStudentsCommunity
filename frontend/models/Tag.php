<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $tag_id
 * @property string $tag_name
 * @property string $tag_description
 *
 * @property Publication[] $publications
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_description'], 'string'],
            [['tag_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'tag_name' => 'Tag Name',
            'tag_description' => 'Tag Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublications()
    {
        return $this->hasMany(Publication::className(), ['tag_id' => 'tag_id']);
    }
}
