<?php

namespace App\Application\Internit\ProfissionalBundle\Entity;

use App\Application\Internit\ProfissionalBundle\Repository\ProfissionalRepository;
use App\Application\Internit\ProfissaoBundle\Entity\Profissao;
use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'profissional')]
#[ORM\Entity(repositoryClass: ProfissionalRepository::class)]
#[UniqueEntity('id')]
class Profissional
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'nomeCompleto', type: 'string', unique: false, nullable: false)]
    private string $nomeCompleto;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'email', type: 'string', unique: false, nullable: false)]
    private string $email;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'telefone1', type: 'string', unique: false, nullable: false)]
    private string $telefone1;

    #[ORM\Column(name: 'telefone2', type: 'string', unique: false, nullable: true)]
    private ?string $telefone2 = null;

    #[ORM\JoinTable(name: 'profissao_profissional')]
    #[ORM\JoinColumn(name: 'profissional_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'profissao_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Profissao::class)]
    private Collection $profissoes;

    #[ORM\ManyToMany(targetEntity: Agendamento::class, mappedBy: 'profissionais')]
    private Collection $agendamentos;


    public function __construct()
    {
        $this->profissoes = new ArrayCollection();
        $this->agendamentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomecompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function setNomecompleto(string $nomeCompleto): void
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelefone1(): string
    {
        return $this->telefone1;
    }

    public function setTelefone1(string $telefone1): void
    {
        $this->telefone1 = $telefone1;
    }

    public function getTelefone2(): ?string
    {
        return $this->telefone2;
    }

    public function setTelefone2(?string $telefone2): void
    {
        $this->telefone2 = $telefone2;
    }

    public function getProfissoes(): Collection
    {
        return $this->profissoes;
    }

    public function setProfissoes(Collection $profissoes): void
    {
        $this->profissoes = $profissoes;
    }


    public function getAgendamentos(): Collection
    {
        return $this->agendamentos;
    }

    public function setAgendamentos(Collection $agendamentos): void
    {
        $this->agendamentos = $agendamentos;
    }



}