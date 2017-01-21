<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verificação de e-mail</h2>
        <div>
            <p>Olá observador {{ $name }}, obrigado por se cadastrar no Astrogame! :)<p>
            <p>Por favor, confirme seu e-mail para finalizar seu cadastro:</p>
            <a href="{{ url('/confirm/verify/') . '/' . $confirm_code }}">Verificar agora</a><br>
            <p>Bom jogo e aprendizado, Astrogame.</p>
        </div>
    </body>
</html>