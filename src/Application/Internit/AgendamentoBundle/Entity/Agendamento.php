<?php

namespace App\Application\Internit\AgendamentoBundle\Entity;

use App\Application\Internit\AgendamentoBundle\Repository\AgendamentoRepository;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
use App\Application\Internit\ProfissionalBundle\Entity\Profissional;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'agendamento')]
#[ORM\Entity(repositoryClass: AgendamentoRepository::class)]
#[UniqueEntity('id')]
class Agendamento
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'data', type: 'date', unique: false, nullable: false)]
    private DateTime $data;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'observacoes', type: 'text', unique: false, nullable: false)]
    private string $observacoes;

    #[ORM\ManyToOne(targetEntity: PeriodoAgendamento::class)]
    #[ORM\JoinColumn(name: 'periodoAgendamento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private PeriodoAgendamento|null $periodoAgendamento = null;

    #[ORM\ManyToOne(targetEntity: AndamentoSolicitacao::class, inversedBy: 'agendamentos')]
    #[ORM\JoinColumn(name: 'andamentoSolicitacao_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private AndamentoSolicitacao|null $andamentoSolicitacao = null;

    #[ORM\JoinTable(name: 'profissional_agendamento')]
    #[ORM\JoinColumn(name: 'agendamento_id', referencedColumnName: 'id')] // , onDelete: 'SET NULL'
    #[ORM\InverseJoinColumn(name: 'profissional_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Profissional::class, inversedBy: 'agendamentos')]
    private Collection $profissionais;


    public function __construct()
    {
        $this->profissionais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function getObservacoes(): string
    {
        return $this->observacoes;
    }

    public function setObservacoes(string $observacoes): void
    {
        $this->observacoes = $observacoes;
    }

    public function getPeriodoAgendamento(): ?PeriodoAgendamento
    {
        return $this->periodoAgendamento;
    }

    public function setPeriodoAgendamento(?PeriodoAgendamento $periodoAgendamento): void
    {
        $this->periodoAgendamento = $periodoAgendamento;
    }


    public function getAndamentoSolicitacao(): ?AndamentoSolicitacao
    {
        return $this->andamentoSolicitacao;
    }

    public function setAndamentoSolicitacao(?AndamentoSolicitacao $andamentoSolicitacao): void
    {
        $this->andamentoSolicitacao = $andamentoSolicitacao;
    }


    public function getProfissionais(): Collection
    {
        return $this->profissionais;
    }

    public function setProfissionais(Collection $profissionais): void
    {
        $this->profissionais = $profissionais;
    }



}