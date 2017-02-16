<?php 

class About extends Model {

	public function getList($only_published = false){
		$sql = "select * from pages where 1";
		if($only_published){
			$sql .= " and is published = 1" ;
		}

		return $this->eb->query($sql) ;
	}

	public function getByAlias($alias){
		$alias = $this->db->escape($alias);
	}
}