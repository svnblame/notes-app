<?php
    require(__DIR__ . '/../partials/head.php');
    require(__DIR__ . '/../partials/nav.php');
    require(__DIR__ . '/../partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-4">
            <a href="/notes" class="text-blue-600 hover:underline">Back to Notes</a>
        </p>
        <p><?= htmlspecialchars($note['body']) ?></p>
    </div>
</main>

<?php require(__DIR__ . '/../partials/foot.php'); ?>
