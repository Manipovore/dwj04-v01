<?php

namespace Core\HTML;


class Mail {

    private $_email;
    private $_return_line;
    private $_headers;
    private $_subject;
    private $_message = [];

    public function __construct($email, $nameServer, $emailServer){
        $this->_email = $email;
        $this->line_return();
        $this->header($nameServer, $emailServer);
    }

    private function header($nameServer, $emailServer){
        $this->_headers= "From: \"$nameServer\"<$emailServer>".$this->_return_line;
        $this->_headers.= "Reply-to: \"$nameServer\" <$emailServer>".$this->_return_line;
        $this->_headers.= "MIME-Version: 1.0".$this->_return_line;
        $this->_headers.= "Content-Type: text/html; charset=utf-8".$this->_return_line;
    }

    public function subject($subject){
        $this->_subject = $subject;
    }

    public function message($tag, $message){
        $this->_message[] = "<$tag>$message</$tag>";
    }

    private function c_message(){
        $message = $this->_return_line.'<html><head></head><body>'.implode($this->_return_line, $this->_message).'</body></html>'.$this->_return_line;
        return $message;
    }

    private function line_return(){
        // On filtre les serveurs qui rencontrent des bugs
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->_email)) {
            $this->_return_line = "\r\n";
        }else {
            $this->_return_line = "\n";
        }
    }

    public function sendMail(){
        mail($this->_email, $this->_subject, $this->c_message(), $this->_headers );
    }

}