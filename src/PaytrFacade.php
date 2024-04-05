<?php
/**
 * @author Hasan ORKAN <hasanorkan@yandex.com>
 */

namespace Hasanorkan\LaravelPaytr;

use Illuminate\Support\Facades\Facade;

class PaytrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Paytr::class;
    }
}