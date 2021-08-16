<?php

namespace App\Controllers;

class Shop extends BaseController
{
	public function index()
	{
		return view('shop');
	}

    public function product($type = 'laptop', $number = "dell"){

        echo $type . $number;
        // return view('product', '');
    }

}
