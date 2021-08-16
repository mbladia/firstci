<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
	public function index()
	{
		echo 'this is user area';
	}

    public function getAllUsers(){

        echo 'show all users';
        // return view('product', '');
    }

}
