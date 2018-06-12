<?php
/**
 * Formatage d'une chaine de caractère
 * Utilisation de la librairies Normalizer
 */

namespace Core\Str;
use Normalizer;

class FormatStr {

    /**
     * Le titre du post sera formaté de sorte qu'il soit 
     * stocké en bdd et utiliser plus tard en slug dans une url
     * 
     * $string : String
     */
	public static function formatSlug($string) {
		//Normalisation de la chaine utf8 en mode caractère + accents
		$string = Normalizer::normalize($string, Normalizer::FORM_D);
		//remplacement les espaces par des traits d'union
		$string = str_replace( ' ', '-', $string);
		//Suppression des accents
		return preg_replace('~\p{Mn}~u', '', $string);
	}

}