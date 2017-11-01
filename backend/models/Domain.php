<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "domain".
 *
 * @property integer $id
 * @property string $domain_name
 *
 * @property Specialty[] $specialties
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
            [['domain_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_name' => 'Domain Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialties()
    {
        return $this->hasMany(Specialty::className(), ['domain_id' => 'id']);
    }
}
