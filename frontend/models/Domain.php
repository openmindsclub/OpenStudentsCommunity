<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "domain".
 *
 * @property integer $domain_id
 * @property string $domain_name
 *
 * @property Specialty[] $specialties
 * @property Teacher[] $teachers
 */
class Domain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_name'], 'required'],
            [['domain_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'domain_id' => 'Domain ID',
            'domain_name' => 'Domain Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialties()
    {
        return $this->hasMany(Specialty::className(), ['domain_id' => 'domain_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['domain_id' => 'domain_id']);
    }
}
