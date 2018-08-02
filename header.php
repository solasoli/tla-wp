<?php

// template for header

$url = home_url();


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>

    

    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="<?php echo get_template_directory(); ?> . /css/bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<header>
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle slide-nav"
                        data-toggle="collapse" data-target="#thongleeNavbar"
                        aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="ic<on-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand channel" href="index.html"><img src="img/thonglee-logo.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="thongleeNavbar">
                <ul class="nav navbar-nav hidden-xs hidden-sm">
                    <li class="active"><a href="index.html">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!--End of Navbar-->
</header>