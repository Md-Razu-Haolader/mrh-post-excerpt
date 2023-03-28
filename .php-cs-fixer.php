<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/tareq1988/wp-php-cs-fixer/loader.php';

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('assets')
    ->exclude('bin')
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->registerCustomFixers([
        new WeDevs\Fixer\SpaceInsideParenthesisFixer(),
        new WeDevs\Fixer\BlankLineAfterClassOpeningFixer(),
    ])
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setRules([
        ...WeDevs\Fixer\Fixer::rules(),
        'no_alternative_syntax' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'declare_strict_types' => true,
        'yoda_style' => false,
    ])
    ->setFinder($finder);
