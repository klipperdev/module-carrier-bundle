<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Module\CarrierBundle\Shipping;

use Klipper\Module\CarrierBundle\Model\ShippingInterface;

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
interface UrlTrackingGeneratorInterface
{
    public function generateTrackingUrl(?ShippingInterface $shipping): ?string;
}
