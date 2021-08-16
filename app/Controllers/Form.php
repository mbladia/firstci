<?php

namespace App\Controllers;


class Form extends BaseController
{
	public function index()
	{
        helper(['form']);

        $data = [];
        $data['categories'] =[
            'Student',
            'Teacher',
            'Principal'
        ];
        
        

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email Addressss',
                    'errors' => [
                        'required' => 'Hey Email Address is a required field',
                        'valid_email' => 'Please add valid email hahaha'
                    ]
                ],
                'password' => 'required|min_length[8]',
                'category' => 'in_list[Student, Teacher]',
                'date' => [
                    'rules' => 'required|check_date', //check_date is a custom validation method App\Validations
                    'label' => 'Date',
                    'errors' => [
                        'check_date' => 'You cant add a date before today'
                    ] 
                ]
            ];
            if($this->validate($rules)){
                //Then do your database insert or loggin user
                // return redirect()->to('/form');

                return view('form', $data);
            }else{
                $data['validation'] = $this->validator;
            }
        }

		return view('form', $data);
	}

    function success(){
        return "Hey you've passed the validation.";
    }

}
