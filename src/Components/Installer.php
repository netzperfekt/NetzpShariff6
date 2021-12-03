<?php declare(strict_types=1);

namespace NetzpShariff6\Components;

use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Installer
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function install()
    {
    }
}
