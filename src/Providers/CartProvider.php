<?php
declare(strict_types=1);

/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Vokuro\Providers;

use Phalcon\Config;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Vokuro\Application;

/**
 * Register the global configuration as config
 */
class CartProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'cart';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var Application $application */
        $application = $di->getShared(Application::APPLICATION_PROVIDER);
        /** @var string $rootPath */
        $rootPath = $application->getRootPath();

        $di->setShared($this->providerName,  function () use ($di) {
            return new \Sinbadxiii\Phalcon\Cart\CartShopping(
                $di->getSession()
            );
        });
    }
}
