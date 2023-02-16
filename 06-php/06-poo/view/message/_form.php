<form action="<?php echo $action??"" ?>" method="post">
    <!-- Je met un require optionnel -->
    <textarea 
    name="message" 
    placeholder="Edition du message" 
    cols="30" 
    rows="10"
    <?php echo $required??"" ?>
    ><?php echo $message["message"]??"" ?></textarea>
    <span class="error"><?php echo $error["message"]??"" ?></span>
    <br>
    <div>
        <select name="categorie">
            <option value="">Selection de Catégorie</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat["idCat"] ?>"
                <?php if(($message["idCat"]??"" )== $cat["idCat"]) echo "selected" ?>
                >
                    <?php echo $cat["nom"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- Je change la value et le name de mon bouton -->
    <input type="submit" value="Envoyer" name="messageForm">
</form>