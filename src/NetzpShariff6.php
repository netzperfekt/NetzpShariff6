<?php declare(strict_types=1);

namespace NetzpShariff6;

use NetzpShariff6\Components\Installer;
use NetzpShariff6\Components\Uninstaller;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class NetzpShariff6 extends Plugin
{
    public function install(InstallContext $context): void
    {
        parent::install($context);
        (new Installer($this->container))->install();
    }

    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);
        (new Uninstaller($this->container))->uninstall($context);
    }
}
