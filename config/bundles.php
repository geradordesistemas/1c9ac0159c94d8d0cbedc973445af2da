<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
    Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle::class => ['all' => true],
    Sonata\Twig\Bridge\Symfony\SonataTwigBundle::class => ['all' => true],
    Sonata\Doctrine\Bridge\Symfony\SonataDoctrineBundle::class => ['all' => true],
    Sonata\Form\Bridge\Symfony\SonataFormBundle::class => ['all' => true],
    Sonata\Exporter\Bridge\Symfony\SonataExporterBundle::class => ['all' => true],
    Sonata\BlockBundle\SonataBlockBundle::class => ['all' => true],
    Knp\Bundle\MenuBundle\KnpMenuBundle::class => ['all' => true],
    Sonata\AdminBundle\SonataAdminBundle::class => ['all' => true],
    Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle::class => ['all' => true],
    Sonata\MediaBundle\SonataMediaBundle::class => ['all' => true],
    FOS\RestBundle\FOSRestBundle::class => ['all' => true],
    Nelmio\ApiDocBundle\NelmioApiDocBundle::class => ['all' => true],
    Nelmio\CorsBundle\NelmioCorsBundle::class => ['all' => true],
    SimpleThings\EntityAudit\SimpleThingsEntityAuditBundle::class => ['all' => true],
    App\Application\Project\ContentBundle\ApplicationProjectContentBundle::class => ['all' => true],
    App\Application\Project\MediaBundle\ApplicationProjectMediaBundle::class => ['all' => true],
    App\Application\Project\SettingBundle\ApplicationProjectSettingBundle::class => ['all' => true],
    App\Application\Project\SecurityAdminBundle\ApplicationProjectSecurityAdminBundle::class => ['all' => true],
    App\Application\Project\SecurityUserBundle\ApplicationProjectSecurityUserBundle::class => ['all' => true],

    /** Schema Bundles */
    App\Application\Internit\EmpreendimentoBundle\ApplicationInternitEmpreendimentoBundle::class => ['all' => true],
    App\Application\Internit\StatusEmpreendimentoBundle\ApplicationInternitStatusEmpreendimentoBundle::class => ['all' => true],
    App\Application\Internit\BlocoBundle\ApplicationInternitBlocoBundle::class => ['all' => true],
    App\Application\Internit\UnidadeBundle\ApplicationInternitUnidadeBundle::class => ['all' => true],
    App\Application\Internit\EmpresaBundle\ApplicationInternitEmpresaBundle::class => ['all' => true],
    App\Application\Internit\TopicoBundle\ApplicationInternitTopicoBundle::class => ['all' => true],
    App\Application\Internit\PerguntaFrequenteBundle\ApplicationInternitPerguntaFrequenteBundle::class => ['all' => true],
    App\Application\Internit\AcompanhamentoBundle\ApplicationInternitAcompanhamentoBundle::class => ['all' => true],
    App\Application\Internit\SacBundle\ApplicationInternitSacBundle::class => ['all' => true],
    App\Application\Internit\DepartamentoBundle\ApplicationInternitDepartamentoBundle::class => ['all' => true],
    App\Application\Internit\GaleriaEmpreendimentoBundle\ApplicationInternitGaleriaEmpreendimentoBundle::class => ['all' => true],
    App\Application\Internit\EtapaBundle\ApplicationInternitEtapaBundle::class => ['all' => true],
    App\Application\Internit\EtapaAcompanhamentoBundle\ApplicationInternitEtapaAcompanhamentoBundle::class => ['all' => true],
    App\Application\Internit\ClienteBundle\ApplicationInternitClienteBundle::class => ['all' => true],
    App\Application\Internit\UnidadeClienteBundle\ApplicationInternitUnidadeClienteBundle::class => ['all' => true],
    App\Application\Internit\TipoClienteBundle\ApplicationInternitTipoClienteBundle::class => ['all' => true],
    App\Application\Internit\SolicitacaoBundle\ApplicationInternitSolicitacaoBundle::class => ['all' => true],
    App\Application\Internit\TipoSolicitacaoBundle\ApplicationInternitTipoSolicitacaoBundle::class => ['all' => true],
    App\Application\Internit\AndamentoSolicitacaoBundle\ApplicationInternitAndamentoSolicitacaoBundle::class => ['all' => true],
    App\Application\Internit\StatusSolicitacaoBundle\ApplicationInternitStatusSolicitacaoBundle::class => ['all' => true],
    App\Application\Internit\RespostaSolicitacaoBundle\ApplicationInternitRespostaSolicitacaoBundle::class => ['all' => true],
    App\Application\Internit\AgendamentoBundle\ApplicationInternitAgendamentoBundle::class => ['all' => true],
    App\Application\Internit\ProfissionalBundle\ApplicationInternitProfissionalBundle::class => ['all' => true],
    App\Application\Internit\ProfissaoBundle\ApplicationInternitProfissaoBundle::class => ['all' => true],
    App\Application\Internit\PeriodoDisponivelAgendamentoBundle\ApplicationInternitPeriodoDisponivelAgendamentoBundle::class => ['all' => true],
    App\Application\Internit\DiaIndisponivelAgendamentoBundle\ApplicationInternitDiaIndisponivelAgendamentoBundle::class => ['all' => true],
    App\Application\Internit\DownloadBundle\ApplicationInternitDownloadBundle::class => ['all' => true],
    App\Application\Internit\ComunicadoBundle\ApplicationInternitComunicadoBundle::class => ['all' => true],
    App\Application\Internit\PeriodoAgendamentoBundle\ApplicationInternitPeriodoAgendamentoBundle::class => ['all' => true],
    App\Application\Internit\DiaSemanaBundle\ApplicationInternitDiaSemanaBundle::class => ['all' => true],

];