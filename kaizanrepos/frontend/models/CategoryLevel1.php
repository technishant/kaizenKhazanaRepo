<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "category_level_1".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created
 *
 * @property CategoryLevel2[] $categoryLevel2s
 */
class CategoryLevel1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_level_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
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
            'name' => 'Name',
            'description' => 'Description',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLevel2s()
    {
        return $this->hasMany(CategoryLevel2::className(), ['level_1_id' => 'id']);
    }
}
