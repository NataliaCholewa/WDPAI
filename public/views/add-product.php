<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Add Product</title>
</head>
<body>

<div class="base-container">
    <!-- Boczne menu -->
    <nav>
        <img src="public/img/logo.svg" alt="FridgeBuddy Logo">
        <ul>
            <li><i class="fa-solid fa-plus"></i> <a href="addProductForm" class="button">add item</a></li>
            <li><i class="fa-solid fa-plus"></i><a href="addList" class="button">add grocery list</a></li>
            <li><i class="fa-solid fa-cart-shopping"></i> <a href="groceryLists" class="button">grocery lists</a></li>
            <li><i class="fa-solid fa-right-from-bracket"></i> <a href="logout" class="button">log out</a></li>
        </ul>
    </nav>

    <!-- Główna zawartość strony -->
    <main>
        <div class="container">
            <h1>Add a new product</h1>
            <form action="addProduct" method="POST">
                <input type="text" name="name" placeholder="Product name" required>

                <select name="category" required>
                    <option value="">Select category</option>
                    <option value="1">Fruits</option>
                    <option value="2">Vegetables</option>
                    <option value="3">Protein</option>
                    <option value="4">Others</option>
                </select>

                <input type="date" name="expiration_date" required>

                <button type="submit">Add Product</button>
            </form>
        </div>
    </main>
</div>

</body>
</html>
