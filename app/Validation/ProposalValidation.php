<?php

namespace App\Validation;

use App\Models\ProposalModel;

class ProposalValidation
{
    public function getRules(): array
    {
        return [
            'customer_id' => [
                'label' => 'Cliente',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'O cliente é obrigatório.',
                    'integer'  => 'O cliente informado é inválido',
                ],
            ],

            'product' => [
                'label' => 'Produto',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'O produto é obrigatório',
                ],
            ],

            'monthly_value' => [
                'label' => 'Valor mensal',
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'O valor mensal é obrigatório.',
                    'decimal'  => 'O valor mensal deve ser um número válido',
                ],
            ],

        ];
    }
}
