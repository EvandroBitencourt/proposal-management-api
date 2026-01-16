<?php

namespace App\Controllers\Api\V1;

use App\Controllers\BaseController;
use App\Models\ProposalModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProposalWorkflowController extends BaseController
{
    protected ProposalModel $model;

    public function __construct()
    {
        $this->model = new ProposalModel();
    }

    public function submit(int $id)
    {
        $proposal = $this->model->find($id);

        if (!$proposal) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON([
                    'message' => 'Proposta não encontrada'
                ]);
        }

        if ($proposal['status'] !== ProposalModel::STATUS_DRAFT) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                ->setJSON([
                    'message' => 'A proposta não pode ser enviada neste status'
                ]);
        }

        $this->model->update($id, [
            'status'  => ProposalModel::STATUS_SUBMITTED,
            'version' => $proposal['version'] + 1,
        ]);

        return $this->response->setJSON([
            'id'     => $id,
            'status' => ProposalModel::STATUS_SUBMITTED,
        ]);
    }
}
