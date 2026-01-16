<?php

namespace App\Validation;

class CustomerValidation
{
    public function getRules(): array
    {
        return [
            'name' => [
                'label' => 'Nome',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'O nome é obrigatório.',
                ],
            ],

            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|valid_email|max_length[255]|is_unique[customer.email]',
                'errors' => [
                    'required'    => 'O e-mail é obrigatório.',
                    'valid_email' => 'Informe um e-mail válido.',
                    'is_unique'   => 'Este e-mail já está cadastrado.',
                ],
            ],

            'document' => [
                'label' => 'Documento',
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'O documento é obrigatório.',
                ],
            ],
        ];
    }
}
