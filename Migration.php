<?php
/**
 * @author  : Laba Mykola.
 * @date    : 13.10.17
 * @site    : www.laba.net.ua
 * @contacts: me@laba.net.ua
 */

namespace meliorator\helpers;


class Migration extends \yii\db\Migration {

    protected function getTableOptions(){
        return 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    }

    protected function fillData($tableName, array $data = []){
        foreach ($data as $row) {
            if(is_array($row)){
                $this->insert($tableName, $row);
            }
        }
    }
}