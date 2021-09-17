<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace Spryker\Glue\GlueApi;

use Spryker\Glue\GlueApi\Resolver\ApplicationResolver;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \Spryker\Glue\GlueApi\GlueApiConfig getConfig()
 */
class GlueApiFactory extends AbstractFactory
{
    public function createApplicationResolver(): ApplicationResolver
    {
        return new ApplicationResolver($this->getGlueApiApplicationPlugins());
    }

    /**
     * @return \Spryker\Glue\GlueApiExtension\GlueApiApplicationPluginInterface[]
     */
    protected function getGlueApiApplicationPlugins(): array
    {
        return $this->getProvidedDependency(GlueApiDependencyProvider::PLUGIN_GLUE_API_APPLICATION);
    }
}
