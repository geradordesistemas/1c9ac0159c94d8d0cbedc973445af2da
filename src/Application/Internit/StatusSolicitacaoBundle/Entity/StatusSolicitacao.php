<?php

namespace App\Application\Internit\StatusSolicitacaoBundle\Entity;

use App\Application\Internit\StatusSolicitacaoBundle\Repository\StatusSolicitacaoRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'status_solicitacao')]
#[ORM\Entity(repositoryClass: StatusSolicitacaoRepository::class)]
#[UniqueEntity('id')]
class StatusSolicitacao
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'status', type: 'string', unique: false, nullable: false)]
    private string $status;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }


}