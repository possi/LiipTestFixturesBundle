<?php

declare(strict_types=1);

/*
 * This file is part of the Liip/TestFixturesBundle
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Liip\Acme\Tests\AppConfigMongodb;

use Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle;
use Liip\Acme\Tests\AppConfig\AppConfigKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppConfigMongodbKernel extends AppConfigKernel
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

        // Load the file with MongoDB configuration
        if (class_exists(DoctrineMongoDBBundle::class)) {
            $loader->load(__DIR__.'/config.yml');
        }
    }
}
