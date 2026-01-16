<?php

namespace App\Controllers\Api\V1;

use App\Models\ProposalModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProposalController extends ResourceController
{
    protected $modelName = ProposalModel::class;
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return $this->respond(
            data: $this->model
                ->orderBy('created_at', 'DESC')
                ->findAll(),
            status: ResponseInterface::HTTP_OK
        );
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $proposal = $this->model->asObject()->find($id);

        if ($proposal === null) {
            return $this->failNotFound(code: ResponseInterface::HTTP_NOT_FOUND);
        }

        return $this->respond(
            data: $proposal,
            status: ResponseInterface::HTTP_OK
        );
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $inputRequest = esc($this->request->getJSON(assoc: true));

        $inputRequest['status']  = ProposalModel::STATUS_DRAFT;
        $inputRequest['version'] = 1;

        $id = $this->model->insert($inputRequest);

        $proposalCreated = $this->model->find($id);

        return $this->respondCreated(
            data: $proposalCreated,
            message: 'Sucesso!'
        );
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
