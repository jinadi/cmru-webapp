<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Database\Exceptions\DatabaseException;

use App\Models\ItemModel;

class Assignment extends ResourceController
{
	protected $modelName = 'App\Models\AssignmentModel';
    protected $format    = 'json'; 
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index(){
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        return $this->respond($this->model->findAll(), 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null){
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $data = $this->model->find($id);
        if(is_null($data)) {
            $response = [
                    'status' => 'error',
                    'message' => 'Item is not available to return.',
                    'errors' => $this->model->errors()				
                ];
            return $this->fail($response, 404);
        }
 		return $this->respond($data,200);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create(){
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
       	$data = [   
            'assignempno'=> $this->request->getPost('assignempno'),
            'assignitemno'=> $this->request->getPost('assignitemno'),
            'assignconfig'=> $this->request->getPost('assignconfig'),
            'assignuser'=> $sessiondata['username'],
        ];
		try{
            $this->itemmodel = new ItemModel();

		    if($this->itemmodel->getAvailability($data['assignitemno'])){
                $this->model->insert($data);
                return $this->respond([
                    'message' => 'Saved Successfully.',
                    'status' => 'success',
                    'data' => $data
                ],201);
            }
            else{
                $response = [
                    'status' => 'error',
                    'message' => 'Item is not available.',
                    'errors' => $this->model->errors()				
                ];
                return $this->fail($response , 409);
            }
			
		}
		catch(DatabaseException $e){
			$response = [
                'status' => 'error',
                'message' => 'Failed to save.',
                'errors' => $this->model->errors()				
            ];
            return $this->fail($response , 409);
		}
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     
    public function update($id = null){
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $data = [
            'iteminventoryno'=> $this->request->getPost('iteminventoryno'),
            'itemname'=> $this->request->getPost('itemname'),
            'itemtype'=> $this->request->getPost('itemtype'),
            'itembrand'=> $this->request->getPost('itembrand'),
            'itemmodel'=> $this->request->getPost('itemmodel'),
            'itempurchased'=> $this->request->getPost('itempurchased'),
            'itemwarranty'=> $this->request->getPost('itemwarranty'),
            'itemremarks'=> $this->request->getPost('itemremarks'),
        ];
  
        if ($this->model->where('itemno', $id)->set($data)->update() === false)
        {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update.',
                'errors' => $this->model->errors()	
            ];
            return $this->fail($response , 409);
        }
  
        return $this->respond(['message' => 'Updated Successfully'], 200);
    }
*/
    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null){
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
        $this->model->delete($id);
        return $this->respond(['message' => 'Saved Successfully'], 200);
    }
}
