<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Module\CarrierBundle\Model;

use Klipper\Component\Geocoder\Model\Traits\AddressInterface;
use Klipper\Component\Model\Traits\OrganizationalRequiredInterface;
use Klipper\Component\Model\Traits\TimestampableInterface;
use Klipper\Contracts\Model\IdInterface;

/**
 * Shipping interface.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
interface ShippingInterface extends
    AddressInterface,
    IdInterface,
    OrganizationalRequiredInterface,
    TimestampableInterface
{
    /**
     * @return static
     */
    public function setCarrier(?CarrierInterface $carrier);

    public function getCarrier(): ?CarrierInterface;

    /**
     * @return null|int|string
     */
    public function getCarrierId();

    /**
     * @return static
     */
    public function setTrackingNumber(?string $trackingNumber);

    public function getTrackingNumber(): ?string;

    /**
     * @return static
     */
    public function setExpeditedAt(?\DateTimeInterface $expeditedAt);

    public function getExpeditedAt(): ?\DateTimeInterface;
}
