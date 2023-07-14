<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dear {{ $user->f_name }},</h5>

                <p class="card-text">Please click the link below to complete your registration</p>

                    <p class="card-text">Link: <a href="{{ route('new.register' , [ $user->f_name , $user->email , $role ]) }}" class="btn btn-primary"> Click Here To Login</a>  </p>


                <p class="card-text">Please keep your login details confidential and do not share them with anyone.</p>
                <p class="card-text" style="color: red"> <i>Please use the email address you provided us to Login</i></p>

                <p class="card-text">If you have any questions or need further assistance, please don't hesitate to contact us.</p>

                <p class="card-text">Thank you,</p>
                <p class="card-text">Hospital Management</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

