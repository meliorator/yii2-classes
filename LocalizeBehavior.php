<?php
/**
 * @author  : Laba Mykola.
 * @date    : 25.12.17
 * @site    : www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;

use yii\base\Behavior;
use yii\web\Cookie;

class LocalizeBehavior extends Behavior {
    protected $langCookieName = 'lang';

    public function getLangId() {
        $langId = null;
        $langs = \Yii::$app->params['langs'];
        if ($_COOKIE) {
            if (isset($_COOKIE['tmplang'])) {
                if ($_COOKIE['tmplang'] != '') {
                    if (array_key_exists($_COOKIE['tmplang'], $langs)) {
                        $langId = $_COOKIE['tmplang'];
                        $this->setLangId($langId);
                    }
                    setcookie('tmplang', null, 0, '/');
//                    $_COOKIE['tmplang'] = '';
                }
            }
        }

        //Если не было запроса на изменение языка
        if (!$langId) {
            $langId = \Yii::$app->request->cookies->getValue($this->langCookieName);
        }

        if (!$langId) {
            $langId = \Yii::$app->params['defaultLangId'];
            $this->setLangId($langId);
        }
        return $langId;
    }

    public function setLangId($langId) {
        \Yii::$app->response->cookies->add(new Cookie([
            'name' => $this->langCookieName,
            'value' => $langId,
            'expire' => time() + (60 * 60 * 24 * 365 * 2),//Кука на 2 года
            'httpOnly' => false
        ]));
    }
}