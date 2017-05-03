<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
                
            <a href="{{ route('confirmation_path', ['confirmation_code' => $confirmation_code]) }}">Verify</a>
            .<br/>

        </div>

    </body>
</html>