<?php

namespace App\Application\Internit\SacBundle\Controller;

use App\Application\Internit\SacBundle\Repository\SacRepository;
use App\Application\Internit\SacBundle\Entity\Sac;

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

#[Route('/api/sac', name: 'api_sac_')]
#[OA\Tag(name: 'Sac')]
#[ACL\Api(enable: true, title: 'Sac', description: 'Permissões do modulo Sac')]
class SacApiController extends BaseApiController
{

    public function getClass(): string
    {
        return Sac::class;
    }

    public function getRepository(): ObjectRepository
    {
        return $this->doctrine->getManager()->getRepository($this->getClass());
    }

    /** ****************************************************************************************** */
    /**
     * Recupera a coleção de recursos — Sac.
     * Recupera a coleção de recursos — Sac.
     * @throws QueryException
     */
    #[OA\Parameter( name: 'pagina', description: 'O número da página da coleção', in: 'query', required: false, allowEmptyValue: true, example: 1)]
    #[OA\Parameter( name: 'paginaTamanho', description: 'O tamanho da página da coleção', in: 'query', required: false, example: 10)]
    #[OA\Response(
        response: 200,
        description: 'Retorna Coleção de recursos Sac',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Listar', description: 'Listar Sac')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess(actionName: "listAction");

        $filter = new FilterDoctrine(
            repository:  $this->getRepository(),
            request: $request,
            attributesFilters: [
                'id', 'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
            ]
        );

        $response = $this->objectTransformer->ObjectToJson( $filter->getResult()->data, [
            'id', 'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
        ]);

        return $this->json([
            'resultado' => $response,
            'paginacao' => $filter->getResult()->paginator,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Cria o Recurso — Sac.
     * Cria o Recurso — Sac.
     */
    #[OA\Response(
        response: 201,
        description: 'Retorna novo recurso Sac',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'create', methods: ['POST'])]
    #[ACL\Api(enable: true, title: 'Criar', description: 'Criar Sac')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        if(!$request->getContent())
            return $this->json(['status' => false, 'message' => 'Dados inválidos!'], 400);

        /** Tranforma Corpo da requisação em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject( $this->getClass(), $request , [
            'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
        ]);

        return $this->json($response, 201);
    }

    /** ****************************************************************************************** */
    /**
     * Recupera o recurso — Sac.
     * Recupera o recurso — Sac.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Sac',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Visualizar', description: 'Visualizar Sac')]
    public function showAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("showAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Sac não encontrado!'], 404);

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
     * Substitui o recurso — Sac.
     * Substitui o recurso — Sac.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Sac',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
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
                new OA\Property(property: 'assunto', type: 'string'),
                new OA\Property(property: 'mensagem', type: 'string'),
                new OA\Property(property: 'departamento', type: 'integer' ),
                new OA\Property(property: 'unidade', type: 'integer' ),
                new OA\Property(property: 'cliente', type: 'integer' ),
                new OA\Property(property: 'anexo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('/{id}', name: 'edit', methods: ['PUT','PATCH'])]
    #[ACL\Api(enable: true, title: 'Editar', description: 'Editar Sac')]
    public function editAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("editAction");

        $object = $this->getRepository()->find($id);
        if(!$object)
            return $this->json(['status' => false, 'message' => 'Sac não encontrado!'], 404);

        /** Transforma corpo da requisição em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject($object, $request, [
            'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
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
            'id', 'assunto', 'mensagem', 'departamento', 'unidade', 'cliente', 'anexo', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
    * Remove o recurso — Sac.
    * Remove o recurso — Sac.
    */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(response: 204, description: 'Recurso excluído')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    #[ACL\Api(enable: true, title: 'Deletar', description: 'Deletar Sac')]
    public function deleteAction(mixed $id): Response
    {
        $this->validateAccess("deleteAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Sac não encontrado.'], 404);

        $em = $this->doctrine->getManager();
        $em->remove($object);
        $em->flush();

        return $this->json(['status' => true, 'message' => 'Sac removido com sucesso.'], 204);
    }

}