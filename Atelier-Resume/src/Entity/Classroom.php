<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassroomRepository::class)]
class Classroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $Name = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'Class')]
    private Collection $User;

    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): static
    {
        if (!$this->User->contains($user)) {
            $this->User->add($user);
            $user->setClass($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClass() === $this) {
                $user->setClass(null);
            }
        }

        return $this;
    }
}
