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

    //public static function firstOrNew($attributes, $values = [])
    $model = ModelTable::firstOrNew(['id' => 50]);
    $model = ModelTable::firstOrNew(['id' => 50], ['sort' => 10]);
    //Returns a single of the ActiveRecord model instance that matches the values of the $attribute array values 
    //or returns a new instance of the ActiveRecord model 
    //with properties corresponding to the values of the $attributes array + values of the $values array
       
    //public static function firstOrCreate($attributes, $values = [])
    $model = ModelTable::firstOrCreate(['id' => 50]);
    $model = ModelTable::firstOrCreate(['id' => 50], ['sort' => 10]);
    //Returns a single of the ActiveRecord model instance that matches the values of the $attribute array values 
    //or returns a new instance of the ActiveRecord model 
    //with properties corresponding to the values of the $attributes array + values of the $values array and save it
    
    //public static function updateOrCreate($attributes, $values = [])
    $model = ModelTable::updateOrCreate(['id' => 50]);
    $model = ModelTable::updateOrCreate(['id' => 50], ['sort' => 10]);
    //Finds the model from the passed attributes,
    //if the model is found, then assign the values of the $values and save it
    //if the model is not found, then create it with the values $attributes + $value and save it

    //public static function firstOrFail($attributes)
    $model = ModelTable::firstOrFail(['id' => 50]);
    //Return the model with the passed attributes, if the model is not found, then the HTTP 404 exception will be thrown

    //public static function findOrFail($attributes)
    $models = ModelTable::findOrFail(['id' => 50]);
    //Returns array of models by the passed attributes, if no model is found, then the HTTP 404 exception will be thrown
    
...
```

