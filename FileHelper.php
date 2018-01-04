<?php
/**
 * @author  : Laba Mykola.
 * @date    : 13.10.17
 * @site    : www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;

/**
 * Class FileHelper
 *
 * @package meliorator\helpers
 */
class FileHelper extends \yii\helpers\FileHelper {
    /**
     * Full file name without path
     * @param $fileName
     *
     * @return string
     */
    public static function fileName($fileName){
        return pathinfo($fileName, PATHINFO_BASENAME);
    }

    /**
     * File name without extension
     * @param $fileName
     *
     * @return string
     */
    public static function fileBaseName($fileName){
        return pathinfo($fileName, PATHINFO_FILENAME);

    }

    /**
     * @param $fileName
     *
     * @return string
     */
    public static function fileExtension($fileName){
        return pathinfo($fileName, PATHINFO_EXTENSION);
    }
    
    public static function getFileNameUnique($directory, $fileName, $extension) {
        $path = $directory;
        if ($path) {
            if (substr($path, strlen($path) - 1, 1) !== '/') {
                $path .= '/';
            }
        } else {
            return null;
        }

        $counter = 0;
        $baseName = $fileName;

        if (strpos($extension, '.') === 0) {
            $ext = $extension;
        } else {
            $ext = '.' . $extension;
        }
        $resultName = $baseName . $ext;
        while (file_exists($path . $resultName)) {
            $counter++;
            $resultName = $baseName . '-' . $counter . $ext;
        }
        return $resultName;
    }
}
