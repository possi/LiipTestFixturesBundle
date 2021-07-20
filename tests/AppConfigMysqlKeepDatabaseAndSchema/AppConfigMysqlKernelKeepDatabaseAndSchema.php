<?php

declare(strict_types=1);

/*
 * This file is part of the Liip/TestFixturesBundle
 *
 * (c) Lukas Kahwe Smith <smith@pooteeweet.org>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liip\Acme\Tests\AppConfigMysqlKeepDatabaseAndSchema;

use Liip\Acme\Tests\AppConfigMysql\AppConfigMysqlKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppConfigMysqlKernelKeepDatabaseAndSchema extends AppConfigMysqlKernel
{
    /**
     * {@inheritdoc}
     */
    public function getCacheDir(): string
    {
        return __DIR__.'/var/cache/';
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        // Load the default file.
        parent::configureContainer($container, $loader);

        // Load the file with specific configuration
        $loader->load(__DIR__.'/config.yml');
    }
}
