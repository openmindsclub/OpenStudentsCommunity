<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property integer $specialty_id
 * @property string $module_name
 *
 * @property Specialty $specialty
 * @property Publication[] $publications
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specialty_id', 'module_name'], 'required'],
            [['specialty_id'], 'integer'],
            [['module_name'], 'string', 'max' => 64],
            [['specialty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['specialty_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'specialty_id' => 'Specialty ID',
            'module_name' => 'Module Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialty()
    {
        return $this->hasOne(Specialty::className(), ['id' => 'specialty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublications()
    {
        return $this->hasMany(Publication::className(), ['id_module' => 'id']);
    }
}
