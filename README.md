#My small helper classes for yii2
for using migration class template, need added this code

```php
'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@app/vendor/meliorator/yii2-helpers/migration_template.php',
        ],
    ],
```

