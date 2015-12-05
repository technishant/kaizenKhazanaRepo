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
            [['subject','processarea','attachmenttype', 'category', 'company', 'currrentstage', 'tangiblebenifits', 'intengiblebenifits', 'costsaving', 'implementationdate', 'suggestedby'], 'required'],
            [['subject', 'processarea', 'mode', 'tangiblebenifits', 'intengiblebenifits','attachmenttype'], 'string'],
            [['category', 'postedby', 'recordstatus'], 'integer'],
            [['costsaving','attachmentprocessed'], 'number'],
           // [['imageFile'], 'file', 'skipOnEmpty' => false],,'extensions' => 'jpg,jpeg,png,mp4,3gp,mov,m4v,pdf', 'mimeTypes' => 'image/jpeg,image/jpg,image/x-png,image/pjpeg, image/png,video/mpeg,video/mp4,video/quicktime,video/x-quicktime,video/x-m4v,video/mov,video/3gpp,application/pdf'
            [['attachmentbefore','attachmentafter'], 'file', 'skipOnEmpty' => true],
            [['implementationdate','mode','approvedby','attachmentprocessed'], 'safe'],
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
    
   
    public function afterValidate() {
        parent::afterValidate();
        $categoryLevel2 = isset(Yii::$app->request->post('Kaizen')['categoryLevel2']) ? Yii::$app->request->post('Kaizen')['categoryLevel2']:'';
        $categoryLevel3 = isset(Yii::$app->request->post('Kaizen')['categoryLevel3']) ? Yii::$app->request->post('Kaizen')['categoryLevel3']:'';
        if(!empty($categoryLevel3)){
            $this->category=$categoryLevel3;
        }elseif(!empty($categoryLevel2)){
            $this->category=$categoryLevel2;
        }
    }
}
