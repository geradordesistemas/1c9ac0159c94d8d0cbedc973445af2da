<?php

namespace App\Application\Internit\ClienteBundle\Entity;

use App\Application\Internit\ClienteBundle\Repository\ClienteRepository;
use App\Application\Internit\UnidadeClienteBundle\Entity\UnidadeCliente;
use App\Application\Internit\DownloadBundle\Entity\Download;
use App\Application\Internit\ComunicadoBundle\Entity\Comunicado;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'cliente')]
#[ORM\Entity(repositoryClass: ClienteRepository::class)]
#[UniqueEntity('id')]
#[UniqueEntity('cpf')]
class Cliente
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nome', type: 'string', unique: false, nullable: false)]
    private string $nome;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'sobrenome', type: 'string', unique: false, nullable: false)]
    private string $sobrenome;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Length(min: 11, max: 11)]
    #[ORM\Column(name: 'cpf', type: 'string', length: 11, unique: true, nullable: false)]
    private string $cpf;

    #[ORM\Column(name: 'telefone', type: 'string', unique: false, nullable: true)]
    private ?string $telefone = null;

    #[ORM\Column(name: 'celular', type: 'string', unique: false, nullable: true)]
    private ?string $celular = null;

    #[ORM\OneToMany(mappedBy: 'cliente', targetEntity: UnidadeCliente::class)]
    private Collection $unidades;

    #[ORM\ManyToMany(targetEntity: Download::class, mappedBy: 'clientes')]
    private Collection $downloads;

    #[ORM\ManyToMany(targetEntity: Comunicado::class, mappedBy: 'clientes')]
    private Collection $comunicados;


    public function __construct()
    {
        $this->unidades = new ArrayCollection();
        $this->downloads = new ArrayCollection();
        $this->comunicados = new ArrayCollection();
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

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): void
    {
        $this->celular = $celular;
    }

    public function getUnidades(): Collection
    {
        return $this->unidades;
    }

    public function setUnidades(Collection $unidades): void
    {
        $this->unidades = $unidades;
    }


    public function getDownloads(): Collection
    {
        return $this->downloads;
    }

    public function setDownloads(Collection $downloads): void
    {
        $this->downloads = $downloads;
    }


    public function getComunicados(): Collection
    {
        return $this->comunicados;
    }

    public function setComunicados(Collection $comunicados): void
    {
        $this->comunicados = $comunicados;
    }



}