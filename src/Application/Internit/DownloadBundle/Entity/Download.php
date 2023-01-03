<?php

namespace App\Application\Internit\DownloadBundle\Entity;

use App\Application\Internit\DownloadBundle\Repository\DownloadRepository;
use App\Application\Internit\ClienteBundle\Entity\Cliente;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'download')]
#[ORM\Entity(repositoryClass: DownloadRepository::class)]
#[UniqueEntity('id')]
class Download
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'titulo', type: 'string', unique: false, nullable: false)]
    private string $titulo;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\JoinTable(name: 'cliente_download')]
    #[ORM\JoinColumn(name: 'download_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'cliente_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Cliente::class, inversedBy: 'downloads')]
    private Collection $clientes;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $arquivos;


    public function __construct()
    {
        $this->clientes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
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

    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function setClientes(Collection $clientes): void
    {
        $this->clientes = $clientes;
    }


    public function getArquivos(): mixed
    {
        return $this->arquivos;
    }

    public function setArquivos(mixed $arquivos): void
    {
        $this->arquivos = $arquivos;
    }



}