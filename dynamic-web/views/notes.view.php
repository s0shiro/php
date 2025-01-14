<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li>
                        <a href="/php/dynamic-web/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

            <p class="mt-6 border border-solid border-black w-1/6 p-3 rounded-lg bg-blue-500">
                <a href="/php/dynamic-web/notes/create" class="text-white hover:text-black">+ Create Note</a>
            </p>
        </div>
    </main>

<?php require("partials/footer.php") ?>