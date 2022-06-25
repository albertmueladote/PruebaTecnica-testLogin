<?php

/**
 * user
 */
class user extends main{
    
    /**
     * int $id
     */
    private $id;

    /**
     * string $name
     */
    private $name;

    /**
     * string $email
     */
    private $email;

    /**
     * string $origin
     */
    private $origin;

    /**
     * string $job
     */
    private $job;

    /**
     * string $image
     */
    private $image;

    /**
     * json $social
     */
    private $social;

    /**
     * string $password
     */
    private $password;

    /**
     * datetime $last_login
     */
    private $last_login;

    /**
     * datetime $modifed
     */
    private $modifed;

    /**
     * datetime $created
     */
    private $created;
       
    /**
     * __construct
     *
     * @param  int $id
     * @return void
     */
    function __construct($id = null) {
        if(is_int($id)){
            $this->id = $id;
            $this->load();
        }
    }
    
    /**
     * login
     * @return boolean
     */
    public function login()
    {
        $query = 'SELECT user.* FROM user WHERE user.email = ? AND user.password = ?';
        $types = "ss";
        $params = array($this->email, $this->password);
        $user = $this->query($query, $types, $params);
        if(sizeof($user) > 0)
        {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->origin = $user['origin'];
            $this->job = $user['job'];
            $this->image = $user['image'];
            $this->social = $user['social'];
            $this->password = $user['password'];
            $this->last_login = date('y-m-d H:i:s');
            $this->modifed = $user['modifed'];
            $this->created = $user['created'];
            $query = 'UPDATE user SET last_login = ? WHERE id = ?';
            $types = "si";
            $params = array();
            array_push($params, date('y-m-d H:i:s'));
            array_push($params, $this->id);
            
            $id = $this->query($query, $types, $params);
            return true;
        }
        return false;
    }
        
    /**
     * load
     *
     * @return void
     */
    public function load()
    {
        $query = 'SELECT user.* FROM user WHERE user.id = ?';
        $types = "i";
        $params = array($this->id);
        $user = $this->query($query, $types, $params);
        if(sizeof($user) > 0)
        {
            $this->id = $user['id'];
            $this->name = $user['name'];
            $this->email = $user['email'];
            $this->origin = $user['origin'];
            $this->job = $user['job'];
            $this->image = $user['image'];
            $this->social = $user['social'];
            $this->password = $user['password'];
            $this->last_login = $user['last_login'];
            $this->modifed = $user['modifed'];
            $this->created = $user['created'];
            return true;
        }
        return false;
    }

    /**
     * __get
     *
     * @param  string $property
     * @return mixed
     */
    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
    /**
     * __set
     *
     * @param  string $property
     * @param  mixed $value
     * @return void
     */
    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}