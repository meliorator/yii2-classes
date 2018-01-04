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

####for use localization site
- add to config/web.php components section follow code
```php
'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app'       => 'app.php',
//                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
```

- add support languages to params
```php
'langs' => [
        'en' => 'English', 'ua' => 'Українська', 'ru' => 'Русский'
    ],
'defaultLangId' => 'en',
```
- attach behavior LocalizeBehavior to Controller
```php
public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                'localizeBehavior' => LocalizeBehavior::className(),
            ]
        );
    }
```
