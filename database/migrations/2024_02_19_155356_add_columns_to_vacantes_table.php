<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            //
            $table->string('empresa');
            $table->string('titulo');
            $table->foreignId('signo_id')->constrained()->onDelete('cascade');
            $table->string('salario');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('horario_id')->constrained()->onDelete('cascade');
            $table->date('expiracion');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            //
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_horario_id_foreign');
            $table->dropForeign('vacantes_signo_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');

            $table->dropColumn(['empresa','titulo','signo_id','salario','categoria_id','horario_id','expiracion','descripcion','imagen','publicado', 'user_id']);
        });
    }
};
