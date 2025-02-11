<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/categories.css">

    <script src="https://kit.fontawesome.com/8c2331d8ee.js" crossorigin="anonymous"></script>
    <title>Add Grocery List</title>
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

    <!-- Główna zawartość -->
    <main>
        <section class="list-form">
            <h1>UPLOAD</h1>
            <form action="addList" method="POST" ENCTYPE="multipart/form-data">
                <?php
                if(isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <input name="title" type="text" placeholder="title">

                <input type="file" name="file">
                <button type="submit">send</button>
            </form>


        </section>
    </main>
</div>

</body>
</html>
