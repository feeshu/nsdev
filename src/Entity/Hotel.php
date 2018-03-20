<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 * @ApiResource(
 *     collectionOperations={"get"={"method"="GET"}},
 *     itemOperations={"get"={"method"="GET"}},
 *     attributes={
 *         "normalization_context"={"groups"={"read"}},
 *         "denormalization_context"={"groups"={"write"}}
 *     }
 * )
 */
class Hotel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @Groups({"read"})
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agency", inversedBy="hotels")
     * @Groups({"read"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $agency;

    /**
     * @ORM\Column(type="integer")
     */
    private $remoteId;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $location;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read"})
     */
    private $start;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read"})
     */
    private $end;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $stars;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Groups({"read"})
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read"})
     */
    private $owned;

    public function getId()
    {
        return $this->id;
    }

    public function getAgency()
    {
        return $this->agency;
    }
    

    public function setAgency($agency): self
    {
        $this->agency = $agency;

        return $this;
    }

    public function getRemoteId(): ?int
    {
        return $this->remoteId;
    }

    public function setRemoteId(int $remoteId): self
    {
        $this->remoteId = $remoteId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->stars;
    }

    public function setStars(int $stars): self
    {
        $this->stars = $stars;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOwned(): ?bool
    {
        return $this->owned;
    }

    public function setOwned(bool $owned): self
    {
        $this->owned = $owned;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
}
