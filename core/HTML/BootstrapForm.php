<?php
/**
 * Created by PhpStorm.
 * User: manipovore
 * Date: 20/01/2018
 * Time: 15:58
 */

namespace Core\HTML;


class BootstrapForm extends Form{

	/**
	 * @param $html
	 * @return string
	 */
	private function surround($html){
		return "<div class=\"form-group\">{$html}</div>";
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
		$label = '<label>' .$label. '</label>';
		if($type === 'textarea'){
			$input = '<textarea id="editor" name="'.$name.'" class="form-control">' .html_entity_decode(self::getValue($name)).'</textarea>';
		}elseif($value){
			$input = '<input type="'.$type.'" name="'.$name.'" class="form-control" value ="'.$value.'">';
		}else{
		$input = '<input type="'.$type.'" name="'.$name.'" class="form-control" value ="'.html_entity_decode(self::getValue($name)).'">';
		}
		return $this->surround ($label . $input);
	}

	public function select($name, $label, $options){
		$label = '<label>' .$label. '</label>';
		$input = '<select name="'.$name.'" class="form-control">';
		foreach($options as $k => $v){
			$attributes = '';
			if($k == $this->getValue($name)){
				$attributes = ' selected';
			}
			$input .="<option value='$k' $attributes> $v </option>";
		}
		$input .= '</select>';
		return $this->surround ($label . $input);
	}

	/**
	 * @return string
	 */
	public function submit()
	{
		return $this->surround ('<button type="submit" class="btn btn-primary"> Envoyer </button>');
	}

}