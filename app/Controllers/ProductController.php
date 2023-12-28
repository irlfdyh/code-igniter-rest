<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{

    use ResponseTrait;

    public function index(): ResponseInterface
    {
        $model = new ProductModel();
        $data['product'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    public function create(): ResponseInterface
    {
        $model = new ProductModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price')
        ];

        $model->insert($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Product data added successfully'
            ]
        ];

        return $this->respondCreated($response);
    }

    public function show($id = null): ResponseInterface
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Product not found');
        }
    }

    public function update($id = null): ResponseInterface
    {
        $model = new ProductModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price')
        ];
        $model->update($id, $data);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Product data updated successfully'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id = null): ResponseInterface {
        $model = new ProductModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data)
        {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Product data deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else
        {
            return $this->failNotFound('Product not found');
        }
    }

}
