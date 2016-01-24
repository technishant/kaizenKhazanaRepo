<?php

namespace frontend\models;

use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "kaizen".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $subject
 * @property string $description
 * @property string $processarea
 * @property integer $category
 * @property string $company
 * @property string $currrentstage
 * @property string $mode
 * @property string $tangiblebenifits
 * @property string $intengiblebenifits
 * @property double $costsaving
 * @property string $implementationdate
 * @property integer $postedby
 * @property string $posteddate
 * @property string $suggestedby
 * @property string $approvedby
 * @property integer $recordstatus
 * @property string $attachmentother
 * @property string $implemented_by
 * @property string $problem_observed
 * @property string $action_taken
 * @property string $tags
 * @property User $postedby0
 * @property Category $category0
 * @property Kzattachments[] $kzattachments
 */
class Kaizen extends \yii\db\ActiveRecord {

    public $categoryLevel3;
    public $categoryLevel2;
    public $kzfilebefore;
    public $kzfileafter;
    public $otherAttachmentFile;

    const TYPE_VIDEO = 2;
    const TYPE_PHOTO = 1;
    const TYPE_KAIZEN = 0;
    const TYPE_BOOK = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'kaizen';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'type', 'problem_observed','action_taken', 'processarea', 'attachmenttype', 'category', 'tangiblebenifits', 'intengiblebenifits'], 'required', 'when' => function ($model, $attribute) {
            $model->type == 0;
        }, 'whenClient' => "function(attribute, value) {return $('#kaizen-type-dropdown').val() == 0; }"],
            [['name', 'type', 'subject', 'category'], 'required', 'when' => function ($model) {
            return $model->type > 0;
        }, 'whenClient' => "function(attribute, value) {return $('#kaizen-type-dropdown').val() != 0; }"],
            [['name', 'subject', 'description', 'processarea', 'mode', 'tangiblebenifits', 'intengiblebenifits', 'attachmenttype', 'attachmentbefore', 'attachmentafter', 'problem_observed', 'action_taken'], 'string'],
            [['category', 'type', 'postedby', 'recordstatus'], 'integer'],
            [['costsaving', 'attachmentprocessed'], 'number'],
            [['kzfilebefore', 'kzfileafter'], 'file', 'extensions' => 'jpg,jpeg,png,mp4,3gp,mov,m4v,pdf', 'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png,video/mpeg,video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp,application/pdf', 'when' => function($model, $attribute) {
            $model->type == 0;
        }],
            //[['otherAttachmentFile'], 'file', 'extensions' => 'jpg,jpeg,png', 'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png', 'when' => function($model, $attribute) {$model->type == 1;}],
            [['implementationdate', 'mode', 'approvedby', 'attachmentprocessed', 'attachmentbefore', 'attachmentafter'], 'safe'],
            [['company', 'currrentstage', 'suggestedby', 'approvedby', 'attachmentother', 'implemented_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => 'Type',
            'subject' => Yii::t('app', 'Subject'),
            'processarea' => Yii::t('app', 'Area'),
            'category' => Yii::t('app', 'Category'),
            'company' => Yii::t('app', 'Company'),
            'currrentstage' => Yii::t('app', 'Currrent Stage'),
            'mode' => Yii::t('app', 'Mode'),
            'tangiblebenifits' => Yii::t('app', 'Tangible Benifits'),
            'intengiblebenifits' => Yii::t('app', 'Intengible Benifits'),
            'costsaving' => Yii::t('app', 'Cost Saving'),
            'implementationdate' => Yii::t('app', 'Implementation Date'),
            'postedby' => Yii::t('app', 'Posted By'),
            'posteddate' => Yii::t('app', 'Posted Date'),
            'suggestedby' => Yii::t('app', 'Suggested By'),
            'approvedby' => Yii::t('app', 'Approved By'),
            'recordstatus' => Yii::t('app', 'Record Status'),
            'attachmenttype' => Yii::t('app', 'Attachment Type'),
            'kzfilebefore' => Yii::t('app', 'Kaizen Before Attachment'),
            'kzfileafter' => Yii::t('app', 'Kaizen After Attachment'),
            'attachmentother' => Yii::t('app', 'Attachment'),
            'implemented_by' => Yii::t('app', 'Implemented By'),
            'problem_observed' => Yii::t('app', 'Problem Observed'),
            'action_taken' => Yii::t('app', 'Action Taken'),
            'tags' => Yii::t('app', 'Tags'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostedby0() {
        return $this->hasOne(User::className(), ['id' => 'postedby']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0() {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKzattachments() {
        return $this->hasMany(Kzattachments::className(), ['kaizenid' => 'id']);
    }

    /**
     * @inheritdoc
     * @return KaizenQuery the active query used by this AR class.
     */
    public static function find() {
        return new KaizenQuery(get_called_class());
    }

    public function afterValidate() {
        parent::afterValidate();
        $categoryLevel2 = isset(Yii::$app->request->post('Kaizen')['categoryLevel2']) ? Yii::$app->request->post('Kaizen')['categoryLevel2'] : '';
        $categoryLevel3 = isset(Yii::$app->request->post('Kaizen')['categoryLevel3']) ? Yii::$app->request->post('Kaizen')['categoryLevel3'] : '';
        if (!empty($categoryLevel3)) {
            $this->category = $categoryLevel3;
        } elseif (!empty($categoryLevel2)) {
            $this->category = $categoryLevel2;
        }
    }

}
