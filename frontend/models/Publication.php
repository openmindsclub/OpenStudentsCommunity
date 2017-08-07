<?php

namespace frontend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "publication".
 *
 * @property integer $publication_id
 * @property integer $user_id
 * @property integer $module_id
 * @property integer $tag_id
 * @property string $publication_name
 * @property string $publication_text_content
 * @property string $publication_directory
 * @property string $publication_creation_time
 * @property integer $publication_place
 * @property string $publication_date
 * @property integer $publication_rate
 *
 * @property Comment[] $comments
 * @property Module $module
 * @property Tag $tag
 * @property User $user
 * @property Report[] $reports
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $domain;
    public $specialty;

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
            [['user_id', 'module_id', 'tag_id', 'publication_name', 'publication_creation_time', 'publication_rate'], 'required'],
            [['user_id', 'module_id', 'tag_id', 'publication_place', 'publication_rate'], 'integer'],
            [['publication_text_content'], 'string'],
            [['publication_creation_time', 'publication_date'], 'safe'],
            [['publication_name'], 'string', 'max' => 255],
            [['domain','specialty'], 'required'],
            ['publication_date', 'checkDate'],
            [['publication_directory'], 'string', 'max' => 256],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'module_id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'tag_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['publication_place'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['publication_place' => 'school_id']],
        ];
    }

    public function checkDate($attribute,$params)
    {
        $today = Date ('Y-m-d');
        if($this->publication_date > $today)
        {
            $this->addError($attribute, 'Invalid date, enter a valid one');
        }
    }



    public function attributeLabels()
    {
        return [
            'publication_id' => 'Publication ID',
            'user_id' => 'User ID',
            'module_id' => 'Module',
            'tag_id' => 'Type of publication',
            'publication_name' => 'Publication Name',
            'publication_text_content' => 'Publication Text Content',
            'publication_directory' => 'Publication Directory',
            'publication_creation_time' => 'Publication Creation Time',
            'publication_place' => 'Publication Place',
            'publication_date' => 'Publication Date',
            'publication_rate' => 'Publication Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['publication_id' => 'publication_id']);
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['school_id' => 'publication_place']);
    }

    public function getModule()
    {
        return $this->hasOne(Module::className(), ['module_id' => 'module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['tag_id' => 'tag_id']);
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
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['publication_id' => 'publication_id']);
    }
}
