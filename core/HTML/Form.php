<?php
/**
 * Created by PhpStorm.
 * User: manipovore
 * Date: 20/01/2018
 * Time: 15:58
 */

namespace Core\HTML;

/**
 * Class Form
 * @package Core\HTML
 * Permet de générer un formulaire basique
 */
class Form {

	/**
	 * @var array Données utilisées par le formulaire
	 */
	private $data;

	/**
	 * @var string Tag utilisé pour entourer les champs
	 */
	public $surround = 'p';

	/**
	 * Form constructor.
	 * @param array $data
	 */
	public function __construct($data = array ()) {
		$this->data = $data;
	}

	/**
	 * @param $html
	 * @return string
	 */
	private function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}

	/**
	 * @param $index
	 * @return null or $this->data[$index]
	 */
	protected function getValue($index){
		if(is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}

	/**
	 * @param $name
	 * @param $label
	 * @param array $options
	 * @return string
	 */
	public function input($name, $label, $options = [], $value = null)
	{
		$type = isset($options['type']) ? $options['type'] : 'text';
		if($value){
			return $this->surround (
				'<input type="'.$type.'" name="'.$name.'" value ="'.$value.'">'
			);
		}
		return $this->surround (
			'<input type="'.$type.'" name="'.$name.'" value ="'.$this->getValue($name).'">'
		);
	}

	/**
	 * @return string
	 */
	public function submit()
	{
		return $this->surround ('<button type="submit"> Envoyer </button>');
	}

}