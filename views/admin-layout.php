<?php
$isDev = $_ENV['ENVIRONMENT'] === 'development';
$manifest = null;
if (!$isDev) {
    $manifestPath = __DIR__ . '/../public/build/.vite/manifest.json';
    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
    } else {
        // Si no existe manifest, fallback a dev
        $isDev = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>DevWebCamp - <?= $titulo ?? ''; ?></title>
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <?php if ($isDev): ?>
        <script
            type="module"
            src="http://localhost:5174/@vite/client"
        ></script>
        <link
            rel="stylesheet"
            href="http://localhost:5174/src/scss/app.scss"
        >
    <?php else: ?>
        <link
            rel="stylesheet"
            href="/build/<?= $manifest['src/scss/app.scss']['file'] ?? '' ?>"
        >
    <?php endif ?>
</head>

<body class="dashboard">
    <?php include_once __DIR__ . '/templates/admin-header.php'; ?>

    <div class="dashboard__grid">
        <?php include_once __DIR__ . '/templates/admin-sidebar.php'; ?>

        <main class="dashboard__contenido">
            <?= $contenido ?? ''; ?>
        </main>
    </div>

    <?php if ($isDev): ?>
        <script
            type="module"
            src="http://localhost:5174/src/js/app.js"
        ></script>
    <?php else: ?>
        <script
            src="/build/<?= $manifest['src/js/app.js']['file'] ?? '' ?>"
            defer
        ></script>
    <?php endif ?>
</body>

</html>