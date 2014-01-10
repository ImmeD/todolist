<!DOCTYPE HTML> 

<html>

<head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<style type="text/css">
body {
	background-color: #F8F8FF;
}

.label {
	display:block;
	float:left;
	width:100px;
}

.submit {
	display:block;
	float:right;
}

form {
	width:258px;
}

.li {
	display:block;
	float:left:
}

#diiv {
	margin-top: 10px;
}
</style>

<body>
	<form action="todolist.php" id="form" method="POST">
		<label class="label">Todo Item</label>
		<input type="text" name="todo_item"><br>
		<label class="label">Date</label>
		<input type="text" name="date"><br>
		<input type="submit" name="submit" class="submit">
	</form>
	
	<script>
	var form = document.getElementById("form");
	form.todo_item.onkeyup = function() {
		var value = this.value.trim();
		if (form.submit.disabled) {
			form.submit.disabled = (value =="");
        };
	};
	$(document).on('click' ,'button' ,function() {
    event.preventDefault();
           
       var responsee =  $.post("todolist.php", {delete : this.id});
       responsee.done(function (data){
     $('#div').replaceWith(data);     
         }); 
 });
	
	$("#form").submit(function( event ){
    event.preventDefault();
    var information = $("#form").serialize();
    var response =  $.post("todolist.php", information); 
    response.done(function (data){
    $('#div').replaceWith(data);     
			}); 
		});
	</script>
	
	<div id="div">
	</div>
	
</body>
</html>