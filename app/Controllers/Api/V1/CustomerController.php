<?php

namespace App\Controllers\Api\V1;

use App\Models\CustomerModel;
use App\Validation\CustomerValidation;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class CustomerController extends ResourceController
{
    protected $modelName = CustomerModel::class;
    protected $format    = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return $this->respond(
            data: $this->model->orderBy('name', 'ASC')->findAll(),
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
        $customer = $this->model->asObject()->find($id);

        if ($customer === null) {
            return $this->failNotFound(code: ResponseInterface::HTTP_NOT_FOUND);
        }

        return $this->respond(data: $customer, status: ResponseInterface::HTTP_OK);
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
        $rules = (new CustomerValidation)->getRules();

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $inputRequest = esc($this->request->getJSON(assoc: true));

        $id = $this->model->insert($inputRequest);

        $customerCreated = $this->model->find($id);

        return $this->respondCreated(data: $customerCreated, message: 'Sucesso!');
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
        $rules = (new CustomerValidation)->getRules($id);

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $inputRequest = esc($this->request->getJSON(assoc: true));

        $this->model->update($id, $inputRequest);

        $customer = $this->model->find($id);

        return $this->respondUpdated(data: $customer, message: 'Atualizado com sucesso!');
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
        $customer = $this->model->find($id);

        if ($customer === null) {
            return $this->failNotFound(code: ResponseInterface::HTTP_NOT_FOUND);
        }

        $this->model->delete($id);

        return $this->respondDeleted();
    }
}
