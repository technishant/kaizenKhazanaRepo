<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_level_3".
 *
 * @property integer $id
 * @property integer $level_2_id
 * @property string $name
 * @property string $description
 * @property string $created
 *
 * @property CategoryLevel2 $level2
 */
class CategoryLevel3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_level_3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_2_id', 'name', 'description'], 'required'],
            [['level_2_id'], 'integer'],
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
            'level_2_id' => 'Level 2 ID',
            'name' => 'Name',
            'description' => 'Description',
            'created' => 'Created',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel2()
    {
        return $this->hasOne(CategoryLevel2::className(), ['id' => 'level_2_id']);
    }
}
