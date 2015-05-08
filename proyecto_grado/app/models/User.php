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



    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }



    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
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




    public static function tipoUsuarioSI($persona){
       
        $perfiles_persona=InvPersonaPerfil::where("cedula","=",$persona->cedula)->get();
        if(count($perfiles_persona)>0)
        {
            //administrador
            foreach($perfiles_persona as $fila_perfiles_persona)
            {

                $perfiles=InvPerfiles::where("codperfil","=",$fila_perfiles_persona->codperfil)->get();
                $perfiles=$perfiles[0];

                $persona->nombreperfil=$perfiles['nombreperfil'];
                $persona["nombreperfil"]=$persona->nombreperfil;


                if(strnatcasecmp(trim($persona->nombreperfil),"Admin Centro Investigaciones")==0  )
                {


                    return  $persona->nombreperfil;

                }
            }


            //docente

            foreach($perfiles_persona as $fila_perfiles_persona)
            {

                $perfiles=InvPerfiles::where("codperfil","=",$fila_perfiles_persona->codperfil)->get();
                $perfiles=$perfiles[0];

                $persona->nombreperfil=$perfiles['nombreperfil'];
                $persona["nombreperfil"]=$persona->nombreperfil;


                if(strnatcasecmp(trim($persona->nombreperfil),"Docente")==0 )
                {


                    return  $persona->nombreperfil;

                }
            }



                
        }

        return null;               
    }
}
