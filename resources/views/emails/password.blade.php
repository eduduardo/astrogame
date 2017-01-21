<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Recuperação de Senha</h2>
        <div>
            <p>Olá {{ $user->name }},</p>
            <p>Você solicitou a recuperação da senha de sua conta do Astrogame, acesse o link a seguir para alterar sua senha.</p>
            <a href="{{ url('/password/reset/') . $token }}">Recuperar agora</a><br><br>
            <p>Se não foi você, por favor, ignore esse e-mail.<p>
            <p>Atenciosamente,<br>Astrogame.</p>
        </div>
    </body>
</html>