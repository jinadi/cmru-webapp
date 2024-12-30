<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\OfficerModel;
use App\Models\AssignmentModel;

class Mainapp extends BaseController
{
    public function index(): string
    {
		$session = \Config\Services::session();
		$session->destroy();
        return view('login');
    }
	
	public function home(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        return view('home',$data);
    }
	
	public function addofficer(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        return view('addofficer',$data);
    }
	
	public function editofficer(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
		$this->officermodel = new OfficerModel();
		$data['officers'] = $this->officermodel->getAllOfficers();
        return view('editofficer',$data);
    }
    
    public function additem(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        $this->officermodel = new OfficerModel();
		$data['officers'] = $this->officermodel->getAllOfficers();
        
        return view('additem',$data);
    }

    public function addassignment(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        $this->officermodel = new OfficerModel();
		$data['officers'] = $this->officermodel->getAllOfficers();
        $this->itemmodel = new ItemModel();
		$data['items'] = $this->itemmodel->getAllAvailableItems();
        return view('addassignment',$data);
    }

    public function edititem(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        $this->itemmodel = new ItemModel();
		$data['items'] = $this->itemmodel->getAllItems();
        return view('edititem',$data);
    }

    public function editassignment(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
        $this->officermodel = new OfficerModel();
		$data['officers'] = $this->officermodel->getAllOfficers();
        $this->assignmentmodel = new AssignmentModel();
		$data['assignments'] = $this->assignmentmodel->getAllAssignments();
        $this->itemmodel = new ItemModel();
		$data['items'] = $this->itemmodel->getAllItems();
        return view('editassignment',$data);
    }

    public function inventory(): string
    {
		$session = \Config\Services::session();
        $sessiondata = $session->get();
        if(!(isset($sessiondata['logged'])) || !$sessiondata['logged']){
            $this->response->redirect(base_url()); 
            return false;
        }
		$data['username'] = $sessiondata['username'];
    /*    $this->officermodel = new OfficerModel();
		$data['officers'] = $this->officermodel->getAllOfficers();
        $this->assignmentmodel = new AssignmentModel();
		$data['assignments'] = $this->assignmentmodel->getAllAssignments();
        $this->itemmodel = new ItemModel();
		$data['items'] = $this->itemmodel->getAllItems(); */
        return view('inventory',$data);
    }

}
