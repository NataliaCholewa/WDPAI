<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/categories.css">


    <script src="https://kit.fontawesome.com/8c2331d8ee.js" crossorigin="anonymous"></script>
    <title>Main page</title>
</head>

<body>

<div class="base-container">
    <nav>
        <img src="public/img/logo.svg" alt="FridgeBuddy Logo">
        <ul>
            <li><i class="fa-solid fa-plus"></i> <a href="addProductForm" class="button">add item</a></li>
            <li><i class="fa-solid fa-plus"></i><a href="addList" class="button">add grocery list</a></li>
            <li><i class="fa-solid fa-cart-shopping"></i> <a href="groceryLists" class="button">grocery lists</a></li>
            <li><i class="fa-solid fa-right-from-bracket"></i> <a href="logout" class="button">log out</a></li>
        </ul>
    </nav>
    <main>


        <section class="grocery-lists">
            <h1>Your Grocery Lists</h1>

            <div class="list-wrapper">
                <br><br><br> <!-- Dodane entery -->
                <?php if (!empty($files)): ?>
                    <ul class="list-container">
                        <?php foreach ($files as $file): ?>
                            <li class="list-item">
                                <i class="fa-solid fa-file-alt"></i>
                                <a href="public/uploads/<?= htmlspecialchars($file) ?>" class="list-link"><?= htmlspecialchars($file) ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="no-lists"><i class="fa-solid fa-exclamation-circle"></i> No grocery lists uploaded yet.</p>
                <?php endif; ?>
            </div>
        </section>






    </main>

</div>

</body>
</html>
