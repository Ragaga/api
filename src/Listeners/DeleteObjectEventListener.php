<?php


namespace App\Listeners;


use App\Enitites\events\DeleteObjectEvent;

class DeleteObjectListener
{

    public function handle(DeleteObjectEvent $event)
    {
        /**
         * Тут можем поставить в очередь на удаление всех дочерних объектов хранимого объекта ( подпапки, файлы)
         */
    }

}