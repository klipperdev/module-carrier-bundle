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

use Klipper\Component\Model\Traits\ImagePathInterface;
use Klipper\Component\Model\Traits\OrganizationalRequiredInterface;
use Klipper\Component\Model\Traits\SimpleNameableInterface;
use Klipper\Component\Model\Traits\TimestampableInterface;
use Klipper\Contracts\Model\IdInterface;

/**
 * Carrier interface.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
interface CarrierInterface extends
    IdInterface,
    ImagePathInterface,
    SimpleNameableInterface,
    OrganizationalRequiredInterface,
    TimestampableInterface
{
    /**
     * @return static
     */
    public function setColor(?string $color);

    public function getColor(): ?string;

    /**
     * @return static
     */
    public function setUrlTrackingPattern(?string $urlTrackingPattern): self;

    public function getUrlTrackingPattern(): ?string;
}
