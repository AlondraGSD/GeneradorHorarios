<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            DO $$
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'teacher_category') THEN
                    CREATE TYPE teacher_category AS ENUM (
                        'Tiempo completo',
                        'Medio tiempo',
                        'Docentes de horas temporales sindicalizado',
                        'Docentes de horas temporales no sindicalizado',
                        'Docente de asignatura'
                    );
                END IF;
            END$$;
        ");

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('category', [ 
                'Tiempo completo',
                'Medio tiempo',
                'Docentes de horas temporales sindicalizado',
                'Docentes de horas temporales no sindicalizado',
                'Docente de asignatura'
            ])->default('Docente de asignatura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');

        DB::statement('DROP TYPE IF EXISTS teacher_category;');
    }
};
