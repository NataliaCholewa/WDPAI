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

        <div class="welcome-message">
            <h1>Welcome! These are the items in your fridge:</h1>
        </div>

        <section class="categories">
            <div id="cat-1" class="category category-fruits" onclick="window.location.href='category?name=fruits'">
                <img src="public/img/uploads/frr.png" alt="Fruits">
                <div class="category-name">
                    <h2>Fruits</h2>
                </div>
            </div>
            <div id="cat-2" class="category category-vegetables" onclick="window.location.href='category?name=vegetables'">
                <img src="public/img/uploads/veget.webp" alt="Vegetables">
                <div class="category-name">
                    <h2>Vegetables</h2>
                </div>
            </div>
            <div id="cat-3" class="category category-protein" onclick="window.location.href='category?name=protein'">
                <img src="public/img/uploads/eggs.webp" alt="Protein">
                <div class="category-name">
                    <h2>Protein</h2>
                </div>
            </div>
            <div id="cat-4" class="category category-others" onclick="window.location.href='category?name=others'">
                <img src="public/img/uploads/others.png" alt="Others">
                <div class="category-name">
                    <h2>Others</h2>
                </div>
            </div>
        </section>

    </main>
</div>

</body>
</html>
