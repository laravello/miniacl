<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifizieren Sie Ihre E - Mail</h2>

        <div>
            Bitte klicken Sie den folgenden Link:
                
            <a href="{{ route('confirmation_path', ['confirmation_code' => $confirmation_code]) }}">Verifizieren</a>
            .<br/>

        </div>

    </body>
</html>