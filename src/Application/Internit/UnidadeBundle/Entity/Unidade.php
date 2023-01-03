<?php

namespace App\Application\Internit\UnidadeBundle\Entity;

use App\Application\Internit\UnidadeBundle\Repository\UnidadeRepository;
use App\Application\Internit\BlocoBundle\Entity\Bloco;
use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'unidade')]
#[ORM\Entity(repositoryClass: UnidadeRepository::class)]
#[UniqueEntity('id')]
class Unidade
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'unidade', type: 'string', unique: false, nullable: false)]
    private string $unidade;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: Bloco::class, inversedBy: 'unidades')]
    #[ORM\JoinColumn(name: 'bloco_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Bloco|null $bloco = null;

    #[ORM\OneToMany(mappedBy: 'unidade', targetEntity: UnidadeCliente::class)]
    private Collection $clientes;


    public function __construct()
    {
        $this->clientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUnidade(): string
    {
        return $this->unidade;
    }

    public function setUnidade(string $unidade): void
    {
        $this->unidade = $unidade;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }

    public function getBloco(): ?Bloco
    {
        return $this->bloco;
    }

    public function setBloco(?Bloco $bloco): void
    {
        $this->bloco = $bloco;
    }


    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function setClientes(Collection $clientes): void
    {
        $this->clientes = $clientes;
    }



}