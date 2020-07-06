<?php
// include connection class
include("DBConnection.php");
// Task
class Task 
{
    protected $db;
    private $_taskID;
    private $_item;
    private $_status;
 
    public function setTaskID($taskID) {
        $this->_taskID = $taskID;
    }
    public function setItem($item) {
        $this->_item = $item;
    }
    public function setStatus($status) {
        $this->_status = $status;
    }
    
    // __construct
    public function __construct() {
        $this->db = new DBConnection();
        $this->db = $this->db->returnConnection();
    }
 
    // create Task
    public function createTask() {
		try {
    		$sql = 'INSERT INTO todo_list (task, status)  VALUES (:task, :status)';
    		$data = [
			    'task' => $this->_item,
			    'status' => $this->_status,
			];
	    	$stmt = $this->db->prepare($sql);
	    	$stmt->execute($data);
			$status = $this->db->lastInsertId();
            return $status;
 
		} catch (Exception $err) {
    		die("Oh noes! There's an error in the query! ".$err);
		}
 
    }
 
    // update Task
    public function updateTask() {
	   
        try {
		   $sql = "UPDATE todo_list SET  status=:status WHERE id=:task_id";
		    $data = [
			    'status' =>$this->_status,
			    'task_id' => $this->_taskID
			];
			
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);
	        return 'sucess';
			
		} catch (Exception $err) {
			die("Oh noes! There's an error in the query! " . $err);
		}
    }
   
    // getAll Task
    public function getAllTask() {
    	try {
    		$sql = "SELECT id, task, status FROM todo_list WHERE status != :status";
		    $stmt = $this->db->prepare($sql);
		    $data = [
		    	'status' => $this->_status
			];
		    $stmt->execute($data);
		    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
		} catch (Exception $err) {
		    die("Oh noes! There's an error in the query! " . $err);
		}
    }
 
    // delete Task
   /* public function deleteTask() {
    	try {
	    	$sql = "DELETE FROM todo_list WHERE id=:task_id";
		    $stmt = $this->db->prepare($sql);
		    $data = [
		    	'task_id' => $this->_taskID
			];
	    	$stmt->execute($data);
            $status = $stmt->rowCount();
            return $status;
	    } catch (Exception $err) {
		    die("Oh noes! There's an error in the query! " . $err);
		}
    }*/
	
	// delete Task
    public function deleteTask() {
    	 try {
		   $sql = "UPDATE todo_list SET  status=:status WHERE id=:task_id";
		    $data = [
			    'status' =>$this->_status,
			    'task_id' => $this->_taskID
			];
			
			$stmt = $this->db->prepare($sql);
			$stmt->execute($data);
	        return 'sucess';
			
		} catch (Exception $err) {
			die("Oh noes! There's an error in the query! " . $err);
		}
    }
}
?>	
