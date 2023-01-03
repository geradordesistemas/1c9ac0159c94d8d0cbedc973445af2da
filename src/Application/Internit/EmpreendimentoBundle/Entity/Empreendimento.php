<?php

namespace App\Application\Internit\EmpreendimentoBundle\Entity;

use App\Application\Internit\EmpreendimentoBundle\Repository\EmpreendimentoRepository;
use App\Application\Internit\StatusEmpreendimentoBundle\Entity\StatusEmpreendimento;
use App\Application\Internit\BlocoBundle\Entity\Bloco;
use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;
use App\Application\Internit\GaleriaEmpreendimentoBundle\Entity\GaleriaEmpreendimento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'empreendimento')]
#[ORM\Entity(repositoryClass: EmpreendimentoRepository::class)]
#[UniqueEntity('id')]
class Empreendimento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $logo;

    #[ORM\ManyToOne(targetEntity: StatusEmpreendimento::class)]
    #[ORM\JoinColumn(name: 'statusEmpreendimento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private StatusEmpreendimento|null $statusEmpreendimento = null;

    #[ORM\OneToMany(mappedBy: 'empreendimento', targetEntity: Bloco::class)]
    private Collection $blocos;

    #[ORM\OneToMany(mappedBy: 'empreendimento', targetEntity: Acompanhamento::class)]
    private Collection $acompanhamentos;

    #[ORM\OneToMany(mappedBy: 'empreendimento', targetEntity: GaleriaEmpreendimento::class)]
    private Collection $galeriaEmpreendimentos;


    public function __construct()
    {
        $this->blocos = new ArrayCollection();
        $this->acompanhamentos = new ArrayCollection();
        $this->galeriaEmpreendimentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
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

    public function getLogo(): mixed
    {
        return $this->logo;
    }

    public function setLogo(mixed $logo): void
    {
        $this->logo = $logo;
    }


    public function getStatusEmpreendimento(): ?StatusEmpreendimento
    {
        return $this->statusEmpreendimento;
    }

    public function setStatusEmpreendimento(?StatusEmpreendimento $statusEmpreendimento): void
    {
        $this->statusEmpreendimento = $statusEmpreendimento;
    }


    public function getBlocos(): Collection
    {
        return $this->blocos;
    }

    public function setBlocos(Collection $blocos): void
    {
        $this->blocos = $blocos;
    }


    public function getAcompanhamentos(): Collection
    {
        return $this->acompanhamentos;
    }

    public function setAcompanhamentos(Collection $acompanhamentos): void
    {
        $this->acompanhamentos = $acompanhamentos;
    }


    public function getGaleriaEmpreendimentos(): Collection
    {
        return $this->galeriaEmpreendimentos;
    }

    public function setGaleriaEmpreendimentos(Collection $galeriaEmpreendimentos): void
    {
        $this->galeriaEmpreendimentos = $galeriaEmpreendimentos;
    }



}