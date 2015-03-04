<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends  Eloquent implements UserInterface, RemindableInterface {
    use UserTrait, RemindableTrait;


    protected $table = 'persona'; 
    protected $primaryKey = "cedula";
    public $timestamps = false; 


    protected $username = 'cedula';//username a utilizar de la tabla usuarios
 
    protected $password = 'clavep';

    protected $fillable = array('clavep');



    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'uno';
    }


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->cedula;
    }



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->clavep;
    }


/*
    protected $username = 'nombre';//username a utilizar de la tabla usuarios
 
    protected $password = 'cont';*/
 
   // protected $hidden = array('clavep');  
      
  /*  public function getAuthIdentifier() { return $this->getKey(); }  
    public function getAuthPassword() { return $this->clavep; }  
    public function getRememberToken() { return $this->remember_token; }  
    public function setRememberToken($token) {  
        $this->remember_token = $token;  
    }  
    public function getRememberTokenName() { return 'remember_token'; }  
    public function getReminderEmail() { return $this->email; }  


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    /*protected $hidden = array('cont');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
   /* public function getAuthIdentifier()
    {
            return $this->getKey();
    }


 
    public function getAuthPassword()
    {
            return $this->password;
    }

    public function getReminderEmail()
    {
            return $this->email;
    }

    public function scopeCode($query, $code)
    {
            return $query->whereCode($code);
    }

    public function scopeEmail($query, $email)
    {
            return $query->whereEmail($email);
    }


    public function getRememberToken()
    {
        return $this->remember_token;
    }


    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }


    public function getRememberTokenName()
    {
        return 'remember_token';
    }*/
}
