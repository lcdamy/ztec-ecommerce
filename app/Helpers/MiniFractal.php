<?php 
namespace App\Helpers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

trait MiniFractal {

    public function get__($type="item", $model, $transformer)
    {
        $manager = new Manager();
        $resource = null;

        if( $type == "collection" )
         {
            $resource = new Collection($model, $transformer);
         }
         else if( $type == "item")
         {
            $resource = new Item($model, $transformer);
         }

        return $manager->createData($resource)->toArray();
    }

}