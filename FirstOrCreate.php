<?php
/**
 * Методы для поиска записи (модели) или создания если не найдено
 * Идея позаимствована из Ларавел фреймворк
 * @link https://github.com/oleg-p/first-or-create
 */

namespace olegsoft\firstOrCreate;

use Yii;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

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
        $model = static::find()->andWhere($attributes)->limit(1)->one();

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

    /**
     * Находит модель по переданным атрибутам,
     * если модель найдена, то присваиваем свойствам модели значения $values и сохраняем её
     * если модель не найдена, то создаём её со значениями $attributes + $value и сохраняем её
     *
     * @param array $attributes     атрибуты для поиска
     * @param array $values         значения для создания новой модели
     * @param bool $runValidation
     * @return ActiveRecord
     */
    public static function updateOrCreate($attributes, $values = [], $runValidation = false)
    {
        $model = static::firstOrNew($attributes, $values);

        if(!$model->isNewRecord){
            $model->setAttributes($values);
        }

        $model->save($runValidation);

        return $model;
    }

    /**
     * Возвращает модель по переданным атрибутам,
     * если модель не найдена, то будет выброшено исключение HTTP 404
     *
     * @param array $attributes
     * @return ActiveRecord
     * @throws NotFoundHttpException
     */
    public static function firstOrFail($attributes)
    {
        $model = static::find()->andWhere($attributes)->limit(1)->one();

        if($model === null){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
    }

    /**
     * Возвращает модели по переданным атрибутам,
     * если ни одна модель не найдена, то будет выброшено исключение HTTP 404
     *
     * @param array $attributes
     * @return ActiveRecord[]
     * @throws NotFoundHttpException
     */
    public static function findOrFail($attributes)
    {
        $models = static::find()->andWhere($attributes)->all();

        if(count($models) === 0){
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $models;
    }
}
