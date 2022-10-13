<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Quên mật khẩu</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-color: white;
        }
        .container {
            padding: 30px;
            border-bottom: 1.5px solid black;
        }
        h2 {
            padding: 10px;
        }
        .icon-check {
            position: absolute;
            top: 20px;
            left: 15px;
            width: 20px;
            height: 20px;
        }
        #content {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container" style="position: absolute; top: 200px; left: 100px;">
        <div>
            <h2>Quên mật khẩu</h2>
        </div>
            <div class="alert alert-success" id="content" role="alert" style="width: 670px; border-radius: 7px;">
                <p><ion-icon name="checkmark-circle" class="icon-check"></ion-icon>Hãy kiểm tra email của bạn. Sau đó nhấn vào link trong
                 hộp thư để đổi lại mật khẩu.</p>
            </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

</html>
