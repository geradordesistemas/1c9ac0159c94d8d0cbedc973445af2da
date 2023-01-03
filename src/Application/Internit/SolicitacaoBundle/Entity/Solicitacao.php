<?php

namespace App\Application\Internit\SolicitacaoBundle\Entity;

use App\Application\Internit\SolicitacaoBundle\Repository\SolicitacaoRepository;
use App\Application\Internit\TipoSolicitacaoBundle\Entity\TipoSolicitacao;
use App\Application\Internit\PeriodoAgendamentoBundle\Entity\PeriodoAgendamento;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;
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
#[ORM\Table(name: 'solicitacao')]
#[ORM\Entity(repositoryClass: SolicitacaoRepository::class)]
#[UniqueEntity('id')]
class Solicitacao
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

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[Assert\Date]
    #[ORM\Column(name: 'data', type: 'date', unique: false, nullable: false)]
    private DateTime $data;

    #[ORM\ManyToOne(targetEntity: TipoSolicitacao::class)]
    #[ORM\JoinColumn(name: 'tipoSolicitacao_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private TipoSolicitacao|null $tipoSolicitacao = null;

    #[ORM\ManyToOne(targetEntity: PeriodoAgendamento::class)]
    #[ORM\JoinColumn(name: 'periodoAgendamento_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private PeriodoAgendamento|null $periodoAgendamento = null;

    #[ORM\OneToMany(mappedBy: 'solicitacao', targetEntity: AndamentoSolicitacao::class)]
    private Collection $andamentoSolicitacao;

    #[ORM\ManyToOne(targetEntity: Unidade::class)]
    #[ORM\JoinColumn(name: 'unidade_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Unidade|null $unidade = null;

    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(name: 'cliente_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Cliente|null $cliente = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $anexos;


    public function __construct()
    {
        $this->andamentoSolicitacao = new ArrayCollection();
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

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function getTipoSolicitacao(): ?TipoSolicitacao
    {
        return $this->tipoSolicitacao;
    }

    public function setTipoSolicitacao(?TipoSolicitacao $tipoSolicitacao): void
    {
        $this->tipoSolicitacao = $tipoSolicitacao;
    }


    public function getPeriodoAgendamento(): ?PeriodoAgendamento
    {
        return $this->periodoAgendamento;
    }

    public function setPeriodoAgendamento(?PeriodoAgendamento $periodoAgendamento): void
    {
        $this->periodoAgendamento = $periodoAgendamento;
    }


    public function getAndamentoSolicitacao(): Collection
    {
        return $this->andamentoSolicitacao;
    }

    public function setAndamentoSolicitacao(Collection $andamentoSolicitacao): void
    {
        $this->andamentoSolicitacao = $andamentoSolicitacao;
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


    public function getAnexos(): mixed
    {
        return $this->anexos;
    }

    public function setAnexos(mixed $anexos): void
    {
        $this->anexos = $anexos;
    }



}