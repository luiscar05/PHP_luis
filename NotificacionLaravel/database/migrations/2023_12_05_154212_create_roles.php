<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       $rol1=Role::create(['name'=>'admin']);
       $rol2=Role::create(['name'=>'estudiante']);
       $rol3=Role::create(['name'=>'profesor']);
       $user=User::find(1);
       $user->assignRole($rol1);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
