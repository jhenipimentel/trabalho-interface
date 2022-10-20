<?php
namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\HelloWordController;

use App\Controllers\TrainQueryController;

trait Get{
    private static function get(){
            switch (self::$processServerElements->getRoute()){
                        
                case '/hello-world':
                    return (new HelloWordController)->execute();
                break;

                case '/train-query':
                    return (new TrainQueryController)->execute();
                break;

                
            }
    }
}