<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdressDelivery", mappedBy="ville")
     */
    private $adressDelivery;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AdressBilling", mappedBy="ville")
     */
    private $adressBilling;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="villes",cascade={"persist"})
     */
    private $country;

    public function __construct()
    {
        $this->adressDelivery = new ArrayCollection();
        $this->adressBilling = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
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

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return Collection|AdressDelivery[]
     */
    public function getAdressDelivery(): Collection
    {
        return $this->adressDelivery;
    }

    public function addAdressDelivery(AdressDelivery $adressDelivery): self
    {
        if (!$this->adressDelivery->contains($adressDelivery)) {
            $this->adressDelivery[] = $adressDelivery;
            $adressDelivery->setVille($this);
        }

        return $this;
    }

    public function removeAdressDelivery(AdressDelivery $adressDelivery): self
    {
        if ($this->adressDelivery->contains($adressDelivery)) {
            $this->adressDelivery->removeElement($adressDelivery);
            // set the owning side to null (unless already changed)
            if ($adressDelivery->getVille() === $this) {
                $adressDelivery->setVille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AdressBilling[]
     */
    public function getAdressBilling(): Collection
    {
        return $this->adressBilling;
    }

    public function addAdressBilling(AdressBilling $adressBilling): self
    {
        if (!$this->adressBilling->contains($adressBilling)) {
            $this->adressBilling[] = $adressBilling;
            $adressBilling->setVille($this);
        }

        return $this;
    }

    public function removeAdressBilling(AdressBilling $adressBilling): self
    {
        if ($this->adressBilling->contains($adressBilling)) {
            $this->adressBilling->removeElement($adressBilling);
            // set the owning side to null (unless already changed)
            if ($adressBilling->getVille() === $this) {
                $adressBilling->setVille(null);
            }
        }

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }


}
