<?php declare(strict_types=1);

namespace NetzpShariff6\Components;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Installer
{
    public function __construct(private readonly ContainerInterface $container) {
    }

    public function install()
    {
    }
}
