<?php
namespace App\Model;

class Contact {
    public $title;
    public $description;
    public $email;

    public function __construct($title, $description, $email) {
        $this->title = $title;
        $this->description = $description;
        $this->email = $email;
    }

    public function validate() {
        return !empty($this->title) && !empty($this->description) && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}