<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'itemno';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['itemno','iteminventoryno','itemname','itemtype','itembrand','itemmodel','itempurchased','itemwarranty','itemremarks'];

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
	
	public function getAllItems(){
		$db = db_connect();
		$builder = $db->table('items');
		$builder->select('*');
        $builder->where('deleted_at',null);
		$records = $builder->get();
        $result = $records->getResult('array');
        $items = [
			"" => " -- Select One -- ",
		];
        foreach($result as $item){
			$items[$item['itemno']] = $item['itemname']." (".$item['iteminventoryno'].")";
		}
		return $items;
	}

    public function getAllAvailableItems(){
		$db = db_connect();
		$builder = $db->table('items');
		$builder->select('*');
        $builder->where('deleted_at',null);
		$records = $builder->get();
        $result = $records->getResult('array');
        $items = [
			"" => " -- Select One -- ",
		];
        foreach($result as $item){
            if($this->getAvailability($item['itemno'])){
                $items[$item['itemno']] = $item['itemname']." (".$item['iteminventoryno'].")";
            }
			
		}
		return $items;
	}

    public function getAvailability($itemno){
		$db = db_connect();
		$builder = $db->table('assignments');
		$builder->select('*');
        $builder->where('assignitemno',$itemno);
        $builder->where('deleted_at',null);
		$records = $builder->countAllResults();
		if($records > 0){
            return false;
        }
        else{
            return true;
        }
	}
}
