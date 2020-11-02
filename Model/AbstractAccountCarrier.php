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

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Klipper\Component\Model\Traits\EnableTrait;
use Klipper\Component\Model\Traits\OrganizationalRequiredTrait;
use Klipper\Component\Model\Traits\TimestampableTrait;
use Klipper\Module\PartnerBundle\Model\Traits\AccountableRequiredTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Account carrier model.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 *
 * @Serializer\ExclusionPolicy("all")
 */
abstract class AbstractAccountCarrier implements AccountCarrierInterface
{
    use AccountableRequiredTrait;
    use EnableTrait;
    use OrganizationalRequiredTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Klipper\Module\CarrierBundle\Model\CarrierInterface",
     *     fetch="EXTRA_LAZY"
     * )
     *
     * @Assert\NotBlank
     *
     * @Serializer\Type("Relation")
     * @Serializer\Expose
     * @Serializer\ReadOnly
     */
    protected ?CarrierInterface $carrier = null;

    public function setCarrier(?CarrierInterface $carrier): self
    {
        $this->carrier = $carrier;

        return $this;
    }

    public function getCarrier(): ?CarrierInterface
    {
        return $this->carrier;
    }

    public function getCarrierId()
    {
        return null !== $this->getCarrier()
            ? $this->getCarrier()->getId()
            : null;
    }
}
