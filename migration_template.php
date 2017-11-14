<?php
/**
 * This view is used by console/controllers/MigrateController.php
 * The following variables are available in this view:
 */
/* @var $className string the new migration class name */

echo "<?php\n";
?>

use \meliorator\helpers\Migration;
use yii\db\mysql\Schema;

class <?= $className ?> extends Migration
{
public function up()
{
$this->createTable('', [
'id' => Schema::TYPE_PK,
...
]);

}

public function down()
{
echo "<?= $className ?> cannot be reverted.\n";
$this->dropTable('');
return false;
}

/*
// Use safeUp/safeDown to run migration code within a transaction
public function safeUp()
{
}

public function safeDown()
{
}
*/
}