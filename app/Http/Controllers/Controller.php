<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Panel Laboral API',
    description: 'API para el sistema Panel Laboral',
    contact: new OA\Contact(email: '[EMAIL_ADDRESS]')
)]
#[OA\Server(url: 'http://panel-laboral.test', description: 'Servidor Principal')]
#[OA\SecurityScheme(
    securityScheme: 'bearerAuth',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'JWT',
    description: 'Ingresa directamente el access_token obtenido de la respuesta de Login o Activación.'
)]
abstract class Controller
{
    //
}
