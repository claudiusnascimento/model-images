<?php

    $prefix = 'model-images.routes.prefix';
    $middle = 'model-images.routes.middlewares';

    Route::
        prefix(config($prefix, 'admin'))
        ->middleware(config($middle, []))
        ->namespace('ClaudiusNascimento\HtmlBlocks\Controllers')
            ->group(function() {

        Route::resource('model-images', 'ModelGalleryController')
            ->only(['store', 'update', 'destroy']);

    });
