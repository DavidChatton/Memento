<section>
    <header>
        <div class="header-link">
            <h4>Memento</h4>
        </div>
    </header>

    <section class="section-1">
        <h1> Memento </h1>
        <a href="create.php">
            <button class="btn-add"> Add Postit </button>
        </a>
        <h1>Bienvenue <?php echo $firstname; ?></h1>

    </section>
    <section class="container">
        <div class="container-post-it">
            <?php foreach ($datas as $data) { ?>
                <article class="post-it">
                    <div class="post-it-head">
                        <h4> <?php echo ($data['title']) ?></h4>

                        <form method="post" action="">
                            <input type="hidden" name=id value="<?= ($data['id']) ?>">
                            <button class="btn-post-it" type="submit" name="del_button"><i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    </div>
                    <p> <?php echo ($data['content']) ?> </p>
                    <p> <?php echo ($data['date']) ?> </p>
                </article>
            <?php } ?>
        </div>
    </section>
</section>