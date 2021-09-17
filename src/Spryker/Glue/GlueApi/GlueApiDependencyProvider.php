<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\GlueApi;

use Spryker\Glue\GlueApiExtension\GlueApiApplicationPluginInterface;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

/**
 * @method \Spryker\Glue\GlueApi\GlueApiConfig getConfig()
 */
class GlueApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const PLUGIN_GLUE_API_APPLICATION = 'PLUGIN_GLUE_API_APPLICATION';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addGlueApiApplicationPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addGlueApiApplicationPlugins(Container $container): Container
    {
        $container->set(static::PLUGIN_GLUE_API_APPLICATION, function (Container $container) {
            return $this->getGlueApiApplicationPlugins();
        });

        return $container;
    }

    /**
     * @return \Spryker\Glue\GlueApiExtension\GlueApiApplicationPluginInterface[]
     */
    protected function getGlueApiApplicationPlugins(): array
    {
        return [];
    }
}
