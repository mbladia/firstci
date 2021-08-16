<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Blog extends BaseController
{
	public function index()
	{
		echo 'this is blog post area';
	}

    public function createNew(){
       return view('blog_form');
    }
    public function saveBlog(){
        print_r($_POST);
       
     }

}
