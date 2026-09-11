<main class="devwebcamp">
    <h2 class="devwebcamp__heading">
        <?= $titulo ?>
    </h2>
    <p class="devwebcamp__descripcion">
        Conoce la conferencia más importante de Latinoamérica
    </p>
    <div class="devwebcamp__grid">
        <div class="devwebcamp__imagen">
            <picture>
                <source
                    srcset="/img/sobre_devwebcamp.avif"
                    type="image/avif"
                >
                <source
                    srcset="/img/sobre_devwebcamp.webp"
                    type="image/webp"
                >
                <img
                    loading="lazy"
                    width="200"
                    height="300"
                    src="/img/sobre_devwebcamp.jpg"
                    alt="Imagen sobre_devwebcamp"
                >
            </picture>
        </div>
        <div class="devwebcamp__contenido">
            <p class="devwebcamp__texto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil sint deserunt similique autem atque quia
                reiciendis eveniet blanditiis pariatur praesentium! Ducimus voluptas aspernatur ipsum labore, similique
                eius at maiores nam!
            </p>
            <p class="devwebcamp__texto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil sint deserunt similique autem atque quia
                reiciendis eveniet blanditiis pariatur praesentium! Ducimus voluptas aspernatur ipsum labore, similique
                eius at maiores nam!
            </p>
        </div>
    </div>
</main>