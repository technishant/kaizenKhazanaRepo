<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "enquiry".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $type
 * @property string $description
 */
class Enquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'type'], 'required'],
            [['category_id', 'type'], 'integer'],
            [['description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'type' => 'Type',
            'description' => 'Description',
        ];
    }

    /**
     * @inheritdoc
     * @return EnquiryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnquiryQuery(get_called_class());
    }
}
