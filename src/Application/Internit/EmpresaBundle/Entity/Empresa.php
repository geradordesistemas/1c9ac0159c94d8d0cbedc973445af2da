<?php

namespace App\Application\Internit\EmpresaBundle\Entity;

use App\Application\Internit\EmpresaBundle\Repository\EmpresaRepository;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'empresa')]
#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
#[UniqueEntity('id')]
class Empresa
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
    #[ORM\Column(name: 'email', type: 'string', unique: false, nullable: false)]
    private string $email;

    #[ORM\Column(name: 'telefone', type: 'string', unique: false, nullable: true)]
    private ?string $telefone = null;

    #[ORM\Column(name: 'cep', type: 'string', unique: false, nullable: true)]
    private ?string $cep = null;

    #[ORM\Column(name: 'estado', type: 'string', unique: false, nullable: true)]
    private ?string $estado = null;

    #[ORM\Column(name: 'cidade', type: 'string', unique: false, nullable: true)]
    private ?string $cidade = null;

    #[ORM\Column(name: 'bairro', type: 'string', unique: false, nullable: true)]
    private ?string $bairro = null;

    #[ORM\Column(name: 'rua', type: 'string', unique: false, nullable: true)]
    private ?string $rua = null;

    #[ORM\Column(name: 'numero', type: 'string', unique: false, nullable: true)]
    private ?string $numero = null;

    #[ORM\Column(name: 'complemento', type: 'string', unique: false, nullable: true)]
    private ?string $complemento = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaMedia::class, cascade: ['persist'])]
    private mixed $logo;


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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): void
    {
        $this->cep = $cep;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): void
    {
        $this->estado = $estado;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getRua(): ?string
    {
        return $this->rua;
    }

    public function setRua(?string $rua): void
    {
        $this->rua = $rua;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): void
    {
        $this->numero = $numero;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getLogo(): mixed
    {
        return $this->logo;
    }

    public function setLogo(mixed $logo): void
    {
        $this->logo = $logo;
    }



}