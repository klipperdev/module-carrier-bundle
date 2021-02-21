<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Module\CarrierBundle\Twig\Extension;

use Klipper\Module\CarrierBundle\Model\ShippingInterface;
use Klipper\Module\CarrierBundle\Shipping\UrlTrackingGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
class CarrierExtension extends AbstractExtension
{
    private UrlTrackingGeneratorInterface $urlTrackingGenerator;

    public function __construct(UrlTrackingGeneratorInterface $urlTrackingGenerator)
    {
        $this->urlTrackingGenerator = $urlTrackingGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('shipping_tracking_url', [$this, 'getShippingTrackingUrl']),
        ];
    }

    public function getShippingTrackingUrl(?ShippingInterface $shipping): ?string
    {
        return $this->urlTrackingGenerator->generateTrackingUrl($shipping);
    }
}
