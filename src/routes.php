<?php

    $prefix = 'model-images.routes.prefix';
    $middle = 'model-images.routes.middlewares';

    Route::
        prefix(config($prefix, 'admin'))
        ->middleware(config($middle, []))
        ->namespace('ClaudiusNascimento\ModelImages\Controllers')
            ->group(function() {

        Route::resource('model-images', 'ModelImagesController')
            ->only(['store', 'update', 'destroy']);

    });
