<?php require ("cabecalho.php");?>  
            
        <?php
        if(!usuarioEstaLogado()){ ?>
            <h1>Login</h1>
            <form action="login.php" method="post">
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><input type="password" name="passwd"></td>
                    </tr>
                    <tr>
                        <td><button class="btn btn-primary">Login</button></td>
                    </tr>
                </table>
            </form>
        <?php }else if (usuarioLogado() == 1){ ?>
            <a href="form-cadastra-usuario.php"><button class="btn btn-primary">Cadastrar Usuário</button></a>
            <a href="form-cadastra-sala.php"><button class="btn btn-primary">Cadastrar Sala</button></a>
            <a href="lista-usuarios.php"><button class="btn btn-primary">Listar Usuários</button></a>
            <a href="lista-salas.php"><button class="btn btn-primary">Listar Salas</button></a>
            <a href="lista-agendamentos.php"><button class="btn btn-primary">Lista Agendamentos</button></a>
        <?php }else if (usuarioLogado() > 1){ ?>
            <a href="lista-salas.php"><button class="btn btn-primary">Listar Salas</button></a>
            <a href="lista-agendamentos.php"><button class="btn btn-primary">Lista Agendamentos</button></a>
        <?php } ?>
        </div>
    </div>
</body>
</html>