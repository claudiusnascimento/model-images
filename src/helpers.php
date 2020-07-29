<?php


if (! function_exists('modelImagesRelationString')) {

    function modelImagesRelationString($model) {

        if(method_exists($model, 'getmodelImagesRelationString')) {
            return $model->getmodelImagesRelationString();
        }

        if(property_exists($model, 'modelImagesRelationString')) {
            return $model->modelImagesRelationString;
        }

        return '';
    }
}
