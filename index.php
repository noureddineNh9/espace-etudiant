
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Espace Etudiant</title>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</head>
<body>
        <!-- 
        test mode <input class="form-check-input" type="checkbox" value="" id="testModeCheckbox" >
            -->

    <?php include "./Navbar.php" ?>

    <div class="container">
        <?php if(isset($_SESSION['isAuth'])){ ?>

            <h3>welcome</h3>
               
        <?php }?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
        var testMode = false;
        reloadLoginForm();


        function reloadLoginForm(){
            if (testMode) {
                $('#loginPart').hide();
                $('#testPart').show();
            }else{
                $('#loginPart').show();
                $('#testPart').hide();
            }
        }
        
        $("#testModeCheckbox").click(function(){

            if($(this).is(':checked')){
                testMode = true;
            }else{
                testMode = false;
            }
            reloadLoginForm();
        })


		//showUser();
		
        //Add New
		$(document).on('click', '#addnew', function(){
			if ($('#firstname').val()=="" || $('#lastname').val()==""){
				alert('Please input data first');
			}
			else{
			$firstname=$('#firstname').val();
			$lastname=$('#lastname').val();				
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						firstname: $firstname,
						lastname: $lastname,
						add: 1,
					},
					success: function(){
						showUser();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ufirstname=$('#ufirstname'+$uid).val();
			$ulastname=$('#ulastname'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						firstname: $ufirstname,
						lastname: $ulastname,
						edit: 1,
					},
					success: function(){
						showUser();
					}
				});
		});
 
	});
 
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'getAllStudents.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
 
</script>
</html>