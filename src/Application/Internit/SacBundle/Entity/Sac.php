<?php

namespace App\Application\Internit\SacBundle\Entity;

use App\Application\Internit\SacBundle\Repository\SacRepository;
use App\Application\Internit\DepartamentoBundle\Entity\Departamento;
use App\Application\Internit\UnidadeBundle\Entity\Unidade;
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
#[ORM\Table(name: 'sac')]
#[ORM\Entity(repositoryClass: SacRepository::class)]
#[UniqueEntity('id')]
class Sac
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'assunto', type: 'text', unique: false, nullable: false)]
    private string $assunto;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'mensagem', type: 'text', unique: false, nullable: false)]
    private string $mensagem;

    #[ORM\ManyToOne(targetEntity: Departamento::class)]
    #[ORM\JoinColumn(name: 'departamento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Departamento|null $departamento = null;

    #[ORM\ManyToOne(targetEntity: Unidade::class)]
    #[ORM\JoinColumn(name: 'unidade_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Unidade|null $unidade = null;

    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Cliente|null $cliente = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $anexo;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getAssunto(): string
    {
        return $this->assunto;
    }

    public function setAssunto(string $assunto): void
    {
        $this->assunto = $assunto;
    }

    public function getMensagem(): string
    {
        return $this->mensagem;
    }

    public function setMensagem(string $mensagem): void
    {
        $this->mensagem = $mensagem;
    }

    public function getDepartamento(): ?Departamento
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamento $departamento): void
    {
        $this->departamento = $departamento;
    }


    public function getUnidade(): ?Unidade
    {
        return $this->unidade;
    }

    public function setUnidade(?Unidade $unidade): void
    {
        $this->unidade = $unidade;
    }


    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }


    public function getAnexo(): mixed
    {
        return $this->anexo;
    }

    public function setAnexo(mixed $anexo): void
    {
        $this->anexo = $anexo;
    }



}