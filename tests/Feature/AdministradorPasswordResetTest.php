<?php

namespace Tests\Feature;

use App\Models\Administrador;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AdministradorPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('administrador/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $administrador = Administrador::factory()->create();

        $response = $this->post('administrador/forgot-password', [
            'email' => $administrador->email,
        ]);

        Notification::assertSentTo($administrador, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $administrador = Administrador::factory()->create();

        $response = $this->post('administrador/forgot-password', [
            'email' => $administrador->email,
        ]);

        Notification::assertSentTo($administrador, ResetPassword::class, function ($notification) {
            $response = $this->get('administrador/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $administrador = Administrador::factory()->create();

        $response = $this->post('administrador/forgot-password', [
            'email' => $administrador->email,
        ]);

        Notification::assertSentTo($administrador, ResetPassword::class, function ($notification) use ($administrador) {
            $response = $this->post('administrador/reset-password', [
                'token' => $notification->token,
                'email' => $administrador->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
