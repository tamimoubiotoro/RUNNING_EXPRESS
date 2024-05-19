<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="monstyle.css">
    <title>Change Profile</title>
</head>
<body>
        <div class="nav">
                <div class="logo">
                    <p> <a href=""> Logo </a></p>
                </div>
        
                <div class="right-links">
                    <a href="#">Changer de Profile</a>
                    <a href=""> <button class="btn">Log Out</button></a>
                </div>
        </div>
        <div class="container">
                <div class="form-box">
                    <header>Change Profile</header>
                    <form action="" method="post" >
                            <div class="fild input">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" autocomplete="off" required >
                            </div>
        
                        <div class="fild input">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" autocomplete="off" required >
                        </div>
        
                        <div class="fild input">
                            <label for="age">Âge</label>
                            <input type="number" name="age" id="age" autocomplete="off" required >
                        </div>
        
                        <div class="fild">
                            <input type="submit" class="btn" name="submit" value="Mettre à jour" required >
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>