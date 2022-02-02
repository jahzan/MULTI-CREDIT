<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class Departamentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = array(
            array('id' => '5','name' => 'ANTIOQUIA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'ATLÁNTICO','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => 'BOGOTÁ, D.C.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','name' => 'BOLÍVAR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','name' => 'BOYACÁ','created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','name' => 'CALDAS','created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','name' => 'CAQUETÁ','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','name' => 'CAUCA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','name' => 'CESAR','created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','name' => 'CÓRDOBA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','name' => 'CUNDINAMARCA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','name' => 'CHOCÓ','created_at' => NULL,'updated_at' => NULL),
            array('id' => '41','name' => 'HUILA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '44','name' => 'LA GUAJIRA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '47','name' => 'MAGDALENA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '50','name' => 'META','created_at' => NULL,'updated_at' => NULL),
            array('id' => '52','name' => 'NARIÑO','created_at' => NULL,'updated_at' => NULL),
            array('id' => '54','name' => 'NORTE DE SANTANDER','created_at' => NULL,'updated_at' => NULL),
            array('id' => '63','name' => 'QUINDIO','created_at' => NULL,'updated_at' => NULL),
            array('id' => '66','name' => 'RISARALDA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '68','name' => 'SANTANDER','created_at' => NULL,'updated_at' => NULL),
            array('id' => '70','name' => 'SUCRE','created_at' => NULL,'updated_at' => NULL),
            array('id' => '73','name' => 'TOLIMA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '76','name' => 'VALLE DEL CAUCA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '81','name' => 'ARAUCA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '85','name' => 'CASANARE','created_at' => NULL,'updated_at' => NULL),
            array('id' => '86','name' => 'PUTUMAYO','created_at' => NULL,'updated_at' => NULL),
            array('id' => '88','name' => 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '91','name' => 'AMAZONAS','created_at' => NULL,'updated_at' => NULL),
            array('id' => '94','name' => 'GUAINÍA','created_at' => NULL,'updated_at' => NULL),
            array('id' => '95','name' => 'GUAVIARE','created_at' => NULL,'updated_at' => NULL),
            array('id' => '97','name' => 'VAUPÉS','created_at' => NULL,'updated_at' => NULL),
            array('id' => '99','name' => 'VICHADA','created_at' => NULL,'updated_at' => NULL)
          );

          foreach ($departamentos as $departamento) {
              Departamento::create($departamento);
          }
          
    }
}
