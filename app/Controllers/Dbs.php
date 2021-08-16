<?php

namespace App\Controllers;

use App\Models\CustomModel;

class Dbs extends BaseController
{
	public function index()
	{
		$db1 = db_connect();
		$model = new CustomModel($db1);

        $db2 = db_connect('anotherDb'); //App\Config\Database use another database added new database Multiple datase
		$model2 = new CustomModel($db2);
		// $joins = $model->getUsers(5);
		
		// $data['joins'] = json_decode(json_encode($joins), true);

		echo '<pre>';
			print_r($model->getUsers(2));
		echo '<pre><hr>';

        echo '<pre>';
			print_r($model2->getAnotherUsers(2));
		echo '<pre><hr>';

        echo '<pre>';
			print_r($model->getUsers(2));
		echo '<pre><hr>';

	}


}
