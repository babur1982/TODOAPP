
<?php 
include_once 'class/Task.php';

$task = new Task();
$task->setStatus(2);
$taskInfo = $task->getAllTask();

?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
  <link href="css/todo.css" rel="stylesheet" type="text/css">
</head>
<body>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>To-Do List Application</h2>
    </div>
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card px-3">
                    <div class="card-body">
					   <form method="post" id="to_do_form">
                        <h4 class="card-title">Todo list</h4>
						<span id="message"></span>
                        <div class="add-items d-flex"> <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> <button class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button> </div>
					   </form>	
                        <div class="list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                               <?php foreach($taskInfo as $key=>$element) { 
                                  if(!empty($element['status']) && $element['status']==1){
                                    $class = 'class="completed"';
                                    $checked = 'checked="checked"';
                                  } else {
                                    $class = '';
                                    $checked = '';
                                  }
                                ?>
 
                                <li <?php print $class; ?>>
                                    <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox" <?php print $checked; ?> data-utaskid="<?php print $element['id']; ?>"> <?php print $element['task']?> <i class="input-helper"></i></label> <i data-dtaskid="<?php print $element['id']; ?>" class="remove fa fa-times"></i>
                                </div> </li> 
                              <?php } ?>
 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="js/jquery.min.js">
</script>

<script type="text/javascript" src="js/todo.js">

</script>

</body>
</html>




