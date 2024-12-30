<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{		
	public function inventory(){
        $db = db_connect();
		$builder = $db->table('items');
		$builder->select('*');
		$builder->where('items.deleted_at',null);
		$records = $builder->get();
		$result = $records->getResult('array');
        $data = array();
        $i = 0;
        foreach($result as $item){
            $data[$i]['item'] = $item;
            $data[$i]['assignment'] = $this->inventory_status_peritem($item['itemno']);
            $i++;
        };
        return $data;
	}

    public function inventory_status_peritem($itemno){
        $db = db_connect();
		$builder = $db->table('assignments');
		$builder->select('empName,workingLocation,assignments.updated_at');
        $builder->join('officer','assignempno=empno');
        $builder->where('assignments.assignitemno',$itemno);
		$builder->where('assignments.deleted_at',null);
        $builder->where('officer.deleted_at',null);
		$records = $builder->get();
		$result = $records->getResult('array');
        return $result;
	}
	
}
