<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FlightRepository")
 * @ApiResource(
 *     collectionOperations={"get"={"method"="GET"}},
 *     itemOperations={"get"={"method"="GET"}},
 *     attributes={
 *         "normalization_context"={"groups"={"read"}},
 *         "denormalization_context"={"groups"={"write"}}
 *     }
 * )
 */
class Flight
{
    /**
     * @ORM\Id()
     * @Groups({"read"})
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agency", inversedBy="flights")
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
    private $airline;

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
     * @ORM\Column(type="time")
     * @Groups({"read"})
     */
    private $timeofday;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $from_location;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $to_location;

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

    public function getAirline(): ?string
    {
        return $this->airline;
    }

    public function setAirline(string $airline): self
    {
        $this->airline = $airline;

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

    public function getTimeofday(): ?\DateTimeInterface
    {
        return $this->timeofday;
    }

    public function setTimeofday(\DateTimeInterface $timeofday): self
    {
        $this->timeofday = $timeofday;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getFromLocation(): ?string
    {
        return $this->from_location;
    }

    public function setFromLocation(string $from_location): self
    {
        $this->from_location = $from_location;

        return $this;
    }

    public function getToLocation(): ?string
    {
        return $this->to_location;
    }

    public function setToLocation(string $to_location): self
    {
        $this->to_location = $to_location;

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
        return $this->airline;
    }
}
