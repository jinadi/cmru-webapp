<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficerModel extends Model
{
    protected $table            = 'officer';
    protected $primaryKey       = 'empno';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['empno','empName','workingLocation','designation','contactNo','email'];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
	
	public function getAllOfficers(){
		$db = db_connect();
		$builder = $db->table('officer');
		$builder->select('*');
        $builder->where('deleted_at',null);
		$records = $builder->get();
        $result = $records->getResult('array');
        $officers = [
			"" => " -- Select One -- ",
		];
        foreach($result as $officer){
			$officers[$officer['empno']] = $officer['empno']." - ".$officer['empName'];
		}
		return $officers;
	}
}
