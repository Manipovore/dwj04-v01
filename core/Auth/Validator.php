<?php

namespace Core\Auth;

/**
 * Class Validator
 * @package Core\Auth
 *
 * Valide les données d'un formulaire
 */
class Validator{

    private $data;
    private $errors = [];

    /**
     * Validator constructor.
     * @param $data les données postées par le Form
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Method qui retourne $data[$field] si il y en a
     * @param $field String
     * @return null || Array
     */
    private function getField($field)
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }

    /**
     * Method qui confirme que l'utilisateur rentre bien un pseudo alphanumérique preg_match(alph + chiffres + underscore)
     * @param $field String username de l'utilisateur
     * @param $errorMsg String message d'erreur a afficher
     */
    public function isAlpha($field, $errorMsg){
        if(!preg_match('/^[-a-zA-Z0-9\s_]+$/', $this->getField($field))){
            $this->errors[$field] = $errorMsg;
        }
    }

    /**
     * Method: confirme si le champ dans la table est unique
     * @param $field String username
     * @param $db Object Database/MysqlDatabase
     * @param $table String nom de la table -> users
     * @param $errorMsg String message d'erreur a afficher
     */
    public function isUniq($field, $db, $table, $errorMsg){
        $record = $db->prepare("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)], null, true );
        if($record){
            $this->errors[$field] = $errorMsg;
        }
    }

    /**
     * @param $field
     * @param bool $errorMsg
     * @return bool
     */
    public function isEmail($field, $errorMsg = false)
    {
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
            return false;
        }
        return true;
    }

    /**
     * @param $field
     * @param $errorMsg
     */
    public function isConfirmed($field, $errorMsg){
        $value = $this->getField($field);
        if(empty($value) || $value != $this->getField($field . '_confirm')){
            $this->errors[$field] = $errorMsg;
        }
    }


    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

}