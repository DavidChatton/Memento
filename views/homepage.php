<head> 
    <title>Page d'Acceuil</title>
</head>
<section class="section-homepage" aria-label="Section Memento de <?php echo $firstname;?>">
        <h1 class="title-homepage"> Memento de <?php echo $firstname;?></h1>
        <a href="?page=create_post-it">
            <button class="add-post-it">
                <i class="ri-add-circle-fill"> Nouveau post-it </i>
            </button>
        </a>
</section>
<div class="content">
    <?php foreach ($datas as $data) { ?>
        <article class="post-it">
            <div class="post-it-header">
                <h2> <?php echo ($data['title']) ?></h2>
                <form method="post" action="">
                    <input type="hidden" name=id value="<?= ($data['id']) ?>">
                    <button data-id="<?= $data['id'] ?>" class="btn-delete-post-it" type="button" aria-label="button-delete-post-it">
                        <i class="fa-solid fa-circle-xmark" style="color: #333E83;"></i>
                    </button>
                </form>
            </div>
            <p class="content-post-it"> <?php echo ($data['content'])?></p>
            <hr>
            <p class="date-post-it"> Créé le <?php echo ($data['formatted_date'])?></p>
        </article>
    <?php } ?>
</div>
