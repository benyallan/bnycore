<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateadministradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $admin = new Administrador;
        $admin->name = "Administrador";
        $admin->email = "admin@teste.com";
        $admin->password = Hash::make("admin123");
        $admin->save();

        $role = Role::create(['guard_name' => 'administrador', 'name' => 'Super-Admin']);
        $admin->assignRole($role);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administradors');
    }
}
