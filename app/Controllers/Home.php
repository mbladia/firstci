<?php

namespace App\Controllers;

use App\Controllers\Admin\Shop as AdminShop;

class Home extends BaseController
{
	public function index()
	{
		// return view('blog');
		return redirect()->to('/');
	}

	function validation(){
		$shop = new Shop();
		echo $shop->product('laptop', 'HP').'</br>';
		
		$AdminShop = new AdminShop();
		echo $AdminShop->product('laptop', 'HP');
	}
}
