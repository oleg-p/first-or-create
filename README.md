Trait For Yii2 ActiveRecord
==============================
The idea is borrowed from Laravel framework.
--------------------------------------------

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```bash
php composer.phar require --prefer-dist olegsoft/first-or-create "dev-master"
```


## Inserting into the ActiveRecord class

```php
use olegsoft\firstOrCreate\FirstOrCreate;

class ModelTable extends \yii\db\ActiveRecord
{
    use FirstOrCreate;
    ...
```

## Example of use

```php
use app\models\ModelTable;
    ...

    $model = ModelTable::firstOrNew(['id' => 50]);
    //Returns a single active record model instance by an array of column values
    //or returns a new active record model instance with an array of column values.
    
    $model = ModelTable::firstOrCreate(['id' => 50]);
    //Returns a single active record model instance by an array of column values
    //or returns a new active record model instance with an array of column values and save it.
...
```

