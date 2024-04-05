<?php
/**
 * @author Hasan ORKAN <hasanorkan@yandex.com>
 */

namespace Hasanorkan\LaravelPaytr\Exceptions;

class InvalidConfigException extends PaytrException
{
    public static function configNotFound()
    {
        return new static('Setup your credentials to config.paytr');
    }
}