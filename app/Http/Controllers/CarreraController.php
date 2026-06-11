<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carrera\StoreCarreraRequest;
use App\Http\Requests\Carrera\UpdateCarreraRequest;
use App\Models\Carrera;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Carreras')]
class CarreraController extends Controller
{
    #[OA\Get(
        path: '/api/carreras',
        summary: 'Listar carreras',
        tags: ['Carreras'],
        responses: [
            new OA\Response(response: 200, description: 'OK'),
        ]
    )]
    public function index()
    {
        $carreras = Carrera::all();

        return response()->json([
            'carreras' => $carreras,
        ]);
    }

    #[OA\Post(
        path: '/api/carreras',
        summary: 'Crear carrera',
        tags: ['Carreras'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['nombre'],
                properties: [
                    new OA\Property(property: 'nombre', type: 'string', example: 'Ingeniería en Sistemas'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: 'Created'),
        ]
    )]
    public function store(StoreCarreraRequest $request)
    {
        $carrera = Carrera::create($request->validated());

        return response()->json([
            'carrera' => $carrera,
        ]);
    }

    #[OA\Get(
        path: '/api/carreras/{carrera}',
        summary: 'Mostrar carrera',
        tags: ['Carreras'],
        responses: [
            new OA\Response(response: 200, description: 'OK'),
        ]
    )]
    public function show(Carrera $carrera)
    {
        return response()->json([
            'carrera' => $carrera,
        ]);
    }

    #[OA\Put(
        path: '/api/carreras/{carrera}',
        summary: 'Actualizar carrera',
        tags: ['Carreras'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'nombre', type: 'string', example: 'Ingeniería en Sistemas'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: 'OK'),
        ]
    )]
    public function update(UpdateCarreraRequest $request, Carrera $carrera)
    {
        $carrera->update($request->validated());

        return response()->json([
            'carrera' => $carrera,
        ]);
    }

    #[OA\Delete(
        path: '/api/carreras/{carrera}',
        summary: 'Eliminar carrera',
        tags: ['Carreras'],
        responses: [
            new OA\Response(response: 200, description: 'OK'),
        ]
    )]
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return response()->json([
            'message' => 'Carrera eliminada correctamente',
        ]);
    }
}
