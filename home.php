<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food blog</title>
    <?php require_once './folder/boot.php'?>
</head>
<body>
    <?php require_once "./navbar-components.php" ?>
    <?php require_once "./folder/hero.php" ?>

    <div class="container">
         <div class="landing">
            <h1 class="text-center m-4">Welcome to the Food Blog!</h1>
            <p class="m-3">Welcome to a delectable journey into the world of sweets, where sugar, spice, and everything nice come together to create delightful masterpieces! Our culinary website is your gateway to a realm of irresistible confections, with a focus on both baked and no-bake sweets.</p>
            <p class="m-3">If you've got a penchant for all things sugary, you're in for a treat. Whether you're a seasoned dessert enthusiast or a newbie baker, our platform is designed to inspire your inner sweet tooth and guide you on a mouthwatering adventure.<br>
            But wait, there's more! While our current spotlight is on sweets, we're not stopping there. We're excited to share that in the near future, we'll be expanding our offerings to include a dedicated section for savory recipes. So, if you're a fan of savory delights too, stay tuned for what's cooking in our savory kitchen.</p>
            <p class="m-3">Our mission is to celebrate the joy of indulgence. We'll equip you with the knowledge, techniques, and an array of recipes to create delectable treats that will make your taste buds sing. Whether you're yearning for the comforting embrace of freshly baked goods or the ease of no-bake desserts, we've got you covered.</p>
            <p class="m-3">Join us on this scrumptious journey as we explore the art of crafting baked and no-bake sweets that will leave you and your loved ones craving for more. And soon, we'll introduce you to a world of savory delights that will tickle your taste buds in a whole new way.</p>
            <p class="m-3">Indulge your senses, experiment with flavors, and make every moment sweeter with the delightful recipes and inspiration you'll find here. Welcome to our sweet sanctuary, where your culinary dreams come to life, and where every bite is a celebration of the senses. Let's embark on this delectable adventure together!</p>

        </div>
    </div>
        
    <?php require_once "./folder/footer.php" ?>
</body>
</html>