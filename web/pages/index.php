<?php 
    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101014">
    <!-- basic style -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <!-- Special style for page  -->
    <link rel="stylesheet" href="/public/style/pages/indexStyle.css">
    <link rel="icon" href="/public/style/inc/icons/gradeless_logo.svg">
    <title>We're Gradeless</title>
</head>
<body>
    <h1>Gradeless</h1>

    <header>
        <h2>Welcome to Gradeless</h2>
        <p>A plattfrom for students by students</p>

        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="128" viewBox="0 0 48 128" fill="none">
            <path d="M1.64572 25.472V7.83545H4.41601V10.3314H6.88458V12.8H9.40801V20.2332H11.6023V7.83545H14.4V25.472H11.6023V23.0035H9.13372V20.5075H6.61029V13.0743H4.41601V25.472H1.64572ZM19.6774 25.472V23.0035H17.1814V15.296H19.6774V12.8H27.4124V15.296H29.9358V22.7292H32.4318V25.472H29.6615V23.0035H27.4124V25.472H19.6774ZM19.9517 22.7292H27.1381V15.5429H19.9517V22.7292ZM37.9973 25.472V23.0035H35.5013V18.0114H33.0053V12.8H35.7756V17.7372H38.2441V22.7292H40.4933V17.7372H42.9618V12.8H45.7596V18.0114H43.2361V23.0035H40.7676V25.472H37.9973Z" fill="#4BFBA2"/>
            <path d="M26.2857 59.4286V58.2858H24V59.4286H26.2857ZM25.1429 126.857L31.7413 115.429H18.5446L25.1429 126.857ZM24 59.4286V116.571H26.2857V59.4286H24Z" fill="#4BFBA2"/>
        </svg>
    </header>

    <nav>
        <?php echo drawNavbar() ?>
    </nav>
</body>
</html>