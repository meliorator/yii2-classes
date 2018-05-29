<?php
/**
 * @author  : Laba Mykola.
 * @date    : 12.10.17
 * @site    : www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;

use yii\helpers\Html;

/**
 * Class View
 * @mixin SidebarBehavior
 * @package app\components
 */
class View extends \yii\web\View {

    /** @var string содержимое для тега meta */
    public $pageDescription = '';

    /** @var array Для регистрации дополнительный "страничных" css для темы */
    private $_css = [];

    /** @var bool Показывать или нет тайтл страницы */
    private $_withTitle = true;

    private $_subTitle = '';

    /**
     * @return array
     */
    public function getCssUrl() {
        return $this->_css;
    }

    /**
     * @param array $css
     */
    public function setCssUrl($css) {
        $this->_css = $css;
    }

    public function getPageDescription() {
        return \Yii::$app->params['siteDescription'];
    }

    public function getTitle() {
        $title = $this->title;
        if (!$title) {
            $title = \Yii::$app->name;
        }
        return Html::encode($title);
    }

    public function setTitle($title){
        $this->title = $title;
    }

    /**
     * @param null | bool $with
     *
     * @return bool
     */
    public function withTitle($with = null) {
        if($with === null){
            return $this->_withTitle;
        }
        $this->_withTitle = $with;
    }

    /**
     * @param bool $withPageTitle
     */
//    public function setWithTitle($withPageTitle) {
//        $this->_withTitle = $withPageTitle;
//    }

    /**
     * @return string
     */
    public function getSubTitle() {
        return $this->_subTitle;
    }

    /**
     * @param string $subTitle
     */
    public function setSubTitle($subTitle) {
        $this->_subTitle = $subTitle;
    }
}
