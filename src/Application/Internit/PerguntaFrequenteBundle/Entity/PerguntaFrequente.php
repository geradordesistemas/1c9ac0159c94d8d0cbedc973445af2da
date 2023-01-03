<?php

namespace App\Application\Internit\PerguntaFrequenteBundle\Entity;

use App\Application\Internit\PerguntaFrequenteBundle\Repository\PerguntaFrequenteRepository;
use App\Application\Internit\TopicoBundle\Entity\Topico;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\SonataMediaGallery;
use App\Entity\SonataMediaMedia;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'pergunta_frequente')]
#[ORM\Entity(repositoryClass: PerguntaFrequenteRepository::class)]
#[UniqueEntity('id')]
class PerguntaFrequente
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'pergunta', type: 'text', unique: false, nullable: false)]
    private string $pergunta;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'resposta', type: 'text', unique: false, nullable: false)]
    private string $resposta;

    #[ORM\Column(name: 'visivel', type: 'boolean', unique: false, nullable: true)]
    private ?bool $visivel = null;

    #[ORM\ManyToOne(targetEntity: Topico::class, inversedBy: 'perguntaFrequentes')]
    #[ORM\JoinColumn(name: 'topico_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private Topico|null $topico = null;

    #[ORM\ManyToOne(targetEntity: SonataMediaGallery::class, cascade: ['persist'])]
    private mixed $anexos;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPergunta(): string
    {
        return $this->pergunta;
    }

    public function setPergunta(string $pergunta): void
    {
        $this->pergunta = $pergunta;
    }

    public function getResposta(): string
    {
        return $this->resposta;
    }

    public function setResposta(string $resposta): void
    {
        $this->resposta = $resposta;
    }

    public function getVisivel(): ?bool
    {
        return $this->visivel;
    }

    public function setVisivel(?bool $visivel): void
    {
        $this->visivel = $visivel;
    }

    public function getTopico(): ?Topico
    {
        return $this->topico;
    }

    public function setTopico(?Topico $topico): void
    {
        $this->topico = $topico;
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