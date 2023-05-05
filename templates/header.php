<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Spot</title>
    <!-- Materialize CSS linked below -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type='text/css'>
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        .logo-description {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        @media only screen and (max-width: 992px) {
  .brand-text {
    margin-left: 50px;
  }
}
@media only screen and (max-width: 347px) {
  .write {
    position: absolute;
    top: 100px;
    left: 20%;
  }
}      
.footer{
    font-style: italic;
}     
 
    form{
        margin: 20px auto;
        padding:20px;
    }
    
    </style>
</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
    <div class="container">
    <a href="index.php" class="left brand-logo brand-text">Blog Spot</a>
         <?php if (basename($_SERVER['PHP_SELF']) !== 'add.php') : ?>
            <ul id='nav-mobile' class='right'>
                <li><a href="add.php" class="write btn brand z-depth-0">Write a Blog</a></li>
            </ul>
        <?php endif; ?>
    </div>
</nav>