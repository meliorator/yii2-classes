<?php
/**
 * @author: Laba Mykola.
 * @date: 21.07.17
 * @site: www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;


use yii\base\Behavior;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\validators\FileValidator;

/**
 * Warning! Add property public $enableCsrfValidation = false; to controller class
 * Class EditorImageUploadBehavior
 *
 * @package app\components
 */
class EditorImageUploadBehavior extends Behavior {

    /**
     * Upload images from redactor.js
     * @param $rootPath string path for save images
     * @param $rootUrl string url for images
     * @param $prefixName
     *
     * @return \yii\web\Response
     */
    public function process($rootPath, $rootUrl, $prefixName) {
        /** @var Controller $controller */
        $controller = $this->owner;
        /** @var UploadedFile $uploadedInstance */
        $uploadedInstance = UploadedFile::getInstanceByName('file');

        $params = [
            'class' => 'yii\validators\FileValidator',
            'mimeTypes' => 'image/*',
            'extensions' => ['jpg', 'png', 'jpeg']
        ];
        /** @var FileValidator $validator */
        $validator = \Yii::createObject($params);

        if (!$validator->validate($uploadedInstance)) {
            return $controller->asJson(['filelink' => '']);
        }

        $dir = $rootPath;//News::getRootPath();
        FileHelper::createDirectory($dir);

        $tmpFilename = Utils::getFileNameUnique($dir, uniqid($prefixName), $uploadedInstance->getExtension());
        $filePath = $dir . '/' . $tmpFilename;
        $uploadedInstance->saveAs($filePath);

        list($height, $width) = array_values(\Yii::$app->params['newsParams']);

        $image = Imagick::open($filePath);
        $format = $image->getFormat();
        if ($format !== 'PNG') {
            $newFilename = Utils::getFileNameUnique($dir, uniqid($prefixName), 'png');
            $newFilePath = $dir . '/' . $newFilename;
            $image->setFormat('PNG')->saveTo($newFilePath);
            $image = Imagick::open($newFilePath);
            @unlink($filePath);
            $filePath = $newFilePath;
            $tmpFilename = $newFilename;
        }

        $image->adaptiveResize($width, $height)->saveTo($filePath);

        $url = $rootUrl . '/' . $tmpFilename; //News::getRootUrl().'/'.$tmpFilename;
        return $controller->asJson(['filelink' => $url]);
    }
}
