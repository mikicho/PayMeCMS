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
        <a class="button" href="/customers/list">View List Customers</a>
        <div class="row" style="margin-top:10%">
            <div align="center"><h2>Create New Customer</h2></div>
            <br />
            <div>
                <form id="createCustomerForm" data-abide action="/customers/create" method="post">
                    <div class="email-field">
                        <label>Email</label>
                        <input id="email" type="email" name="email" required></input>
                    </div>
                    <div class="password">
                        <label for="password">Password</label>
                        <input id="password" type="password" required="" name="password"></input>
                        <small class="error"></small>
                    </div>

                    <div class="passwordConfirmation">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" type="password" data-equalto="password" required="" name="confirmPassword" data-invalid=""></input>
                    </div>

                    <div>
                        <label for="creditCard">credit Card</label>
                        <input id="creditCard" type="text" required="" name="creditCard" data-invalid=""></input>
                    </div>

                    <br />
                    <br />         
                    <button class="button" type="submit">Create Customer</button>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
        <script src="js/vendor/jquery.js"></script>
        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/jquery.creditCardValidator.js"></script>
        <script src="js/app.js"></script>
        <script>
        var ccValid = false;
            $('#creditCard').validateCreditCard(function(result)
            {
                if(result.length_valid && result.luhn_valid){
                    ccValid = true;
                }else{
                    ccValid = false;
                }

            });
            $('#createCustomerForm').submit(function(){
                if(!ccValid){
                    alert("Credit card is not valid!!!");
                    return false;
                }else{
                    return true;
                }
            });
        </script>
    </body>
</html>
