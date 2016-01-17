<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entrepreneur".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $attachmenttype
 * @property string $attachment
 * @property string $last_updated
 */
class Entrepreneur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $attachmentfile;
    public static function tableName()
    {
        return 'entrepreneur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description','attachmenttype'], 'required'],
            [['description'], 'string'],
            [['attachmentfile'], 'file','skipOnEmpty'=>FALSE, 
                'extensions' => 'jpg,jpeg,png', 
                'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png',
                'on'=>  'create',
                'when' => function($model) {
                $model->attachmenttype == 'image';
            }, 'whenClient' => "function (attribute, value) {
                return $('#attachment-type-dropdown').val() == 'image';
                }"
            ],
            [['attachmentfile'], 'file','skipOnEmpty'=>FALSE, 
                'extensions' => 'mp4,3gp,mov,m4v', 
                'mimeTypes' => 'video/mpeg,video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp',
                'on'=>  'create',
                'when' => function($model) {
                $model->attachmenttype == 'video';
            },'whenClient' => "function (attribute, value) {
                return $('#attachment-type-dropdown').val() == 'video';
            }"
            ], 
            [['attachmentfile'], 'file','skipOnEmpty'=>TRUE, 
                'extensions' => 'jpg,jpeg,png', 
                'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png',
                'on'=>  'update',
                'when' => function($model) {
                $model->attachmenttype == 'image';
            }, 'whenClient' => "function (attribute, value) {
                return $('#attachment-type-dropdown').val() == 'image';
                }"
            ],
            [['attachmentfile'], 'file','skipOnEmpty'=>TRUE, 
                'extensions' => 'mp4,3gp,mov,m4v', 
                'mimeTypes' => 'video/mpeg,video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp',
                'on'=>  'update',
                'when' => function($model) {
                $model->attachmenttype == 'video';
            },'whenClient' => "function (attribute, value) {
                return $('#attachment-type-dropdown').val() == 'video';
            }"
            ], 
            [['last_updated'], 'safe'],
            [['title','attachment','attachmenttype'], 'string', 'max' => 255]
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
            'attachmenttpe' => Yii::t('app', 'Attachmenttpe'),
            'attachment' => Yii::t('app', 'Attachment'),
            'last_updated' => Yii::t('app', 'Last Updated'),
        ];
    }
}
