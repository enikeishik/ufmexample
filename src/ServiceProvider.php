<?php
/**
 * UFO Framework Example module.
 * 
 * @copyright   Copyright (C) 2018 - 2019 Enikeishik <enikeishik@gmail.com>. All rights reserved.
 * @author      Enikeishik <enikeishik@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ufo\Modules\Enikeishik\Ufmexample;

//use Ufo\Modules\ServiceProvider as BaseServiceProvider;

class ServiceProvider //extends BaseServiceProvider
{
    public function getModuleName(): string
    {
        $json = @file_get_contents(__DIR__ . '/../composer.json');
        if (false === $json) {
            throw new Exception('Call file_get_contents failed');
        }
        
        $schema = json_decode($json);
        if (!isset($schema->name)) {
            throw new Exception('Name field not exists or bad JSON');
        }
        
        return $schema->name;
    }
}

$sp = new ServiceProvider();
try {
    echo $sp->getModuleName();
} catch (\Throwable $e) {
    echo $e->getMessage();
}
