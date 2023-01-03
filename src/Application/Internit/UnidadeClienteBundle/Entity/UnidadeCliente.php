<?php

namespace App\Application\Internit\UnidadeClienteBundle\Entity;

use App\Application\Internit\UnidadeClienteBundle\Repository\UnidadeClienteRepository;
use App\Application\Internit\TipoClienteBundle\Entity\TipoCliente;
use App\Application\Internit\ClienteBundle\Entity\Cliente;
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
#[ORM\Table(name: 'unidade_cliente')]
#[ORM\Entity(repositoryClass: UnidadeClienteRepository::class)]
#[UniqueEntity('id')]
class UnidadeCliente
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: TipoCliente::class)]
    #[ORM\JoinColumn(name: 'tipoCliente_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private TipoCliente|null $tipoCliente = null;

    #[ORM\ManyToOne(targetEntity: Cliente::class, inversedBy: 'unidades')]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Cliente|null $cliente = null;

    #[ORM\ManyToOne(targetEntity: Unidade::class, inversedBy: 'clientes')]
    #[ORM\JoinColumn(name: 'unidade_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Unidade|null $unidade = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTipoCliente(): ?TipoCliente
    {
        return $this->tipoCliente;
    }

    public function setTipoCliente(?TipoCliente $tipoCliente): void
    {
        $this->tipoCliente = $tipoCliente;
    }


    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }


    public function getUnidade(): ?Unidade
    {
        return $this->unidade;
    }

    public function setUnidade(?Unidade $unidade): void
    {
        $this->unidade = $unidade;
    }



}