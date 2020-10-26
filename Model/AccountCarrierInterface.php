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

use Klipper\Component\Model\Traits\EnableInterface;
use Klipper\Component\Model\Traits\OrganizationalRequiredInterface;
use Klipper\Component\Model\Traits\TimestampableInterface;
use Klipper\Contracts\Model\IdInterface;
use Klipper\Module\PartnerBundle\Model\Traits\AccountableRequiredInterface;

/**
 * Account carrier interface.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
interface AccountCarrierInterface extends
    AccountableRequiredInterface,
    IdInterface,
    EnableInterface,
    OrganizationalRequiredInterface,
    TimestampableInterface
{
    public function getCarrier(): ?CarrierInterface;

    /**
     * @return static
     */
    public function setCarrier(?CarrierInterface $carrier);

    /**
     * @return null|int|string
     */
    public function getCarrierId();
}
