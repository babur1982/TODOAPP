$(document).ready(function() {	
							  
		var todoListItem = $('.todo-list');
		var todoListInput = $('.todo-list-input');
 
		// create functionality
		$('.todo-list-add-btn').on("click", function(event) {
			event.preventDefault();
			
			var action = 'create';
			var item = $(this).prevAll('.todo-list-input').val();
			if (item)
			{
			var bindHTML = '';
			$.ajax({
		        type:'POST',
		        url:'action.php',
		        data:{action:action, item:item},
		        dataType:'json',                    
		        success: function (json) {
	            	if (item) {
						bindHTML+= '<li>';
							bindHTML+= '<div class="form-check">';
								bindHTML+= '<label class="form-check-label">';
									bindHTML+= '<input class="checkbox" type="checkbox" data-utaskid="'+json.task_id+'" />' + item;
									bindHTML+= '<i class="input-helper"></i>';
								bindHTML+= '</label>';
								bindHTML+= '<i data-dtaskid="'+json.task_id+'" class="remove fa fa-times"></i>';
							bindHTML+= '</div>';
							
						bindHTML+= '</li>';
						todoListItem.append(bindHTML);
						todoListInput.val("");
					}
	            },
		        error: function (xhr, ajaxOptions, thrownError) {
		            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		        }        
		    });
			}
			else
			{
				 $('#message').html('<div class="alert alert-danger">Enter Task Details</div>');
                 return false;	
			}
		});
 
		// update functionality
		todoListItem.on('click', '.checkbox', function() {
														
			var action = 'update';
			var task_id = $(this).data('utaskid');
			var status = 1;
			/*if ($(this).attr('checked')) {
				$(this).removeAttr('checked');
				var status = 0;
			} else {
				$(this).attr('checked', 'checke	d');
				
			}*/
		
			$.ajax({
		        type:'POST',
		        url:'action.php',
		        data:{action:action, task_id:task_id, status:status},
		        dataType:'json',                    
		        success: function (json) {
		        	return true;
		        },
		        error: function (xhr, ajaxOptions, thrownError) {
		            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		        }        
	    	});
	    	//$(this).closest("li").toggleClass('completed');
			//$(this).parent().remove();
			$(this).closest("li").fadeOut('slow');
			//  $('#list-group-item-'+task_list_id).fadeOut('slow');
		});
 
		// delete functionality
		todoListItem.on('click', '.remove', function() {
			var action = 'delete';
			var task_id = $(this).data('dtaskid');
			var status = 2;
			$.ajax({
		        type:'POST',
		        url:'action.php',
		        data:{action:action, task_id:task_id,status:status},
		        dataType:'json',                    
		        success: function (json) {
	            	return true;
	            },
		        error: function (xhr, ajaxOptions, thrownError) {
		            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		        }        
		    });
			$(this).parent().remove();
		});
	});		// JavaScript Document