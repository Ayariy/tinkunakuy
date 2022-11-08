<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institucion')->insert([
            'tituloTrans' => '¿Pita kanchik?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'ki',
        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => '¿Quiénes somos?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'es',
        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => 'Who we are?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'en',
        ]);


        DB::table('institucion')->insert([
            'tituloTrans' => '¿Maypita kanchik?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'ki',
        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => '¿Dónde estamos?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'es',

        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => '¿Where we are?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'en',
        ]);



        DB::table('institucion')->insert([
            'tituloTrans' => '¿Imata shinanchik?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'ki',
        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => '¿Qué hacemos?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'es',
        ]);

        DB::table('institucion')->insert([
            'tituloTrans' => 'What we do?',
            'textoTrans' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            assumenda asperiores consequatur ullam maiores vitae vero repudiandae impedit exercitationem
            maxime soluta eligendi praesentium recusandae eum, omnis sequi et totam amet..',
            'codigoIdioma' => 'en',
        ]);
    }
}