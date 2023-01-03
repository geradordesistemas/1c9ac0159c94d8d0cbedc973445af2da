<?php

namespace App\Application\Internit\ProfissaoBundle\Entity;

use App\Application\Internit\ProfissaoBundle\Repository\ProfissaoRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'profissao')]
#[ORM\Entity(repositoryClass: ProfissaoRepository::class)]
#[UniqueEntity('id')]
class Profissao
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'profissao', type: 'string', unique: false, nullable: false)]
    private string $profissao;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getProfissao(): string
    {
        return $this->profissao;
    }

    public function setProfissao(string $profissao): void
    {
        $this->profissao = $profissao;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }


}