<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\ProposalModel;
use App\Models\CustomerModel;

class ProposalsSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create('pt_BR');

        $proposalModel = new ProposalModel();
        $customerModel = new CustomerModel();

        // limpa tabela
        $proposalModel->truncate();

        $customers = $customerModel->findAll();

        if (empty($customers)) {
            return;
        }

        foreach ($customers as $customer) {
            $proposalModel->insert([
                'customer_id'   => $customer['id'],
                'product'       => $faker->words(2, true),
                'monthly_value' => $faker->randomFloat(2, 50, 500),
                'status'        => ProposalModel::STATUS_DRAFT,
                'origin'        => $faker->randomElement(ProposalModel::ORIGINS),
                'version'       => 1,
            ]);
        }
    }
}
