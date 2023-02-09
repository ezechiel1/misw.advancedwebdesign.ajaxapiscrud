<html>

<head>
    <title>Student Registration</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        a {
            color: #edf1f5;
            text-decoration: none;
            background-color: transparent;
        }

        header {
            height: 100px;
            padding: 30px 30px 0px 40px;
        }

        header h2 {
            font-family: serif;
        }

        table {
            border: 1px solid #bcc1c5;
            padding: 15px 40px;
            margin: 20px 40px 8px 40px;
            background: #eef1f233;
        }
    </style>
</head>

<body>

    <header class="bg bg-primary">
        <div class="row">
            <div class="col-md-6">
                <h2>Student Registration System</h2>
            </div>
            <div class="col-md-6">
                <ul class="list-inline pull-right">
                    <li class="list-inline-item"> <a href="index.php">List Students</a> </li>
                    <li class="list-inline-item"> <a href="form.php">Register New Student</a></li>
                </ul>

            </div>
        </div>
    </header>

    <section style="margin-right: 80px;" class="ajax-table-results">


    </section>




    <script>
        // JAVASCIPTS CODES 
        $(document).ready(function () {

            var output_table = `
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#No.</th>
                    <th>Student Roll Number</th>
                    <th>Student Names</th>
                    <th>Student Email</th>
                </tr>
            </thead>
            <tbody>`;



            $.ajax({
                url: "http://localhost/awdExam/apis/api_list_student.php",
                type: "POST",
                data: {},
                dataType: 'json',
                success: function (response) {

                    var count = 0;
                    if (response.status == 200) {
                        
                        for (var index in response.data) {
                            var data = response.data[index];
                            count++;

                            output_table += `
                    
                                <tr>
                                    <td>${count}</td>
                                    <td>${data.roll_number} </td>
                                    <td>${data.names}</td>
                                    <td>${data.email}</td>
                                </tr>
                        
                        `;
                        
                        }

                    }

                    output_table = output_table + `
                            
                            </tbody>
                        </table>
                        
                        `;


                    $('.ajax-table-results').html(output_table);
                }
            });


        });
    </script>

</body>

</html>