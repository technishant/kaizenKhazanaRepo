<?php

namespace frontend\models;

use Yii;
use creocoder\nestedsets\NestedSetsBehavior;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
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
            [['tree', 'lft', 'rgt', 'depth'], 'integer'],
            //[['lft', 'rgt', 'depth', 'name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'tree' => 'Tree',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'name' => 'Name',
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
            'tree' => [
                'class' => NestedSetsBehavior::className(),
            'treeAttribute' => 'tree',
            // 'leftAttribute' => 'lft',
            // 'rightAttribute' => 'rgt',
            // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find() {
        return new MenuQuery(get_called_class());
    }
    
}
