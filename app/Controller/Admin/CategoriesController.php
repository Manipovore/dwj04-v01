<?php

namespace App\Controller\Admin;
use \App;
use \Core\HTML\BootstrapForm;
use Core\HTTP\Url;
use Core\Str\FormatStr;

class CategoriesController extends AppController{

	public function __construct() {
		parent::__construct();
		$this->loadModel('Category');
	}

	public function index(){
		$categories = $this->Category->all();
		$this->render('admin.categories.index', compact( 'categories'));
	}

	public function add(){
		if(!empty($_POST)){
			$result = $this->Category->create([
				'category_title' => htmlentities($_POST['category_title']),
				'category_description' => htmlentities($_POST['category_description']),
				'category_slug' => FormatStr::formatSlug($_POST['category_title']),
			]);

			if($result){
				Url::redirect('admin/categories');
				return $this->index();
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('admin.categories.edit', compact('categories', 'form'));
	}

	public function edit($id){
		if(!empty($_POST)){
			$this->Category->update($id,[
				'category_title' => htmlentities($_POST['category_title']),
				'category_description' => htmlentities($_POST['category_description']),
				'category_slug' => FormatStr::formatSlug($_POST['category_title']),
			]);
			Url::redirect('admin/categories');
			return $this->index();
		}
		$category = $this->Category->find($id);
		$form = new BootstrapForm($category);
		$this->render('admin.categories.edit', compact('form'));
	}

	public function delete($id){
		if(!empty($_POST)){
			$this->Category->deletePostsInCategory(intval($id));
			$this->Category->delete(intval($id));
			Url::redirect('admin/categories');
			return $this->index();
		}
	}

}