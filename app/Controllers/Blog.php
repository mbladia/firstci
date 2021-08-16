<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new CustomModel($db);
		$joins = $model->getPosts();

		$data = [
			'meta_title' => 'CodeIgniter 4 Blog',
			'title' => 'This is a blog page.',
		];
		
		$post = ['Title 1','Title 2','Title 3'];
		$data['posts'] = $post;
		
		// $data['joins'] = json_decode(json_encode($joins), true);
		// echo '<pre>';
		// 	print_r($data['joins']);
		// echo '<pre>';
		
		
		return view('blog', $data);
	}

	public function post($id){

		$model = new BlogModel();
		$post = $model->find($id);
		if($post){
			$data = [
				'meta_title' => $post['post_title'],
				'title' => $post['post_title'],
				'post' => $post
			];
		}else{
			$data = [
				'meta_title' => 'Post not found!',
				'title' => 'Post not found!'
			];
		}

		return view('single_post', $data);
	}

	public function new(){

		$data = [
			'meta_title' => 'New Post',
			'title' => 'Create new post'
		];
		if($this->request->getMethod() == 'post'){
			$model = new BlogModel();
			$model->save($_POST);
		}
		return view('new_post', $data);
	}

	public function delete($id){
		$model = new BlogModel();
		$post = $model->find($id);

		if($post){
			$model->delete($id);
			return redirect()->to('/blog');
		}
	}

	public function edit($id){
		$model = new BlogModel();
		$post = $model->find($id);

		$data = [
			'meta_title' => $post['post_title'],
			'title' => $post['post_title'],			
		];

		if($this->request->getMethod() == 'post'){
			$model = new BlogModel();
			$_POST['post_id'] = $id;
			$model->save($_POST);
			$post = $model->find($id);
		}

		$data['post'] = $post;
		return view('edit_post', $data);
	}
}
