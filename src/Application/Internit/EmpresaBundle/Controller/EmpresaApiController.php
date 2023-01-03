<?php

namespace App\Application\Internit\EmpresaBundle\Controller;

use App\Application\Internit\EmpresaBundle\Repository\EmpresaRepository;
use App\Application\Internit\EmpresaBundle\Entity\Empresa;

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

#[Route('/api/empresa', name: 'api_empresa_')]
#[OA\Tag(name: 'Empresa')]
#[ACL\Api(enable: true, title: 'Empresa', description: 'Permissões do modulo Empresa')]
class EmpresaApiController extends BaseApiController
{

    public function getClass(): string
    {
        return Empresa::class;
    }

    public function getRepository(): ObjectRepository
    {
        return $this->doctrine->getManager()->getRepository($this->getClass());
    }

    /** ****************************************************************************************** */
    /**
     * Recupera a coleção de recursos — Empresa.
     * Recupera a coleção de recursos — Empresa.
     * @throws QueryException
     */
    #[OA\Parameter( name: 'pagina', description: 'O número da página da coleção', in: 'query', required: false, allowEmptyValue: true, example: 1)]
    #[OA\Parameter( name: 'paginaTamanho', description: 'O tamanho da página da coleção', in: 'query', required: false, example: 10)]
    #[OA\Response(
        response: 200,
        description: 'Retorna Coleção de recursos Empresa',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Listar', description: 'Listar Empresa')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess(actionName: "listAction");

        $filter = new FilterDoctrine(
            repository:  $this->getRepository(),
            request: $request,
            attributesFilters: [
                'id', 'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
            ]
        );

        $response = $this->objectTransformer->ObjectToJson( $filter->getResult()->data, [
            'id', 'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
        ]);

        return $this->json([
            'resultado' => $response,
            'paginacao' => $filter->getResult()->paginator,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Cria o Recurso — Empresa.
     * Cria o Recurso — Empresa.
     */
    #[OA\Response(
        response: 201,
        description: 'Retorna novo recurso Empresa',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'create', methods: ['POST'])]
    #[ACL\Api(enable: true, title: 'Criar', description: 'Criar Empresa')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        if(!$request->getContent())
            return $this->json(['status' => false, 'message' => 'Dados inválidos!'], 400);

        /** Tranforma Corpo da requisação em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject( $this->getClass(), $request , [
            'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
        ]);

        return $this->json($response, 201);
    }

    /** ****************************************************************************************** */
    /**
     * Recupera o recurso — Empresa.
     * Recupera o recurso — Empresa.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Empresa',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Visualizar', description: 'Visualizar Empresa')]
    public function showAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("showAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Empresa não encontrado!'], 404);

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'id', 'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
     * Substitui o recurso — Empresa.
     * Substitui o recurso — Empresa.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso Empresa',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
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
                new OA\Property(property: 'nome', type: 'string'),
                new OA\Property(property: 'email', type: 'string'),
                new OA\Property(property: 'telefone', type: 'string'),
                new OA\Property(property: 'cep', type: 'string'),
                new OA\Property(property: 'estado', type: 'string'),
                new OA\Property(property: 'cidade', type: 'string'),
                new OA\Property(property: 'bairro', type: 'string'),
                new OA\Property(property: 'rua', type: 'string'),
                new OA\Property(property: 'numero', type: 'string'),
                new OA\Property(property: 'complemento', type: 'string'),
                new OA\Property(property: 'logo', type: 'integer' ),
            ],
            type: 'object'
        )
    )]
    #[Route('/{id}', name: 'edit', methods: ['PUT','PATCH'])]
    #[ACL\Api(enable: true, title: 'Editar', description: 'Editar Empresa')]
    public function editAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("editAction");

        $object = $this->getRepository()->find($id);
        if(!$object)
            return $this->json(['status' => false, 'message' => 'Empresa não encontrado!'], 404);

        /** Transforma corpo da requisição em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject($object, $request, [
            'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
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
            'id', 'nome', 'email', 'telefone', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'numero', 'complemento', 'logo', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
    * Remove o recurso — Empresa.
    * Remove o recurso — Empresa.
    */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(response: 204, description: 'Recurso excluído')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    #[ACL\Api(enable: true, title: 'Deletar', description: 'Deletar Empresa')]
    public function deleteAction(mixed $id): Response
    {
        $this->validateAccess("deleteAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'Empresa não encontrado.'], 404);

        $em = $this->doctrine->getManager();
        $em->remove($object);
        $em->flush();

        return $this->json(['status' => true, 'message' => 'Empresa removido com sucesso.'], 204);
    }

}