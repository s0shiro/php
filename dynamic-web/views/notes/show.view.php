<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a href="/notes" class="text-blue-500 hover:underline">View Notes...</a>
            </p>
            <p><?= $note['body'] ?></p>

            <form method="POST" action="/notes/delete" class="mt-6">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </form>

        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>