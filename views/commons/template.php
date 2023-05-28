<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Meddon&display=swap" rel="stylesheet">
    <meta name="description" content="<?= $page_description ?>">
    <link rel="stylesheet" href="<?= URL ?>public/style/style.css">
    <title><?= $page_title ?></title>
</head>

<body>

    <?php require_once("views/commons/header.php") ?>

    <?php
    if (!empty($_SESSION['alert'])) {
        foreach ($_SESSION['alert'] as $alert) {
            echo "<div class='alert " . $alert['type'] . "' role='alert'>
                        " . $alert['message'] . "
                    </div>";
        }
        unset($_SESSION['alert']);
    }
    ?>
    <div class="bodycontent">
        <?= $page_content ?>
    </div>

    
    <?php require_once("views/commons/footer.php") ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php if (!empty($js)) : ?>
        <?php foreach ($js as $fichierJS) : ?>
            <script src="<?= URL ?>public/javascript/<?= $fichierJS ?>"> </script>
        <?php endforeach ?>
    <?php endif ?>

    <script src="<?= URL ?>public/javascript/navbar.js"></script>
    <script src="<?= URL ?>public/javascript/admin.js"></script>
</body>

</html>