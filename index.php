<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Task5</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        </head>
        <body>
        <div class="container mt-4">
            <?php
            if($_COOKIE['user']==''):
            ?>
            <div class="row">
                <div class="col">
                <h1>Registration</h1>
                <form action="check.php" method="post">
                    <input type="text"  name="login"
                    id="login" placeholder="Enter login"><br><br>
                    <input type="text"  name="mail"
                    id="mail" placeholder="Enter mail"><br><br>
                    <input type="password"  name="pass"
                    id="pass" placeholder="Enter password"><br><br>
                    <button type="submit">Registration</button>
                </form>
                </div>
                <div class="col">
                    <h1>Authorization</h1>
                    <form action="auth.php" method="post">
                        <input type="text"  name="login"
                        id="login" placeholder="Enter login"><br><br>
                        <input type="password"  name="pass"
                        id="pass" placeholder="Enter password"><br><br>
                        <button type="submit">Authorization</button>
                    </form>
                    </div>
                <?php else:?> 
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">                                                           
                            <a class="navbar-brand" href="exit.php">Exit</a>                            
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                            <input type="submit" name="block" class="btn btn-outline-secondary" value="block user" form="f">
                            </li>
                            <li class="nav-item">
                            <input type="submit" name="unblock" class="btn btn-outline-secondary" value="unblock user" form="f">
                            </li>
                            <li class="nav-item">           
                            <input type="submit" name="delete" class="btn btn-outline-secondary" value="delete user" form="f">                  
                            </li>
                            <li class="nav-item dropdown">
                            </li>
                            </ul>
                            </div> 
                            </nav> 

                        <form method="POST" action="somepage.php" id="f" >                               
                        <table class="table table-bordered">   
                        <thead class="thead-dark">                    
                        <tr>
                        <th><input type="checkbox" id="option-all"><label for="option-all" onchange="checkAll(this)">Select All</label></th>
                        <th>id</th>
                        <th>login</th>
                        <th>email</th>
                        <th>regData</th>
                        <th>LastOnline</th>
                        <th>Status</th>
                        <th>Block/unblock</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $user = 'root';
                        $password = 'root';
                        $db = 'registration';
                        $host = 'localhost';
                        $port = 8889;
                        $link = mysqli_init();
                        $success = mysqli_real_connect(
                           $link,
                           $host,
                           $user,
                           $password,
                           $db,
                           $port
                        );   
                        $res = $link->query("SELECT * FROM `users`  ");
                        while($use=mysqli_fetch_array($res)){ 
                        $result.='<tr>';  
                        $result.='<td><p id="controls"><input type="checkbox" name="checkB[]" id="option"value='.$use['id'].'><label for="option">Check</label></p></td>';
                        $result.='<td>'.$use['id'].'</td>';
                        $result.='<td>'.$use['login'].'</td>';
                        $result.='<td>'.$use['mail'].'</td>';
                        $result.='<td>'.$use['regDate'].'</td>';
                        $result.='<td>'.$use['onlineDate'].'</td>';
                        $result.='<td>'.$use['status'].'</td>';
                        $result.='<td>'.$use['userStat'].'</td>';
                        $result.='</tr>';                        
                        }
                        echo $result; 
                        mysql_close();
                        ?>
                        </tbody>
                        </table>
                        </form>  
                <?php endif;?>
            </div>
        </div>
        </body>
</html>
