<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "specialty".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property integer $college_id
 * @property string $specialty_name
 *
 * @property Module[] $modules
 * @property College $college
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
            [['domain_id', 'specialty_name'], 'required'],
            [['domain_id', 'college_id'], 'integer'],
            [['specialty_name'], 'string', 'max' => 64],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['college_id' => 'id']],
            [['domain_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domain::className(), 'targetAttribute' => ['domain_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'college_id' => 'College ID',
            'specialty_name' => 'Specialty Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules()
    {
        return $this->hasMany(Module::className(), ['specialty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'college_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }
}
