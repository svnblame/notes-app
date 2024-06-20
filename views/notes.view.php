<?php
    require('partials/head.php');
    require('partials/nav.php');
    require('partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php if (! empty($notes)) : ?>
                <?php foreach ($notes as $note) : ?>
                    <li>
                        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-600 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
        </ul>
            <?php else : ?>
            <p>You do not have any notes to display</p>
            <?php endif; ?>

        <p class="mt-6">
            <a href="/note/create" class="text-blue-600 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require('partials/foot.php'); ?>

