<?php 
    include "../connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6" id="register-container">
            <h2>Classrooms</h2><br><br>

            <button class="__delete btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#myModal">Add</button>    


            <br>      
            <br> 

            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody id="table-container">
                
                </tbody>
            </table>


            <!-- The Modal -->
            <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="submitForm">
                            <input name="name" class="form-control mb-2" required/>
                            <button id="addNew" class="btn btn-outline-dark" >submit</button>    
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
            </div>


            </div>
        </div>
    </div>

    <script>
        function isValid() {
            return true;
        }

        var classrooms = [
            {
                id: 97,
                name: "aaaa"
            }
        ]



        $('#addNew').click(function (e) {
            if (isValid()) {
                var data = $("#submitForm").serialize();

                console.log(data.name);

                $.ajax({
                    data: data,
                    type: "post",
                    url: "../controllers/Classroom/create.php",
                    success: function(data){                    
                            console.log(data);
                            classrooms.push(JSON.parse(data))
                            afficheTable(classrooms)

                    
                    }
                });

            }
        })

        function deleteRecord(id){
            console.log(id);
        }



        function getData() {
            $.ajax({    
                type: "GET",
                url: "../controllers/Classroom/getAll.php",             
                dataType: "JSON",                  
                success: function(data){  
                    console.log(data);                  
                    classrooms = data;
                    
                    afficheTable(classrooms);

                }
            });
        }

        getData();

        function afficheTable(classrooms){
            const data = classrooms.map(classe => {
                return `
                    <tr>
                        <td>${classe.id}</td>
                        <td>${classe.name}</td>
                        <td>
                            <button data-id=${classe.id} class="btn btn-outline-success btn-sm">edit</button>
                            <button onclick="deleteRecord(${classe.id})" class="__delete btn btn-danger btn-sm">delete</button>
                        </td>
                    </tr>
                `;
            });

            $("#table-container").html(data);
        }



    </script>

</body>
</html>