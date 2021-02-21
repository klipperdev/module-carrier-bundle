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
class UrlTrackingGenerator implements UrlTrackingGeneratorInterface
{
    public function generateTrackingUrl(?ShippingInterface $shipping): ?string
    {
        if (null !== $shipping
            && null !== ($tracking = $shipping->getTrackingNumber())
                && null !== ($carrier = $shipping->getCarrier())
        ) {
            if (null !== ($urlPattern = $carrier->getUrlTrackingPattern())) {
                return str_replace('{number}', $tracking, $urlPattern);
            }
        }

        return null;
    }
}
