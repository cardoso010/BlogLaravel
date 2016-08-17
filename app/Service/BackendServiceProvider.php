<?php

namespace App\Service;

use Illuminate\Support\ServiceProvider;
use App\Repository;
use App\Repository\IRepository;

class BackendServiceProvider extends ServiceProvider {


    public function register()
    {
        $this->app->bind('App\\Repository\\IRepository\\IArtigoRepository', 'App\\Repository\\ArtigoRepository');
        $this->app->bind('App\\Repository\\IRepository\\IComentarioRepository', 'App\\Repository\\ComentarioRepository');
    }
}
