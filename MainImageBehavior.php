<?php
/**
 * @author  : Laba Mykola.
 * @date    : 12.01.18
 * @site    : www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;


use yii\base\Behavior;

/**
 * Class MainImageBehavior
 *
 * Behavior для сущностей, которые имеют "основное изображение" например аватар для сущности User
 * или заглавная картинка для сущности Artice и т.п. Для подключения к сущности, нужно переопределить
 * метод behavior
 ```php
        'logo' => [
            'class' => MainImageBehavior::className(),
            'basePath' => '@webroot/images/partners'
        ]
 ```
 * Для поддержки Intellisense нужно в phpDoc класса добавить
 *
 * @mixin MainImageBehavior
 *
 * @package meliorator\helpers
 */
class MainImageBehavior extends Behavior {

    public $basePath;

    public $baseUrl;

    /** @var string Имя атрибута сущности, где хранится */
    public $fileNameAttribute = 'file_name';
}