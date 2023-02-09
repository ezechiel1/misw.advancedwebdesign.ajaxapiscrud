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

        form {
            border: 1px solid #bcc1c5;
            padding: 15px 40px;
            margin: 20px 40px;
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


    <section class="row">

        <form action="" method="POST" class="form form-responsive col-md-6 RegisterStudentForm">
            <h3>REGISTER NEW</h3>
            <hr>
            <div class="row">
                <label for="" class="col-md-3">Student Names</label>
                <input type="text" class="form-control col-md-8" name="names" required
                    placeholder="Enter Student Names">
            </div>
            <br>
            <div class="row">
                <label for="" class="col-md-3">Student Roll Number</label>
                <input type="text" class="form-control col-md-8" name="roll_number" required
                    placeholder="Student Roll Number">
            </div>
            <br>
            <div class="row">
                <label for="" class="col-md-3">Student Email</label>
                <input type="text" class="form-control col-md-8" name="email" required
                    placeholder="Enter Student Email">
            </div>

            <hr>
            <div>
                <input type="reset" class="btn btn-md btn-danger" value="Cancel">
                <input type="submit" class="btn btn-md btn-primary" name="register_student"
                    value="Register New Student">
            </div>
        </form>

    </section>

</body>






<script>
    // JAVASCIPTS CODES 
    $(document).ready(function () {

        $('.RegisterStudentForm').on('submit', function () {
            var formData = $('.RegisterStudentForm').serialize();

            $.ajax({
                url: "http://localhost/awdExam/apis/api_create_student.php",
                type: "POST",
                data: formData,
                dataType: 'json',
                success: function (response) {
                    $('.RegisterStudentForm')[0].reset();
                    alert(response.message);
                    
                }
            });
            return false;

        });

    });
</script>


</html>