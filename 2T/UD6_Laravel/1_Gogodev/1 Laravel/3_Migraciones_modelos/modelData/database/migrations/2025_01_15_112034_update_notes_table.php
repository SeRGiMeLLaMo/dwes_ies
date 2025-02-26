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
        Schema::table('notes', function (Blueprint $table) {
            $table->string('author');// tras la  migracion se añade la columna author
            //tambien se puede eliminar una columna:
            $table->dropColumn(['done']); //arrau con las columnas a eliminar
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn(['author']);
            //$table->date('deadline'); // no es necesario ya que en el down de la primera migracion se elimina la tabla
        }); 
    }
};
