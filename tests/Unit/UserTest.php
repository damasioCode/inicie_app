<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testGettingAllUsers(): void
    {
        $controller = new UserController();

        $request = Request::create(
            '/api/users', 
            'GET', 
            [
                'page' => 1, 
                'per_page' => 10
            ]);

        $response = $controller->getAllUsers($request);

        $response->assertStatus(200);
    }
}
