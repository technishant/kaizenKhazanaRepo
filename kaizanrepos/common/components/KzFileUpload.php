<?php
namespace common\components;
use yii\base\Component;
use yii\web\UploadedFile;
use Yii;
/**
 * Description of FileUpload
 *
 * @author prashant
 */
class KzFileUpload extends Component {
    public $pic;    
    public $image;
    //public $image;
    public $attachmentbefore;
    public $attachmentafter;
    public function init() {
        parent::init();
    }
    
    
   public function uploadFile($modelObj,$uploadFileFieldNmae) {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($modelObj,  $uploadFileFieldNmae);
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // generate random name for the file
        $this->pic = time().uniqid(). '.' . $image->extension;
        // the uploaded image instance
        return $image;
    }
 
    public function getUploadedFile($path='') {
        // return a default image placeholder if your source avatar is not found
        $pic = isset($this->pic) ? $this->pic : 'default.png';
        if(empty($path)){
            $path=Yii::$app->params['kzAttachmentsUrl'];
        }
        if(!file_exists($path)){
            mkdir($path, 0777,true);            
            chmod($path, 0777);
        }
        return $path .'/'. $pic;
    }
}
