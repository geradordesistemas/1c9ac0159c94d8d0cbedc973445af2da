<?php

namespace App\Application\Internit\BlocoBundle\Entity;

use App\Application\Internit\BlocoBundle\Repository\BlocoRepository;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'bloco')]
#[ORM\Entity(repositoryClass: BlocoRepository::class)]
#[UniqueEntity('id')]
class Bloco
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'bloco', type: 'string', unique: false, nullable: false)]
    private string $bloco;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: Empreendimento::class, inversedBy: 'blocos')]
    #[ORM\JoinColumn(name: 'empreendimento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Empreendimento|null $empreendimento = null;

    #[ORM\OneToMany(mappedBy: 'bloco', targetEntity: Unidade::class)]
    private Collection $unidades;


    public function __construct()
    {
        $this->unidades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBloco(): string
    {
        return $this->bloco;
    }

    public function setBloco(string $bloco): void
    {
        $this->bloco = $bloco;
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

    public function getEmpreendimento(): ?Empreendimento
    {
        return $this->empreendimento;
    }

    public function setEmpreendimento(?Empreendimento $empreendimento): void
    {
        $this->empreendimento = $empreendimento;
    }


    public function getUnidades(): Collection
    {
        return $this->unidades;
    }

    public function setUnidades(Collection $unidades): void
    {
        $this->unidades = $unidades;
    }



}