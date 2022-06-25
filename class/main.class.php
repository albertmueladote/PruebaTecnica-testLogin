<?php

/**
 * main
 */
class main {
       
    /**
     * query
     *
     * @param  string $query
     * @param  string $types
     * @param  array $params
     * @return mixed
     */
    public function query($query, $types = null, $params = array())
    {
    	$result = null;
        $mysqli  = mysqli_connect(HOST_DB, USER_DB, PASSWORD_DB, DATABASE_DB);
        if (!$mysqli ) {
            $result = false;
        }else{
            $stmt = $mysqli->prepare($query);
            if(sizeof($params) > 0){
                $stmt->bind_param($types, ...$params);
            }
            $stmt->execute();
            if (strpos($query, 'SELECT') !== false) {
                $rows = $stmt->get_result();
                if($rows->num_rows == 0){
                    $result = array();
                }elseif($rows->num_rows == 1){
                    $result = $rows->fetch_assoc();
                }elseif($rows->num_rows > 1){
                    $result = array();
                    while ($row = $rows->fetch_array())
                    {
                        array_push($result, $row);
                    }
                }
            }else if(strpos($query, 'INSERT') !== false){
                $result = $stmt->insert_id;
            }else if(strpos($query, 'UPDATE') !== false){
                $result = $stmt->id;
            }else if(strpos($query, 'DELETE') !== false){
                $result = true;
            }else if(strpos($query, 'REPLACE') !== false){
                $result = true;
            }
            $mysqli->close();
        }
    	return $result;
    }
}
