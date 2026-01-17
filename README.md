# Proposal Management API

API REST para gerenciamento de propostas comerciais.

Projeto desenvolvido como teste técnico para vaga de Desenvolvedor Backend PHP,
utilizando CodeIgniter 4 e MySQL.

## Tecnologias
- PHP 8.1+
- CodeIgniter 4
- MySQL
- Composer

## Funcionalidades
- Cadastro de clientes
- Cadastro de propostas
- Fluxo de status controlado:
  DRAFT → SUBMITTED → APPROVED / REJECTED
- Cancelamento de proposta
- Controle de idempotência via header Idempotency-Key
- Controle de concorrência via versão (If-Match)
- Auditoria automática de mudanças de status
- Exclusão lógica
- Listagem com filtros e paginação

## Endpoints principais
- POST /api/v1/customer
- GET /api/v1/customer/{id}
- POST /api/v1/proposal
- GET /api/v1/proposal
- GET /api/v1/proposal/{id}
- POST /api/v1/proposal/{id}/submit
- POST /api/v1/proposal/{id}/approve
- POST /api/v1/proposal/{id}/reject
- POST /api/v1/proposal/{id}/cancel
- GET /api/v1/proposal/{id}/auditoria

## Execução local
1. composer install
2. Configurar o arquivo .env
3. php spark migrate
4. php spark db:seed
5. php spark serve

## Observações
Os testes automatizados foram iniciados com PHPUnit.
A prioridade do projeto foi garantir a implementação completa das regras de negócio
e o funcionamento correto da API conforme solicitado no teste técnico.
