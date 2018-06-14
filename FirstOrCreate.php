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
     * @param array $attributes
     * @return ActiveRecord
     */
    public static function firstOrNew($attributes)
    {
        $model = static::findOne($attributes);

        if($model === null){
            $model = new static($attributes);
        }

        return $model;
    }

    /**
     * Возвращает модель по переданным атрибутам,
     * если модель не найдена, то создаём, сохраняем и возвращаем новую модель
     *
     * @param array $attributes
     * @param bool $runValidation
     * @return ActiveRecord
     */
    public static function firstOrCreate($attributes, $runValidation = false)
    {
        $model = static::firstOrNew($attributes);

        if($model->isNewRecord){
            $model->save($runValidation);
        }

        return $model;
    }
}
