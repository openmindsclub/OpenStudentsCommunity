<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property integer $specialty_id
 * @property integer $domain_id
 * @property string $specialiity_name
 * @property string $specialty_description
 *
 * @property Module[] $modules
 * @property Domain $domain
 */
class Specialty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id', 'specialiity_name'], 'required'],
            [['domain_id'], 'integer'],
            [['specialty_description'], 'string'],
            [['specialiity_name'], 'string', 'max' => 150],
            [['domain_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::className(), 'targetAttribute' => ['domain_id' => 'domain_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'specialty_id' => 'Specialty ID',
            'domain_id' => 'Domain ID',
            'specialiity_name' => 'Specialiity Name',
            'specialty_description' => 'Specialty Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules()
    {
        return $this->hasMany(Module::className(), ['specialty_id' => 'specialty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['domain_id' => 'domain_id']);
    }
}
