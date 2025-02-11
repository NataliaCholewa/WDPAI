<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($categoryName) ? htmlspecialchars($categoryName) . " Products" : "Products" ?></title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css?v=<?= time() ?>">
    <script>
        function updateExpirationColors() {
            let today = new Date().toISOString().split('T')[0]; // Dzisiejsza data
            document.querySelectorAll('.expiration-date').forEach(el => {
                let expDate = el.dataset.date;
                if (expDate < today) {
                    el.style.color = "red"; // Przeterminowane
                } else {
                    let daysLeft = (new Date(expDate) - new Date(today)) / (1000 * 60 * 60 * 24);
                    el.style.color = daysLeft <= 3 ? "orange" : "green"; // <=3 dni – pomarańczowy, więcej – zielony
                }
            });
        }

        window.onload = updateExpirationColors;
    </script>
</head>
<body>

<div class="base-container">
    <nav>
        <img src="public/img/logo.svg" alt="FridgeBuddy Logo">
        <ul>
            <li><i class="fa-solid fa-plus"></i> <a href="addProductForm" class="button">Add item</a></li>
            <li><i class="fa-solid fa-plus"></i><a href="addList" class="button">Add grocery list</a></li>
            <li><i class="fa-solid fa-cart-shopping"></i> <a href="groceryLists" class="button">Grocery lists</a></li>
            <li><i class="fa-solid fa-right-from-bracket"></i> <a href="logout" class="button">Log out</a></li>
        </ul>
    </nav>

    <main>
        <header class="category-header">
            <h1><?= htmlspecialchars($categoryName) ?> Products</h1>
        </header>



        <section class="products">
            <?php if (empty($products)): ?>
                <p>No products in this category.</p>
            <?php else: ?>
                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <h2><?= htmlspecialchars($product['name']) ?></h2>
                            <p>Expires on:
                                <span class="expiration-date" data-date="<?= htmlspecialchars($product['expiration_date']) ?>">
                                    <?= htmlspecialchars($product['expiration_date']) ?>
                                </span>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>
</div>

</body>
</html>

