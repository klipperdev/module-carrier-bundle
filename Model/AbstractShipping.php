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
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation as Serializer;
use Klipper\Component\Geocoder\Model\Traits\AddressTrait;
use Klipper\Component\Model\Traits\OrganizationalRequiredTrait;
use Klipper\Component\Model\Traits\TimestampableTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Shipping model.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
abstract class AbstractShipping implements ShippingInterface
{
    use AddressTrait;
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min="0", max="255")
     * @Assert\NotBlank
     *
     * @Serializer\Expose
     */
    protected ?string $trackingNumber = null;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     *
     * @Assert\Type(type="datetime")
     * @Assert\NotBlank
     *
     * @Serializer\Expose
     */
    protected ?\DateTimeInterface $expeditedAt = null;

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

    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setExpeditedAt(?\DateTimeInterface $expeditedAt): self
    {
        $this->expeditedAt = $expeditedAt;

        return $this;
    }

    public function getExpeditedAt(): ?\DateTimeInterface
    {
        return $this->expeditedAt;
    }
}
