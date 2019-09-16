<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="paniers")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PanierProduct", mappedBy="panier")
     */
    private $panierProducts;

    public function __construct()
    {
        $this->panierProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|PanierProduct[]
     */
    public function getPanierProducts(): Collection
    {
        return $this->panierProducts;
    }

    public function addPanierProduct(PanierProduct $panierProduct): self
    {
        if (!$this->panierProducts->contains($panierProduct)) {
            $this->panierProducts[] = $panierProduct;
            $panierProduct->setPanier($this);
        }

        return $this;
    }

    public function removePanierProduct(PanierProduct $panierProduct): self
    {
        if ($this->panierProducts->contains($panierProduct)) {
            $this->panierProducts->removeElement($panierProduct);
            // set the owning side to null (unless already changed)
            if ($panierProduct->getPanier() === $this) {
                $panierProduct->setPanier(null);
            }
        }

        return $this;
    }
}
