<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * Тест метода index в UserController
     */
    public function test_user_controller_index_method(): void
    {
        $response = $this->getJson('/api/users'); 

        $response->assertStatus(200);

        // Проверяем структуру данных
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                    'description' => [
                        '*' => [
                            'id',
                            'name',
                        ],
                    ],
                ],
            ],
        ]);

        // Проверяем, что навыки не пустые
        $responseData = $response->json('data');
        foreach ($responseData as $user) {
            $this->assertNotEmpty($user['description']);
        }
    }
}
