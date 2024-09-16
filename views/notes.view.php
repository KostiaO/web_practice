<?php require("partials/head.php") ?>
<?php require("partials/banner.php") ?>
<?php require("partials/nav.php") ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <?= $heading ?>
        </div>
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a
                        href="<?= "/note?id={$note["id"]}" ?>"
                    >
                        <?= $note["title"] ?>
                    </a> 
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
<?php require("partials/footer.php") ?>
