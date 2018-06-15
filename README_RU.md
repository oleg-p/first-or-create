Тзейт для Yii2 ActiveRecord
==============================
Идея заимствована из Laravel framework.
--------------------------------------------

Установка
------------

Лучше устанавливать через [composer](http://getcomposer.org/download/).

```bash
php composer.phar require --prefer-dist olegsoft/first-or-create "dev-master"
```


## Вставка в класс ActiveRecord

```php
use olegsoft\firstOrCreate\FirstOrCreate;

class ModelTable extends \yii\db\ActiveRecord
{
    use FirstOrCreate;
    ...
```

## Пример использования

```php
use app\models\ModelTable;
    ...

    //public static function firstOrNew($attributes, $values = [])
    $model = ModelTable::firstOrNew(['id' => 50]);
    $model = ModelTable::firstOrNew(['id' => 50], ['sort' => 10]);
    //Возвращает один экземпляр модели ActiveRecord, соответствующий ограничениям значений массива атрибутов 
    //или возвращает новый экземпляр модели ActiveRecord со свойствами, 
    //соответствующими значениям массива $attributes + значениям массива $values 
    
    //public static function firstOrCreate($attributes, $values = [])
    $model = ModelTable::firstOrCreate(['id' => 50]);
    $model = ModelTable::firstOrCreate(['id' => 50], ['sort' => 10]);
    //Возвращает один экземпляр модели ActiveRecord, соответствующий ограничениям значений массива атрибутов
    //или возвращает новый экземпляр модели ActiveRecord со свойствами,
    //соответствующими значениям массива $attributes + значениям массива $values и сохраняет его
    
    //public static function updateOrCreate($attributes, $values = [])
    $model = ModelTable::updateOrCreate(['id' => 50]);
    $model = ModelTable::updateOrCreate(['id' => 50], ['sort' => 10]);
    //Находит модель по переданным атрибутам,
    //если модель найдена, то присваиваем свойствам модели значения $values и сохраняем её
    //если модель не найдена, то создаём её со значениями $attributes + $value и сохраняем её
    
    //public static function firstOrFail($attributes)
    $models = ModelTable::firstOrFail(['id' => 50]);
    //Возвращает модель по переданным атрибутам,
    //если модель не найдена, то будет выброшено исключение HTTP 404
    
    //public static function findOrFail($attributes)
    $models = ModelTable::findOrFail(['id' => 50]);
    //Возвращает массив моделей по переданным атрибутам,
    //если ни одна модель не найдена, то будет выброшено исключение HTTP 404


...
```

