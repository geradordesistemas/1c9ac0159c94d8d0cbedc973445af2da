<?php

namespace App\Application\Internit\AcompanhamentoBundle\Entity;

use App\Application\Internit\AcompanhamentoBundle\Repository\AcompanhamentoRepository;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;
use App\Application\Internit\EtapaAcompanhamentoBundle\Entity\EtapaAcompanhamento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'acompanhamento')]
#[ORM\Entity(repositoryClass: AcompanhamentoRepository::class)]
#[UniqueEntity('id')]
class Acompanhamento
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

    #[ORM\ManyToOne(targetEntity: Empreendimento::class, inversedBy: 'acompanhamentos')]
    #[ORM\JoinColumn(name: 'empreendimento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Empreendimento|null $empreendimento = null;

    #[ORM\ManyToOne(targetEntity: EtapaAcompanhamento::class, inversedBy: 'acompanhamentos')]
    #[ORM\JoinColumn(name: 'etapaAcompanhamento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private EtapaAcompanhamento|null $etapaAcompanhamento = null;


    public function __construct()
    {
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

    public function getEmpreendimento(): ?Empreendimento
    {
        return $this->empreendimento;
    }

    public function setEmpreendimento(?Empreendimento $empreendimento): void
    {
        $this->empreendimento = $empreendimento;
    }


    public function getEtapaAcompanhamento(): ?EtapaAcompanhamento
    {
        return $this->etapaAcompanhamento;
    }

    public function setEtapaAcompanhamento(?EtapaAcompanhamento $etapaAcompanhamento): void
    {
        $this->etapaAcompanhamento = $etapaAcompanhamento;
    }



}