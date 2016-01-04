<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fairDetails".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $attachment
 * @property string $last_updated
 */
class FairDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $attachmentfile;
    public static function tableName()
    {
        return 'fairDetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'attachment'], 'required'],
            [['description'], 'string'],
            [['attachmentfile'], 'file','skipOnEmpty'=>FALSE, 'extensions' => 'mp4,3gp,mov,m4v', 'mimeTypes' => 'video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp','on'=>  'create'],      
            [['attachmentfile'], 'file','skipOnEmpty'=>TRUE, 'extensions' => 'mp4,3gp,mov,m4v', 'mimeTypes' => 'video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp','on'=>  'update'],
            [['last_updated','attachment'], 'safe'],
            [['title','attachment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'attachment' => Yii::t('app', 'Attachment'),
            'last_updated' => Yii::t('app', 'Last Updated'),
        ];
    }

    /**
     * @inheritdoc
     * @return FairDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FairDetailsQuery(get_called_class());
    }
}
