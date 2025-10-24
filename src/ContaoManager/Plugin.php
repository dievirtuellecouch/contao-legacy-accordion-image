<?php

namespace Websailing\AccordionImageBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Websailing\AccordionImageBundle\AccordionImageBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(AccordionImageBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    // Ensure we override palettes after the legacy compat bundle
                    'Websailing\\LegacyCompatBundle\\LegacyCompatBundle',
                ])
        ];
    }
}

