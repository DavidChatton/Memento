<div class="bg-form">
    <div class="wrapper">
        <form action="" method="post">
            <h1>Crée un post it</h1>
            <div class="input-box">
                <input type="text" placeholder="Titre du post-it" name="title" required="" spellcheck="false">
            </div>
            <div class="input-box">
                <input type="date" placeholder="Votre email" name="date" required="" spellcheck="false">
            </div>
            <div class="input-box">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Votre message"></textarea>
            </div>
            <input type="hidden" name="token" value="<?= $_SESSION['token']?>">
            <button type="submit" class="btn">Créer</button>

        </form>
    </div>
</div>