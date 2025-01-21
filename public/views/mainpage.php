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

            <div class="welcome-message">
                <h1>Welcome! These are the items in your fridge: </h1>
            </div>

            <!-- add name of user to welcome message-->

            <section class="categories">
                <div id="cat-1" class="category category-fruits">
                    <img src="public/img/uploads/frr.png" alt="Fruits">
                    <div class="category-name">
                        <h2>fruits</h2>
                    </div>
                </div>
                <div id="cat-2" class="category category-vegetables">
                    <img src="public/img/uploads/veget.webp" alt="Vegetables">
                    <div class="category-name">
                        <h2>vegetables</h2>
                    </div>
                </div>
                <div id="cat-3" class="category category-protein">
                    <img src="public/img/uploads/eggs.webp" alt="Protein">
                    <div class="category-name">
                        <h2>protein</h2>
                    </div>
                </div>
                <div id="cat-4" class="category category-others">
                    <img src="public/img/uploads/others.png" alt="Others">   <!-- change pics-->
                    <div class="category-name">
                        <h2>others</h2>
                    </div>
                </div>


            </section>
        </main>
        
    </div>

</body>
</html>
