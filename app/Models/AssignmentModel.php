<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $table            = 'assignments';
    protected $primaryKey       = 'assignid';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['assignitemno','assignempno','assignconfig','assignuser'];

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
    

    public function getAllAssignments(){
		$db = db_connect();
		$builder = $db->table('assignments');
		$builder->select('*');
        $builder->join("officer","assignempno=empno");
        $builder->join("items","assignitemno=itemno");
        $builder->where('assignments.deleted_at',null);
        $builder->where('officer.deleted_at',null);
        $builder->where('items.deleted_at',null);
        $builder->orderBy("assignments.assignempno","ASC");
		$records = $builder->get();
        $result = $records->getResult('array');
        $assignments = [
			" " => " -- Select One -- ",
		];
        foreach($result as $assignment){
			$assignments[$assignment['assignid']] = "Emp No: ".$assignment['assignempno']." (".$assignment['empName'].")";
            $assignments[$assignment['assignid']] .= " ==> ".$assignment['itemname']." (".$assignment['iteminventoryno'].")";
		}
		return $assignments;
	} 
}
