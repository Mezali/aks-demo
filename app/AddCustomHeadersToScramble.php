<?php

namespace App;

use Dedoc\Scramble\Extensions\OperationExtension;
use Dedoc\Scramble\Support\Generator\Operation;
use Dedoc\Scramble\Support\Generator\Parameter;
use Dedoc\Scramble\Support\Generator\Schema;
use Dedoc\Scramble\Support\Generator\Types\IntegerType;
use Dedoc\Scramble\Support\RouteInfo;

class AddCustomHeadersToScramble extends OperationExtension
{
    public function handle(Operation $operation, RouteInfo $routeInfo)
    {
        $operation->addParameters([
            Parameter::make('Profile', 'header')
                ->setSchema(
                    Schema::fromType(new IntegerType())
                )
                ->required(false)
                ->example(1)
        ]);
    }
}
