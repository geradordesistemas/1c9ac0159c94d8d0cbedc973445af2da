<?php

namespace App\Application\Internit\ComunicadoBundle\Entity;

use App\Application\Internit\ComunicadoBundle\Repository\ComunicadoRepository;
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
#[ORM\Table(name: 'comunicado')]
#[ORM\Entity(repositoryClass: ComunicadoRepository::class)]
#[UniqueEntity('id')]
class Comunicado
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'titulo', type: 'string', unique: false, nullable: false)]
    private string $titulo;

    #[ORM\Column(name: 'mensagem', type: 'text', unique: false, nullable: true)]
    private ?string $mensagem = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'data', type: 'date', unique: false, nullable: false)]
    private DateTime $data;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\JoinTable(name: 'cliente_comunicado')]
    #[ORM\JoinColumn(name: 'comunicado_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'cliente_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Cliente::class, inversedBy: 'comunicados')]
    private Collection $clientes;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $imagem;


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

    public function getMensagem(): ?string
    {
        return $this->mensagem;
    }

    public function setMensagem(?string $mensagem): void
    {
        $this->mensagem = $mensagem;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
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


    public function getImagem(): mixed
    {
        return $this->imagem;
    }

    public function setImagem(mixed $imagem): void
    {
        $this->imagem = $imagem;
    }



}