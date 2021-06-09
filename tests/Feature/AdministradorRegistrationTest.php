<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdministradorRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('administrador/register');

        $response->assertStatus(200);
    }

    public function test_new_administradors_can_register()
    {
        $response = $this->post('administrador/register', [
            'name' => 'Test Administrador',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('administrador');
        $response->assertRedirect(route('administrador.dashboard'));
    }
}
