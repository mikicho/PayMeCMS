<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PayMeCMS - Dashboard</title>
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <h2>Edit Customer</h2>
        <form data-abide action="/customers/edit/post/{{ $id }}">
            <label>id:{{ $id }}</label>
            <div class="email-field">
                <label>Email</label>
                <input id="email" type="email" name="email"></input>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input id="password" type="password" name="password"></input>
                <small class="error"></small>
            </div>
            
            <div>
                <label for="creditCard">credit Card</label>
                <input id="creditCard" type="text" name="creditCard" data-invalid=""></input>
            </div>

            <br />
            <br />         
            <button class="button" type="submit">Edit Customer</button>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
