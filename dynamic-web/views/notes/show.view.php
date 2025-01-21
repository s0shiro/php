<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 hover:underline">View Notes...</a>
            </p>
            <p><?= $note['body'] ?></p>

            <p class="mt-6">
                <a href="/note/edit?id=<?= $note['id']?>" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</a>
            </p>

        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>