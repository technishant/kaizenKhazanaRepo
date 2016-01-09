<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "capitalist".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_description
 * @property string $long_description
 * @property string $profile_photo
 * @property string $last_updated
 */
class Capitalist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'capitalist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['long_description'], 'string'],
            [['last_updated'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['short_description', 'profile_photo'], 'string', 'max' => 255]
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
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'profile_photo' => 'Profile Photo',
            'last_updated' => 'Last Updated',
        ];
    }
}
