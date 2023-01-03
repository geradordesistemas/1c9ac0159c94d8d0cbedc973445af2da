<?php

namespace App\Application\Internit\RespostaSolicitacaoBundle\Entity;

use App\Application\Internit\RespostaSolicitacaoBundle\Repository\RespostaSolicitacaoRepository;
use App\Application\Internit\AndamentoSolicitacaoBundle\Entity\AndamentoSolicitacao;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'resposta_solicitacao')]
#[ORM\Entity(repositoryClass: RespostaSolicitacaoRepository::class)]
#[UniqueEntity('id')]
class RespostaSolicitacao
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

    #[ORM\ManyToOne(targetEntity: AndamentoSolicitacao::class, inversedBy: 'respostasSolicitacao')]
    #[ORM\JoinColumn(name: 'andamentoSolicitacao_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private AndamentoSolicitacao|null $andamentoSolicitacao = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $anexos;


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

    public function getAndamentoSolicitacao(): ?AndamentoSolicitacao
    {
        return $this->andamentoSolicitacao;
    }

    public function setAndamentoSolicitacao(?AndamentoSolicitacao $andamentoSolicitacao): void
    {
        $this->andamentoSolicitacao = $andamentoSolicitacao;
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