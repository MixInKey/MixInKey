<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(array(__DIR__.'/app/Http/', __DIR__.'/app/Helpers/'))
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers(array(
        '-psr0'
        '-unalign_double_arrow',
        '-unalign_equals',
        'newline_after_open_tag',
        'ordered_use',
    ))
    ->setUsingCache(false)
    ->finder($finder)
;
