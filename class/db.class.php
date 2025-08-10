<?php 

class myDB{
    private $servername = "localhost";
    private $username = "root"; 
    private $password = "";
    private $db_name = "cms_db";
    public $res;
    public $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->servername, $this->username,$this->password, $this->db_name);
        } catch (Exception $e) {
            die("Database connection error! . <br>" . $e);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }  
     
    public function insert($table, $data){
        try {
            $table_columns = implode(',', array_keys($data));
            $prep = $types = "";
            foreach ($data as $key => $value){
                $prep .= '?,';
                $types .= substr(gettype($value), 0,1);
            }
            $prep = substr($prep, 0, -1);
            $stmt = $this->conn->prepare("INSERT INTO $table($table_columns) VALUES ($prep)");
            $stmt->bind_param($types, ...array_values($data));
            $stmt->execute();
            $stmt->close();
            return true;
        } catch (Exception $e) {
            die("Error while inserting data!. <br>" . $e);
        }
    }
    public function select($table, $row="*", $where=null){
        try {
            if(!is_null($where)){
                $cond=$types="";
                foreach($where as $key => $value){
                    $cond .= $key . " = ? AND ";
                    $types .= substr(gettype($value), 0,1);
                }
                $cond = substr($cond,0,-4);
                $stmt = $this->conn->prepare("SELECT $row FROM $table WHERE $cond");
                $stmt->bind_param($types, ...array_values($where));
            }else{
                $stmt = $this->conn->prepare("SELECT $row FROM $table");
            }
            $stmt->execute();
            $this->res = $stmt->get_result();
        } catch (Exception $e) {
            die("Error requesting data!. <br>" . $e);
        }
    }

    public function search($table, $row="*", $where){
        try {
            if (!is_null($where) && !empty($where)) {
                $sql = "SELECT $row FROM $table WHERE blog_title LIKE ? OR blog_description LIKE ? OR blog_content LIKE ?";
                $stmt = $this->conn->prepare($sql);
                $searchTerm = '%' . $where . '%'; 
                $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
            } else {

                $stmt = $this->conn->prepare("SELECT $row FROM $table");
            }
            $stmt->execute();
            $this->res = $stmt->get_result();
        } catch (Exception $e) {
            die("Error requesting data!. <br>" . $e);
        }
    }

    public function filter($table, $row="*", $where){
        try {
            $sql = "SELECT $row FROM $table WHERE blog_category = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $where);
            $stmt->execute();
            $this->res = $stmt->get_result();
        } catch (Exception $e) {
            die("Error requesting data!. <br>" . $e);
        }
    }

    public function update($table, $data, $where) {
        try {
            $cond = $types = $prep = "";
            foreach ($data as $key => $value) {
                $cond .= $key . " = ?,";
                $types .= substr(gettype($value), 0, 1);
            }
            $cond = substr($cond, 0, -1);
    
            
            foreach ($where as $key => $value) {
                $prep .= $key . " = ? AND ";
                $types .= substr(gettype($value), 0, 1);
            }
            $prep = substr($prep,0,-4);

            $stmt = $this->conn->prepare("UPDATE $table SET $cond WHERE $prep");
            $stmt->bind_param($types, ...array_merge(array_values($data), array_values($where)));
            $stmt->execute();
            $stmt->close();
        } catch (Exception $e) {
            die("Error while updating data!. <br>" . $e);
        }
    }
    
    public function delete($table, $where) {
        try {
            $cond = $types = "";
            foreach ($where as $key => $value) {
                $cond .= "$key = ? AND ";
                $types .= substr(gettype($value), 0, 1);
            }
            $cond = substr($cond,0,-5);
    
            $stmt = $this->conn->prepare("DELETE FROM $table WHERE $cond");
            $stmt->bind_param($types, ...array_values($where));
            $stmt->execute();
            $stmt->close();
        } catch (Exception $e) {
            die("Error while deleting data!. <br>" . $e);
        }
    }
        
}




















