<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('RegistroPagosSeeder');
		$this->call('PagosSeeder');
		$this->call('ProductosSeeder');
		$this->call('ClientesSeeder');
		$this->call('EmpresasSeeder');
                $this->command->info('ALTA REGISTRO PAGOS');
	}

}
class EmpresasSeeder extends Seeder{
    public function run() {
        $faker=  Faker::create();
        for ($i=0;$i<10;$i++) {
            
        DB::table('empresas')->insert(
                    array(
                        'id'=>'0',
                        'empresa'=>$faker->name($nbDigits =NULL),
                        'nombre_fiscal'=>$faker->name($gender ='COMPUTADORA'|'IMPRESORA'|'CAMARA'|'LAP TOP'),
                        'rfc'=>$faker->name($startDate = '-1 years', $endDate = 'now'),
                        'calle'=>$faker->randomNumber($nbDigits =NULL),
                        'numero'=>$faker->randomNumber($nbDigits =NULL),
                        'colonia'=>$faker->name($nbDigits =NULL),
                        'poblacion'=>$faker->name(),
                        'estado'=>$faker->name(),
                        'codigo_postal'=>$faker->randomNumber(),
                        'nombre_contacto'=>$faker->email(),
                        'telefono'=>$faker->phoneNumber($nbDigits =NULL),
                        'observacion'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
                    )

                    );
            
        }
    }
}
class ClientesSeeder extends Seeder{
    public function run() {
        $faker=  Faker::create();
        for ($i=0;$i<20;$i++) {
            
        DB::table('clientes')->insert(
                    array(
                        'id'=>'0',
                        'id_empresa'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt'),
                        'nombre_cliente'=>$faker->name($gender ='COMPUTADORA'|'IMPRESORA'|'CAMARA'|'LAP TOP'),
                        'calle'=>$faker->firstName($startDate = '-1 years', $endDate = 'now'),
                        'numero'=>$faker->randomNumber($nbDigits =NULL),
                        'colonia'=>$faker->name(),
                        'poblacion'=>$faker->name($nbDigits =NULL),
                        'estado'=>$faker->name(),
                        'codigo_postal'=>$faker->randomNumber(),
                        'correo_electronico'=>$faker->email(),
                        'telefono_oficina'=>$faker->phoneNumber($nbDigits =NULL),
                        'telefono_particular'=>$faker->phoneNumber(),
                        'telefono_movil'=>$faker->phoneNumber(),
                        'observacion'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
                    )

                    );
        }
    }
}
class ProductosSeeder extends Seeder{
    public function run() {
        $faker=  Faker::create();
        for ($i=0;$i<20;$i++) {
            
            DB::table('productos')->insert(
                    array(
                        'id'=>'0',
                        'id_cliente'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt'),
                        'producto'=>$faker->name($gender ='COMPUTADORA'|'IMPRESORA'|'CAMARA'|'LAP TOP'),
                        'marca'=>$faker->firstName($startDate = '-1 years', $endDate = 'now'),
                        'serie'=>$faker->randomNumber($nbDigits =NULL),
                        'identificador_producto'=>$faker->randomNumber($nbDigits =NULL),
                        'credito'=>$faker->randomNumber($nbDigits =NULL),
                        'fecha_inicio_credito'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                        'fecha_respuesta'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                        'hora_respuesta'=>$faker->randomNumber($nbDigits =NULL),
                        'mensualidad'=>$faker->randomNumber($nbDigits =NULL),
                        'id_device'=>$faker->randomNumber($nbDigits =NULL),
                        'respuesta_device'=>$faker->randomNumber($nbDigits =NULL),
                        'serie'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
                    )

                    );
        }
        
    }
}
class PagosSeeder extends Seeder{
    public function run() {
        $faker=  Faker::create();
        for ($i=0;$i<15;$i++) {
            DB::table('pagos')->insert(
                    array(
                        'id'=>'0',
                        'id_producto'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt'),
                        'numero_pago'=>$faker->randomNumber($nbDigits =NULL),
                        'fecha_recepcion_pago'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                        'pago_recibido'=>$faker->randomNumber($nbDigits =NULL),
                        'pago_vencido'=>$faker->randomNumber($nbDigits =NULL),
                        'id_empresa'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt')
                    )

                    );
        }
        
    }
}
class RegistroPagosSeeder extends Seeder{
    
    public function run() {
        $faker = Faker::create();
        for ($i=0;$i<60;$i++) {
            
        DB::table('registro_pagos')->insert(
                array(
                    'id'=>'0',
                    'id_producto'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt'),
                    'id_cliente'=>$faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
                    'pago_recibido'=>$faker->randomNumber($nbDigits =NULL),
                    'fecha_pago_recibido'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                    'mes_correspondiente'=>$faker->monthName($max = 'now'),
                    'empresa'=>$faker->biasedNumberBetween($min = 1, $max = 11, $function = 'sqrt'),
                    'conclusion'=>$faker->text($maxNbChars = 10),
                )
                
                );
        }
        
    }
    
}