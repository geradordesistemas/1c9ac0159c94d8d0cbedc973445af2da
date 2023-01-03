<?php

namespace App\Application\Internit\AndamentoSolicitacaoBundle\Entity;

use App\Application\Internit\AndamentoSolicitacaoBundle\Repository\AndamentoSolicitacaoRepository;
use App\Application\Internit\StatusSolicitacaoBundle\Entity\StatusSolicitacao;
use App\Application\Internit\SolicitacaoBundle\Entity\Solicitacao;
use App\Application\Internit\AgendamentoBundle\Entity\Agendamento;
use App\Application\Internit\RespostaSolicitacaoBundle\Entity\RespostaSolicitacao;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'andamento_solicitacao')]
#[ORM\Entity(repositoryClass: AndamentoSolicitacaoRepository::class)]
#[UniqueEntity('id')]
class AndamentoSolicitacao
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'assunto', type: 'string', unique: false, nullable: false)]
    private string $assunto;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'mensagem', type: 'text', unique: false, nullable: false)]
    private string $mensagem;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: StatusSolicitacao::class)]
    #[ORM\JoinColumn(name: 'statusSolicitacao_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private StatusSolicitacao|null $statusSolicitacao = null;

    #[ORM\ManyToOne(targetEntity: Solicitacao::class, inversedBy: 'andamentoSolicitacao')]
    #[ORM\JoinColumn(name: 'solicitacao_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Solicitacao|null $solicitacao = null;

    #[ORM\OneToMany(mappedBy: 'andamentoSolicitacao', targetEntity: Agendamento::class)]
    private Collection $agendamentos;

    #[ORM\OneToMany(mappedBy: 'andamentoSolicitacao', targetEntity: RespostaSolicitacao::class)]
    private Collection $respostasSolicitacao;


    public function __construct()
    {
        $this->agendamentos = new ArrayCollection();
        $this->respostasSolicitacao = new ArrayCollection();
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

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }

    public function getStatusSolicitacao(): ?StatusSolicitacao
    {
        return $this->statusSolicitacao;
    }

    public function setStatusSolicitacao(?StatusSolicitacao $statusSolicitacao): void
    {
        $this->statusSolicitacao = $statusSolicitacao;
    }


    public function getSolicitacao(): ?Solicitacao
    {
        return $this->solicitacao;
    }

    public function setSolicitacao(?Solicitacao $solicitacao): void
    {
        $this->solicitacao = $solicitacao;
    }


    public function getAgendamentos(): Collection
    {
        return $this->agendamentos;
    }

    public function setAgendamentos(Collection $agendamentos): void
    {
        $this->agendamentos = $agendamentos;
    }


    public function getRespostasSolicitacao(): Collection
    {
        return $this->respostasSolicitacao;
    }

    public function setRespostasSolicitacao(Collection $respostasSolicitacao): void
    {
        $this->respostasSolicitacao = $respostasSolicitacao;
    }



}