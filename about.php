<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Red store Login and signup</title>
    <link rel="shortcut icon" type="image" href="img/logos/logo-white.png">
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/about.css">
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("mybtn");


            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }

            var dots2 = document.getElementById("dots2");
            var moreText2 = document.getElementById("more2");
            var btnText2 = document.getElementById("mybtn2");

            if (dots2.style.display === "none") {
                dots2.style.display = "inline";
                btnText2.innerHTML = "Read more";
                moreText2.style.display = "none";
            } else {
                dots2.style.display = "none";
                btnText2.innerHTML = "Read less";
                moreText2.style.display = "inline";
            }
        }
    </script>
</head>

<body>
    <?php
    include("totop.php");
    ?>

    <!-- Account Page -->

    <div class="about-page">
        <div class="container">
            <div class="row">
                <div class="bg-text">
                    <h2>About US</h2>
                    <h1>I'm Muhammad Arslan</h1>
                    <p>And I'm a WEB DEVELOPER</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US  -->
    <div class="about">
        <div class="small_container">
            <div class="row">
                <h2>About us</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span><span id="more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p> -->
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Assumenda laudantium quasi vel eum autem consequatur iusto odio nulla incidunt distinctio!
                    Id quam assumenda veritatis dolores quae sit quasi fugit natus provident rem, ab deleniti
                    quibusdam repellendus quo deserunt at fuga temporibus minima sint nisi, sequi corrupti
                    laboriosam vitae. Optio illo iusto harum, provident id aliquid odio rerum cumque laborum
                    eligendi distinctio deserunt vitae, architecto non ex illum assumenda, recusandae ad delectus
                    magnam consequatur? Eveniet, ipsum veritatis dolores iusto sit exercitationem labore molestiae
                    magni quam unde qui nam tempora asperiores a odio necessitatibus nemo magnam quas
                    reprehenderit repellendus explicabo! Officiis perspiciatis dolore vitae reiciendis,
                    <span id="dots">...</span><span id="more">
                    nesciunt adipisci dolorem ipsum illo consectetur labore sint obcaecati tenetur nemo
                    amet doloribus dolores commodi voluptate atque beatae at laborum cum blanditiis? Quia
                    quae possimus suscipit omnis ad vero illo sapiente necessitatibus nesciunt ducimus sint,
                    placeat recusandae nobis in! Soluta quam totam minus beatae consequuntur nisi facere quis
                    quo amet? Quo natus hic animi ipsa quas! Accusantium tempora, maxime vero
                    incidunt necessitatibus dolores eum sint obcaecati, neque eligendi id, excepturi
                    laborum molestiae minus ex. A ratione voluptatum est aspernatur veritatis cumque,
                    ipsum ab accusantium in blanditiis! Maxime error, quos placeat ut exercitationem
                    recusandae amet dignissimos tempore neque voluptatem, earum perferendis rem provident.
                    Placeat quod, dolor rem quo alias repellat, cum voluptatem labore ullam dolore sunt
                    est eveniet facilis nesciunt aperiam ad doloremque quaerat corrupti voluptatum quisquam
                    reiciendis quidem. At blanditiis, harum sint fugit repudiandae dolorum soluta,
                    accusamus consequatur sequi atque corporis rem impedit consectetur nemo repellendus.
                    Cumque, optio? Cum accusantium, quibusdam saepe veniam eius esse consectetur, libero
                    nostrum, ex mollitia maiores odio magnam laborum beatae facere rerum id asperiores
                    praesentium. Nostrum iste est, consequatur ut veniam perferendis nesciunt dolorum non
                    dolore in perspiciatis neque ullam possimus reiciendis obcaecati! Repellendus impedit
                    porro temporibus, fugit autem ea architecto aut.</span></p>
            </div>
            <button class="btn" onclick="myFunction()" id="mybtn">Read more</button>
        </div>
    </div>
      <!-- POLICIES  -->
    <div class="about">
        <div class="small_container">
            <div class="row">
                <h2>Policies</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span><span id="more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p> -->
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Assumenda laudantium quasi vel eum autem consequatur iusto odio nulla incidunt distinctio!
                    Id quam assumenda veritatis dolores quae sit quasi fugit natus provident rem, ab deleniti
                    quibusdam repellendus quo deserunt at fuga temporibus minima sint nisi, sequi corrupti
                    laboriosam vitae. Optio illo iusto harum, provident id aliquid odio rerum cumque laborum
                    eligendi distinctio deserunt vitae, architecto non ex illum assumenda, recusandae ad delectus
                    magnam consequatur? Eveniet, ipsum veritatis dolores iusto sit exercitationem labore molestiae
                    magni quam unde qui nam tempora asperiores a odio necessitatibus nemo magnam quas
                    reprehenderit repellendus explicabo! Officiis perspiciatis dolore vitae reiciendis,
                    <span id="dots2">...</span><span id="more2">
                    nesciunt adipisci dolorem ipsum illo consectetur labore sint obcaecati tenetur nemo
                    amet doloribus dolores commodi voluptate atque beatae at laborum cum blanditiis? Quia
                    quae possimus suscipit omnis ad vero illo sapiente necessitatibus nesciunt ducimus sint,
                    placeat recusandae nobis in! Soluta quam totam minus beatae consequuntur nisi facere quis
                    quo amet? Quo natus hic animi ipsa quas! Accusantium tempora, maxime vero
                    incidunt necessitatibus dolores eum sint obcaecati, neque eligendi id, excepturi
                    laborum molestiae minus ex. A ratione voluptatum est aspernatur veritatis cumque,
                    ipsum ab accusantium in blanditiis! Maxime error, quos placeat ut exercitationem
                    recusandae amet dignissimos tempore neque voluptatem, earum perferendis rem provident.
                    Placeat quod, dolor rem quo alias repellat, cum voluptatem labore ullam dolore sunt
                    est eveniet facilis nesciunt aperiam ad doloremque quaerat corrupti voluptatum quisquam
                    reiciendis quidem. At blanditiis, harum sint fugit repudiandae dolorum soluta,
                    accusamus consequatur sequi atque corporis rem impedit consectetur nemo repellendus.
                    Cumque, optio? Cum accusantium, quibusdam saepe veniam eius esse consectetur, libero
                    nostrum, ex mollitia maiores odio magnam laborum beatae facere rerum id asperiores
                    praesentium. Nostrum iste est, consequatur ut veniam perferendis nesciunt dolorum non
                    dolore in perspiciatis neque ullam possimus reiciendis obcaecati! Repellendus impedit
                    porro temporibus, fugit autem ea architecto aut.</span></p>
            </div>
            <button class="btn" onclick="myFunction()" id="mybtn2">Read more</button>
        </div>
    </div>


    <!-- For to read more button  -->


</body>


</html>
<?php
include("footer.php");
?>