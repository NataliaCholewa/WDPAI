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
        <!-- menu: lista -->
        <ul>
            <li>
                <i class="fa-regular fa-user"></i>
                <a href="#" class="button">your profile</a> <!-- poki co puste przekierowanie, zmienic -->
            </li>
            <li>
                <i class="fa-solid fa-plus"></i>
                <a href="#" class="button">add item</a> <!-- poki co puste przekierowanie, zmienic -->
            </li>
            <li>
                <i class="fa-solid fa-plus"></i>  <!-- zmienic ikonke -->
                <a href="#" class="button">add grocery list</a> <!-- upload pliku txt dodac -->
            </li>
            <li>
                <i class="fa-solid fa-cart-shopping"></i> <!-- znalezc ikonke -->
                <a href="#" class="button">grocery lists</a> <!-- poki co puste przekierowanie, zmienic -->
            </li>

            <li>
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="#" class="button">log out</a> <!-- poki co puste przekierowanie, zmienic -->
            </li>
        </ul>

    </nav>
    <main>
        <header>


            <div class="search-bar">
                <form>
                    <input placeholder="search product">
                </form>

        </header>


        <section class="list-form">         <!-- to zedytowac -->
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
                <textarea name="description" rows="5" placeholder="description"></textarea>

                <input type="file" name="file">
                <button type="submit">send</button>
            </form>         <!-- dotad -->


        </section>
    </main>

</div>

</body>
</html>
