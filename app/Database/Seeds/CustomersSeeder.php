<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\CustomerModel;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create('pt_BR');
        $model = new CustomerModel();

        // Limpa a tabela antes de semear
        $model->truncate();

        for ($i = 0; $i < 15; $i++) {
            $model->insert([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'document' => $faker->randomElement([
                    $faker->cpf(false),
                    $faker->cnpj(false),
                ]),
            ]);
        }
    }
}
