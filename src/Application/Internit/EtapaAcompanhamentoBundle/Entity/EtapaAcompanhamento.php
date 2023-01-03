<?php

namespace App\Application\Internit\EtapaAcompanhamentoBundle\Entity;

use App\Application\Internit\EtapaAcompanhamentoBundle\Repository\EtapaAcompanhamentoRepository;
use App\Application\Internit\EtapaBundle\Entity\Etapa;
use App\Application\Internit\AcompanhamentoBundle\Entity\Acompanhamento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'etapa_acompanhamento')]
#[ORM\Entity(repositoryClass: EtapaAcompanhamentoRepository::class)]
#[UniqueEntity('id')]
class EtapaAcompanhamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'porcentagem', type: 'integer', unique: false, nullable: false)]
    private int $porcentagem;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: Etapa::class)]
    #[ORM\JoinColumn(name: 'etapa_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Etapa|null $etapa = null;

    #[ORM\OneToMany(mappedBy: 'etapaAcompanhamento', targetEntity: Acompanhamento::class)]
    private Collection $acompanhamentos;


    public function __construct()
    {
        $this->acompanhamentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPorcentagem(): int
    {
        return $this->porcentagem;
    }

    public function setPorcentagem(int $porcentagem): void
    {
        $this->porcentagem = $porcentagem;
    }

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }

    public function getEtapa(): ?Etapa
    {
        return $this->etapa;
    }

    public function setEtapa(?Etapa $etapa): void
    {
        $this->etapa = $etapa;
    }


    public function getAcompanhamentos(): Collection
    {
        return $this->acompanhamentos;
    }

    public function setAcompanhamentos(Collection $acompanhamentos): void
    {
        $this->acompanhamentos = $acompanhamentos;
    }



}