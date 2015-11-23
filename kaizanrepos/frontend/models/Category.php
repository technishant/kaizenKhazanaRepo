<?php

namespace frontend\models;

use Yii;
use creocoder\behaviors\NestedSet;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['root', 'lft', 'rgt', 'level'], 'integer'],
            //[['lft', 'rgt', 'level'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
            'title' => 'Title',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find() {
        return new CategoryQuery(get_called_class());
    }

    public function behaviors() {
        return [
            [
                'class' => NestedSet::className(),
            ],
        ];
    }

    public static function createQuery() {
        return new CategoryQuery(['modelClass' => get_called_class()]);
    }

}
