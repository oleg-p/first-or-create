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

    $model = ModelTable::firstOrNew(['id' => 50]);
    //Возвращает один экземпляр модели ActiveRecord, соответствующий ограничениям значений массива атрибутов 
    //или возвращает новый экземпляр модели ActiveRecord со свойствами, соответсвующими значениям массива атрибутов
    
    $model = ModelTable::firstOrCreate(['id' => 50]);
    //Возвращает один экземпляр модели ActiveRecord, соответствующий ограничениям значений массива атрибутов
    //или возвращает новый экземпляр модели ActiveRecord со свойствами, соответсвующими значениям массива атрибутов
    //и сохраняет его
...
```

