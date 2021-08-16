<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
	public function index()
	{
		echo 'this is an admin shop';
	}

    public function product($type = "laptop", $number="dell"){

        echo 'This is an admin product' . $type . $number;
        // return view('product', '');
    }

}
