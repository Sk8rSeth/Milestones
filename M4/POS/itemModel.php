<?php 

class ItemModel {

	public function fetchAll() {
		$sql = "
			SELECT *
			FROM item
			";

		$stmt = DB::prepare($sql);
		DB::execute($stmt);
		$results = $stmt->fetchAll();

		$items = [];
		foreach($results as $row) {
			$items[] = $row;
		}

		return $items;
	}
}

?>