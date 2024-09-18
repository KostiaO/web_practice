<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<?php require base_path("views/partials/nav.php") ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <?= $heading ?>
        </div>
        <h1><?= $note["title"] ?></h1>

        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input 
                type="hidden" 
                name="id" 
                value="<?= $note['id'] ?>"
            >
            <button
                class="text"
            >
                Delete
            </button>
        </form>

        <a href="/notes">Go back</a>
    </main>
<?php require base_path("views/partials/footer.php") ?>
