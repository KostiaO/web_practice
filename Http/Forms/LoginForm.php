<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm {
    protected $errors = [];


    public function validate($email, $password) {
        if (!Validator::string($email)) {
            $this->errors["email"] = 'Please provide a valid email address.';
        }

        if (!Validator::string($password, 4, 10)) {
            $this->errors["password"] = 'Please provide a valid password.';
        }

        return empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }

    public function error($field, $message) {
        $this->addError($field, $message);
    }

    private function addError($field, $message) {
        $this->errors[$field] = $message;
    }
}
