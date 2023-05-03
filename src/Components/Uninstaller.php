<?php declare(strict_types=1);

namespace NetzpShariff6\Components;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\ContainsFilter;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Uninstaller
{
    private const PLUGIN_PREFIX = 'NetzpShariff6.';

    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        if ($uninstallContext->keepUserData()) {
            return;
        }

        $this->removeConfiguration($uninstallContext);
    }

    public function removeConfiguration(UninstallContext $uninstallContext)
    {
        $context = $uninstallContext->getContext();
        $repoConfig = $this->container->get('system_config.repository');
        $criteria = new Criteria();
        $criteria->addFilter(new ContainsFilter('configurationKey', self::PLUGIN_PREFIX));
        $idSearchResult = $repoConfig->searchIds($criteria, $context);

        $ids = \array_map(static fn($id) => ['id' => $id], $idSearchResult->getIds());

        $repoConfig->delete($ids, $context);
    }
}
