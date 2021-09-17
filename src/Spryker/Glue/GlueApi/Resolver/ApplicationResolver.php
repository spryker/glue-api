<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\GlueApi\Resolver;

use _PHPStan_68495e8a9\Nette\Neon\Exception;
use Generated\Shared\Transfer\ApiApplicationContextTransfer;
use Spryker\Shared\Application\ApplicationInterface;

class ApplicationResolver
{
    /**
     * @var \Spryker\Glue\GlueApiExtension\GlueApiApplicationPluginInterface[]
     */
    protected $glueApiApplicationPlugins;

    /**
     * @param \Spryker\Glue\GlueApiExtension\GlueApiApplicationPluginInterface[] $glueApiApplicationPlugins
     */
    public function __construct(array $glueApiApplicationPlugins)
    {
        $this->glueApiApplicationPlugins = $glueApiApplicationPlugins;
    }

    public function resolve(): ApplicationInterface
    {
        /** Can be provided any parameters with plugin stack */
        $apiApplicationContextTransfer = new ApiApplicationContextTransfer();
        $apiApplicationContextTransfer->setHost($_SERVER['HTTP_HOST']);

        foreach ($this->glueApiApplicationPlugins as $glueApiApplicationPlugin) {
            if ($glueApiApplicationPlugin->isApplicable($apiApplicationContextTransfer)) {
                return $glueApiApplicationPlugin->getApplication();
            }
        }

        throw new Exception('Application can\'t be resolved');
    }
}
