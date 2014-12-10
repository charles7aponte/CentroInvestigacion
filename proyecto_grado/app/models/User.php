<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'persona';  
    protected $hidden = array('clavep');  
      
  /*  public function getAuthIdentifier() { return $this->getKey(); }  
    public function getAuthPassword() { return $this->clavep; }  
    public function getRememberToken() { return $this->remember_token; }  
    public function setRememberToken($token) {  
        $this->remember_token = $token;  
    }  
    public function getRememberTokenName() { return 'remember_token'; }  
    public function getReminderEmail() { return $this->email; }  

*/
}
