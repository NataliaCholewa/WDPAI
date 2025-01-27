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



               <!-- tu bedzie lista zuploadowanych plikow txt przez uzytkownika -->
                                                <!-- sprawdzic czy git kod -->

        <section class="grocery-lists">
            <h1>Your Grocery Lists</h1>
            <ul>
                <?php


                if (isset($files)) {
                    foreach ($files as $file) {
                        echo "<li><a href='public/uploads/$file'>$file</a></li>";
                    }
                } else {
                    echo "<p>No grocery lists uploaded yet.</p>";                        // nie dziala ten else naprawic
                }
                ?>
            </ul>
        </section>

    </main>

</div>

</body>
</html>
