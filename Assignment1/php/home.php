<html>
    <head><title>George's Groceries</title></head>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <header>
        <nav class="topnav">
            <ul>
                <div class="d-inline-block float-start logo-group">
                    <img class="logo" src="../assets/index/Logo.png">
                    <h1 class="logo-heading d-inline-block">George's Groceries</h1>
                </div>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php?category=fruits">Fruits/Veg</a></li>
                <li><a href="products.php?category=snacks">Snacks</a></li>
                <li><a href="products.php?category=breakfast">Breakfast</a></li>
                <li><a href="products.php?category=meat_seafood">Meat/Seafood</a></li>
                <li><a href="products.php?category=bakery">Bakery</a></li>
                <form class="d-flex ms-auto search_bar" method='POST' action='products.php'>
                    <input type="text" name='search_text' id='search_text' class='search-box' placeholder="Search Product">
                    <button class="btn btn-success" type='submit' value='Search'>Search</button>
                </form>
            </ul>
        </nav>
    </header>





<body>
        
        <body>
        <div class="col-md-8">
            <div>
                <h1 class="dashboard-padding">Categories:</h1>
            </div>
        
            <div class="row dashboard-padding">
                
                <div class="col-3">
                    <a href="products.php?category=fruits" class="link-card">
                        <div class="card">
                            <img src="../assets/img/fruits_veg.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Fruits/Veg</h5>
                            </div>
                        </div>
                    </a>
                </div>
                
                
                <div class="col-3 ">
                    <a href="products.php?category=snacks" class="link-card">
                        <div class="card">
                            <img src="../assets/img/snacks.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Snacks</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="products.php?category=breakfast" class="link-card">
                        <div class="card">
                            <img src="../assets/img/breakfast.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Breakfast</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row dashboard-padding">
                <div class="col-3">
                    <a href="products.php?category=meat_seafood" class="link-card">
                        <div class="card">
                            <img src="../assets/img/seafood.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Meat/Seafood</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="products.php?category=bakery" class="link-card">
                        <div class="card">
                            <img src="../assets/img/bakery.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bakery</h5>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        

        
        <div class="container pt-5"></div>

    </body>