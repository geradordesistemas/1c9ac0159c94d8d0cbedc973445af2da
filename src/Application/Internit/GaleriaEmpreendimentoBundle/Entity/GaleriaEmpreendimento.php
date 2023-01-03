<?php

namespace App\Application\Internit\GaleriaEmpreendimentoBundle\Entity;

use App\Application\Internit\GaleriaEmpreendimentoBundle\Repository\GaleriaEmpreendimentoRepository;
use App\Application\Internit\EmpreendimentoBundle\Entity\Empreendimento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'galeria_empreendimento')]
#[ORM\Entity(repositoryClass: GaleriaEmpreendimentoRepository::class)]
#[UniqueEntity('id')]
class GaleriaEmpreendimento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[ORM\ManyToOne(targetEntity: Empreendimento::class, inversedBy: 'galeriaEmpreendimentos')]
    #[ORM\JoinColumn(name: 'empreendimento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Empreendimento|null $empreendimento = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $galeria;


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

    public function getEmpreendimento(): ?Empreendimento
    {
        return $this->empreendimento;
    }

    public function setEmpreendimento(?Empreendimento $empreendimento): void
    {
        $this->empreendimento = $empreendimento;
    }


    public function getGaleria(): mixed
    {
        return $this->galeria;
    }

    public function setGaleria(mixed $galeria): void
    {
        $this->galeria = $galeria;
    }



}