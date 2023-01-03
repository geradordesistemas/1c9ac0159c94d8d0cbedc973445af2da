<?php

namespace App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Controller;

use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Repository\PeriodoDisponivelAgendamentoRepository;
use App\Application\Internit\PeriodoDisponivelAgendamentoBundle\Entity\PeriodoDisponivelAgendamento;

use App\Application\Project\ContentBundle\Controller\Base\BaseApiController;
use App\Application\Project\ContentBundle\Service\FilterDoctrine;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\QueryException;
use OpenApi\Attributes as OA;

#[Route('/api/periodoDisponivelAgendamento', name: 'api_periodoDisponivelAgendamento_')]
#[OA\Tag(name: 'PeriodoDisponivelAgendamento')]
#[ACL\Api(enable: true, title: 'PeriodoDisponivelAgendamento', description: 'Permissões do modulo PeriodoDisponivelAgendamento')]
class PeriodoDisponivelAgendamentoApiController extends BaseApiController
{

    public function getClass(): string
    {
        return PeriodoDisponivelAgendamento::class;
    }

    public function getRepository(): ObjectRepository
    {
        return $this->doctrine->getManager()->getRepository($this->getClass());
    }

    /** ****************************************************************************************** */
    /**
     * Recupera a coleção de recursos — PeriodoDisponivelAgendamento.
     * Recupera a coleção de recursos — PeriodoDisponivelAgendamento.
     * @throws QueryException
     */
    #[OA\Parameter( name: 'pagina', description: 'O número da página da coleção', in: 'query', required: false, allowEmptyValue: true, example: 1)]
    #[OA\Parameter( name: 'paginaTamanho', description: 'O tamanho da página da coleção', in: 'query', required: false, example: 10)]
    #[OA\Response(
        response: 200,
        description: 'Retorna Coleção de recursos PeriodoDisponivelAgendamento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Listar', description: 'Listar PeriodoDisponivelAgendamento')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess(actionName: "listAction");

        $filter = new FilterDoctrine(
            repository:  $this->getRepository(),
            request: $request,
            attributesFilters: [
                'id', 'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
            ]
        );

        $response = $this->objectTransformer->ObjectToJson( $filter->getResult()->data, [
            'id', 'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        return $this->json([
            'resultado' => $response,
            'paginacao' => $filter->getResult()->paginator,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Cria o Recurso — PeriodoDisponivelAgendamento.
     * Cria o Recurso — PeriodoDisponivelAgendamento.
     */
    #[OA\Response(
        response: 201,
        description: 'Retorna novo recurso PeriodoDisponivelAgendamento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'create', methods: ['POST'])]
    #[ACL\Api(enable: true, title: 'Criar', description: 'Criar PeriodoDisponivelAgendamento')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        if(!$request->getContent())
            return $this->json(['status' => false, 'message' => 'Dados inválidos!'], 400);

        /** Tranforma Corpo da requisação em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject( $this->getClass(), $request , [
            'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        return $this->json($response, 201);
    }

    /** ****************************************************************************************** */
    /**
     * Recupera o recurso — PeriodoDisponivelAgendamento.
     * Recupera o recurso — PeriodoDisponivelAgendamento.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso PeriodoDisponivelAgendamento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Visualizar', description: 'Visualizar PeriodoDisponivelAgendamento')]
    public function showAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("showAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'PeriodoDisponivelAgendamento não encontrado!'], 404);

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
     * Substitui o recurso — PeriodoDisponivelAgendamento.
     * Substitui o recurso — PeriodoDisponivelAgendamento.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso PeriodoDisponivelAgendamento',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'quatidadeAgendamentos', type: 'integer'),
                new OA\Property(property: 'disponivel', type: 'boolean'),
                new OA\Property(property: 'diaSemana', type: 'integer' ),
                new OA\Property(property: 'periodoAgendamento', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('/{id}', name: 'edit', methods: ['PUT','PATCH'])]
    #[ACL\Api(enable: true, title: 'Editar', description: 'Editar PeriodoDisponivelAgendamento')]
    public function editAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("editAction");

        $object = $this->getRepository()->find($id);
        if(!$object)
            return $this->json(['status' => false, 'message' => 'PeriodoDisponivelAgendamento não encontrado!'], 404);

        /** Transforma corpo da requisição em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject($object, $request, [
            'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        /** Persiste o objeto */
        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'quatidadeAgendamentos', 'disponivel', 'diaSemana', 'periodoAgendamento', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
    * Remove o recurso — PeriodoDisponivelAgendamento.
    * Remove o recurso — PeriodoDisponivelAgendamento.
    */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(response: 204, description: 'Recurso excluído')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    #[ACL\Api(enable: true, title: 'Deletar', description: 'Deletar PeriodoDisponivelAgendamento')]
    public function deleteAction(mixed $id): Response
    {
        $this->validateAccess("deleteAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'PeriodoDisponivelAgendamento não encontrado.'], 404);

        $em = $this->doctrine->getManager();
        $em->remove($object);
        $em->flush();

        return $this->json(['status' => true, 'message' => 'PeriodoDisponivelAgendamento removido com sucesso.'], 204);
    }

}