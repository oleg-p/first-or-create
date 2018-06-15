<?php
/**
 * Методы для поиска записи (модели) или создания если не найдено
 * Идея позаимствована из Ларавел фреймворк
 * @link https://github.com/oleg-p/first-or-create
 */

namespace olegsoft\firstOrCreate;

use yii\db\ActiveRecord;

trait FirstOrCreate
{
    /**
     * Возвращает модель по переданным атрибутам,
     * если модель не найдена, то создаём и возвращаем новую модель
     *
     * @param array $attributes атрибуты для поиска
     * @param array $values     значения для создания новой модели
     * @return ActiveRecord
     */
    public static function firstOrNew($attributes, $values = [])
    {
        $model = static::find()->andWhere($attributes)->limit(1)->one(); //здесь неверно

        if($model === null){
            $model = new static($attributes + $values);
        }

        return $model;
    }

    /**
     * Возвращает модель по переданным атрибутам,
     * если модель не найдена, то создаём, сохраняем и возвращаем новую модель
     *
     * @param array $attributes     атрибуты для поиска
     * @param array $values         значения для создания новой модели
     * @param bool $runValidation
     * @return ActiveRecord
     */
    public static function firstOrCreate($attributes, $values = [], $runValidation = false)
    {
        $model = static::firstOrNew($attributes, $values);

        if($model->isNewRecord){
            $model->save($runValidation);
        }

        return $model;
    }
}
