<?php

 /**
 * session
 */
class session extends main{
    
    /**
     * string $id
     */
    private $id;

    /**
     * datetime $access
     */
    private $access;

    /**
     * int $data
     */
    private $data;
    
    /**
     * __construct
     *
     * @param  int $id
     * @return void
     */
    public function __construct($id = null) {
        if(is_string($id)){
            $this->id = $id;
            $this->load();
        }
    }
    
    /**
     * load
     *
     * @return void
     */
    public function load()
    {
        $query = 'SELECT session.* FROM session WHERE session.id = ?';
        $types = "s";
        $params = array($this->id);
        $session = $this->query($query, $types, $params);
        if(sizeof($session) > 0)
        {
            $this->id = $session['id'];
            $this->access = $session['access'];
            $this->data = $session['data'];
        }
    }

    /**
     * save
     *
     * @return void
     */
    public function save()
    {
        $session = new session($this->id);
    
        $query = 'REPLACE INTO session (session.id, session.access, session.data) VALUES (?, ?, ?)';
        $types = "sss";
        $params = array();
        
        array_push($params, $this->id);
        array_push($params, date('y-m-d H:i:s'));
        array_push($params, $this->data);
        
        $id = $this->query($query, $types, $params);
        
        if(!is_null($id))
        {
            $this->load();
        } 
    }

    /**
     * remove
     *
     * @return void
     */
    public function remove()
    {
        $query = 'DELETE FROM session WHERE session.id = ?';
        $types = "s";
        $params = array();
        array_push($params, $this->id);

        $result = $this->query($query, $types, $params);

        if($result)
        {
            $this->id = null;
            $this->access = null;
            $this->data = null;
        }
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
     * @param  string $value
     * @return void
     */
    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
