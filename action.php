
<?php
include_once 'class/Task.php';
$task = new Task();
$post = $_POST;
$json = array();

// update functionality
if(!empty($post['action']) && $post['action']=="create") {
	$task->setItem($post['item']);
	$task->setStatus(0);
	$status = $task->createTask();
	if(!empty($status)){
		$json['msg'] = 'success';
		$json['task_id'] = $status;
	} else {
		$json['msg'] = 'failed';
		$json['task_id'] = '';
	}
	header('Content-Type: application/json');	
	echo json_encode($json);
}

// update functionality
if(!empty($post['action']) && $post['action']=="update") {
	$task->setTaskID($post['task_id']);
	$task->setStatus($post['status']);
	$status = $task->updateTask();
	
	if(!empty($status)){
		$json['msg'] ='sucess';
	} else {
		$json['msg'] = 'failed';
	}
	header('Content-Type: application/json');	
	echo json_encode($json);	
}

// delete functionality
if(!empty($post['action']) && $post['action']=="delete") {
	$task->setTaskID($post['task_id']);
	$task->setStatus($post['status']);
	$status = $task->deleteTask();
	if(!empty($status)){
		$json['msg'] = 'success';
	} else {
		$json['msg'] = 'failed';
	}
	header('Content-Type: application/json');	
	echo json_encode($json);	
}
?>
