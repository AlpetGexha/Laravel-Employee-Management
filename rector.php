<?php

use Rector\Config\RectorConfig;
use Rector\Php81\Rector\ClassMethod\NewInInitializerRector;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use RectorLaravel\Rector\Class_\ModelCastsPropertyToCastsMethodRector;

return RectorConfig::configure()
    // register single rule
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ])
    ->withRules([
        TypedPropertyFromStrictConstructorRector::class,
        NewInInitializerRector::class,
    ])
    ->withConfiguredRule(\RectorLaravel\Rector\StaticCall\EloquentMagicMethodToQueryBuilderRector::class, [
        'Eloquent' => 'Illuminate\Database\Eloquent\Model',
        'magicMethods' => [
            '*'
        ]
    ])
    ->withSkip([
        AddOverrideAttributeToOverriddenMethodsRector::class,
        ModelCastsPropertyToCastsMethodRector::class,
    ])
    // here we can define, what prepared sets of rules will be applied
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
        strictBooleans: true,
    )
    ->withPhpSets();
