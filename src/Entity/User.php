<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @UniqueEntity("email",message="cet Email existe deja connectez vous ou proceder à mot de passe oublié dans la rubrique mon compte")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */

class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 8,
     *      minMessage = "Votre mot de passe doit avoir au moins  {{ limit }} caractères",
     * )
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password",message="Vous devez tapez le meme mot de passe")
     */
    private $confirm_password;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AdressBilling", cascade={"persist", "remove"})
     */
    private $adressBilling;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AdressDelivery", cascade={"persist", "remove"})
     */
    private $adressDelivery;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="user")
     */
    private $commandes;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sameAdressDB =true;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirm_password;
    }

    /**
     * @param mixed $confirm_password
     */
    public function setConfirmPassword($confirm_password): void
    {
        $this->confirm_password = $confirm_password;
    }


    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }


    public function getAdressBilling(): ?AdressBilling
    {
        return $this->adressBilling;
    }

    public function setAdressBilling(?AdressBilling $adressBilling): self
    {
        $this->adressBilling = $adressBilling;

        return $this;
    }

    public function getAdressDelivery(): ?AdressDelivery
    {
        return $this->adressDelivery;
    }

    public function setAdressDelivery(?AdressDelivery $adressDelivery): self
    {
        $this->adressDelivery = $adressDelivery;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    public function getSameAdressDB(): ?bool
    {
        return $this->sameAdressDB;
    }

    public function setSameAdressDB(?bool $sameAdressDB): self
    {
        $this->sameAdressDB = $sameAdressDB;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function addIfSameAdress()
    {
        if($this->sameAdressDB) {
            $adressBilling = new AdressBilling();
            $adressBilling
                ->setStreet($this->getAdressDelivery()->getStreet())
                ->setVille($this->getAdressDelivery()->getVille())
            ;
            $this->adressBilling = $adressBilling;
        }
    }
}
