<?php

namespace Features\app\Http\Controllers;

class TodoControllerTest extends \TestCase
{

    public function testUserCanCreateaTodo()
    {
        // Prepare
        $payload = [
            'title' => 'Titulo teste',
            'description' => 'Descricao teste'
        ];

        // Act
        $result = $this->post('/todos', $payload);

        // Assert
        $result->assertResponseStatus(500); // 500 = ERROR
    }

    public function testUserShouldSendCampos()
    {
        $payload = [
            'alguma' => 'coisa'
        ];

        $response = $this->post('/todos', $payload);

        $response->assertResponseStatus(422); // 422 = UNPROCESSABLE ENTITY
    }
}