<?php

namespace Tests\Feature;

use App\Models\Administrador;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdministradorAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('administrador/login');

        $response->assertStatus(200);
    }

    public function test_administradors_can_authenticate_using_the_login_screen()
    {
        $administrador = Administrador::factory()->create();

        $response = $this->post('administrador/login', [
            'email' => $administrador->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('administrador');
        $response->assertRedirect(route('administrador.dashboard'));
    }

    public function test_administradors_can_not_authenticate_with_invalid_password()
    {
        $administrador = Administrador::factory()->create();

        $this->post('administrador/login', [
            'email' => $administrador->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('administrador');
    }
}
