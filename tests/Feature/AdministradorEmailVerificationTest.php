<?php

namespace Tests\Feature;

use App\Models\Administrador;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class AdministradorEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $administrador = Administrador::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($administrador, 'administrador')->get('administrador/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $administrador = Administrador::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'administrador.verification.verify',
            now()->addMinutes(60),
            ['id' => $administrador->id, 'hash' => sha1($administrador->email)]
        );

        $response = $this->actingAs($administrador, 'administrador')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($administrador->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('administrador.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $administrador = Administrador::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'administrador.verification.verify',
            now()->addMinutes(60),
            ['id' => $administrador->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($administrador, 'administrador')->get($verificationUrl);

        $this->assertFalse($administrador->fresh()->hasVerifiedEmail());
    }
}
