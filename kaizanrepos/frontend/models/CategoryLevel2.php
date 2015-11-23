<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_level_2".
 *
 * @property integer $id
 * @property integer $level_1_id
 * @property string $name
 * @property string $description
 * @property string $created
 *
 * @property CategoryLevel1 $level1
 * @property CategoryLevel3[] $categoryLevel3s
 */
class CategoryLevel2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_level_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_1_id', 'name', 'description'], 'required'],
            [['level_1_id'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_1_id' => 'Level 1 ID',
            'name' => 'Name',
            'description' => 'Description',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel1()
    {
        return $this->hasOne(CategoryLevel1::className(), ['id' => 'level_1_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLevel3s()
    {
        return $this->hasMany(CategoryLevel3::className(), ['level_2_id' => 'id']);
    }
}
