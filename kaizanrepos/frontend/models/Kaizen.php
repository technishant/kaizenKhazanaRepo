<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "kaizen".
 *
 * @property integer $id
 * @property string $subject
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
 *
 * @property User $postedby0
 * @property Category $category0
 * @property Kzattachments[] $kzattachments
 */
class Kaizen extends \yii\db\ActiveRecord {

    public $categoryLevel3;
    public $categoryLevel2;
    public $image;
    public $upload_file;
    public $upload_file1;
    public $pic;

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
            [['subject', 'processarea', 'attachmenttype', 'category', 'company', 'currrentstage', 'tangiblebenifits', 'intengiblebenifits', 'costsaving', 'implementationdate', 'suggestedby'], 'required'],
//            [['upload_file','upload_file1'],'file','skipOnEmpty' => true, 'whenClient' => "function (attribute, value) {
//                return ($('input[type=\"radio\"][name=\"Kaizen[attachmenttype]\"]:checked').val());
//            }"],
//            [['upload_file','upload_file1'], 'required', 'when' => function ($model) {
//                 return ($model->attachmenttype == 'image' ? true : false);
//            }, 'whenClient' => "function (attribute, value) {
//                return ($('input[type=\"radio\"][name=\"Kaizen[attachmenttype]\"]:checked').val());
//            }"],
            [['subject', 'processarea', 'mode', 'tangiblebenifits', 'intengiblebenifits', 'attachmenttype'], 'string'],
            [['category', 'postedby', 'recordstatus'], 'integer'],
            [['costsaving', 'attachmentprocessed'], 'number'],
            // [['imageFile'], 'file', 'skipOnEmpty' => false],
            [['upload_file', 'upload_file1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,jpeg,png,mp4,3gp,mov,m4v,pdf', 'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png,video/mpeg,video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp,application/pdf'],
            [['implementationdate', 'mode', 'approvedby', 'attachmentbefore', 'attachmentafter', 'attachmentprocessed'], 'safe'],
            [['company', 'currrentstage', 'suggestedby', 'approvedby'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject' => Yii::t('app', 'Subject'),
            'processarea' => Yii::t('app', 'Process Area'),
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

    public function uploadFile($uploadFileFieldNmae) {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, $uploadFileFieldNmae);

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // generate random name for the file
        $this->pic = time() . uniqid() . '.' . $image->extension;

        // the uploaded image instance
        return $image;
    }

    public function getUploadedFile() {
        // return a default image placeholder if your source avatar is not found
        $pic = isset($this->pic) ? $this->pic : 'default.png';
        if (!file_exists(Yii::$app->params['kzAttachmentsUrl'])) {
            mkdir(Yii::$app->params['kzAttachmentsUrl'], 0755);
        }
        return Yii::$app->params['kzAttachmentsUrl'] . '/' . $pic;
    }

    public function afterValidate() {
        parent::afterValidate();
        $categoryLevel2 = isset($_POST['Kaizen']['categoryLevel2']) ? $_POST['Kaizen']['categoryLevel2'] : '';
        $categoryLevel3 = isset($_POST['Kaizen']['categoryLevel3']) ? $_POST['Kaizen']['categoryLevel3'] : '';
        if (!empty($categoryLevel3)) {
            $this->category = $categoryLevel3;
        } elseif (!empty($categoryLevel2)) {
            $this->category = $categoryLevel2;
        }
    }

}
