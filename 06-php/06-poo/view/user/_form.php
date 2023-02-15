<form action="" method="post">
    <!-- username -->
    <label for="username">Nom d'Utilisateur :</label>
    <input 
        type="text" 
        name="username" 
        id="username" 
        <?php echo $required??""?>
        value="<?php echo $user['username']??""?>"
    >
    <span class="error"><?php echo $error["username"]??"" ?></span>
    <br>
    <!-- Email -->
    <label for="email">Adresse Email :</label>
    <input 
        type="email" 
        name="email" 
        id="email" 
        <?php echo $required??""?>
        value="<?php echo $user['email']??""?>"
    >
    <span class="error"><?php echo $error["email"]??"" ?></span>
    <br>
    <!-- Password -->
    <label for="password">Mot de Passe :</label>
    <input type="password" name="password" id="password" <?php echo $required??""?>>
    <span class="error"><?php echo $error["password"]??"" ?></span>
    <br>
    <!-- password verify -->
    <label for="passwordBis">Confirmation du mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBis" <?php echo $required??""?>>
    <span class="error"><?php echo $error["passwordBis"]??"" ?></span>
    <br>
    <input type="submit" value="Enregistrer" name="userForm">
</form>