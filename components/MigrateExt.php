<?php

namespace components;

/**
 * Description of MigrateExt
 *
 * @author meliorator
 */
class MigrateExt extends Migrate {
    
    protected function getTableOptions(){
        return 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    }
    
    protected function fillData($tableName, $data = array()){
        foreach ($data as $row) {
            if(is_array($row)){
                $this->insert($tableName, $row);
            }
        }
    }
}
