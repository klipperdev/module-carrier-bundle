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
use Klipper\Component\Model\Traits\ImagePathTrait;
use Klipper\Component\Model\Traits\NameableTrait;
use Klipper\Component\Model\Traits\OrganizationalRequiredTrait;
use Klipper\Component\Model\Traits\TimestampableTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Carrier model.
 *
 * @author François Pluchino <francois.pluchino@klipper.dev>
 *
 * @Serializer\ExclusionPolicy("all")
 */
abstract class AbstractCarrier implements CarrierInterface
{
    use NameableTrait;
    use OrganizationalRequiredTrait;
    use TimestampableTrait;
    use ImagePathTrait;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min="0", max="9")
     * @Assert\Regex(pattern="/^#[0-9a-f]{6,8}$/i")
     *
     * @Serializer\Expose
     */
    protected ?string $color = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min="0", max="255")
     *
     * @Serializer\Expose
     */
    protected ?string $urlTrackingPattern = null;

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setUrlTrackingPattern(?string $urlTrackingPattern): self
    {
        $this->urlTrackingPattern = $urlTrackingPattern;

        return $this;
    }

    public function getUrlTrackingPattern(): ?string
    {
        return $this->urlTrackingPattern;
    }
}
