<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
</head>

<body>
<div class="container-fluid">
        <?php require_once 'includes/header.php' ?>
        <div class='container' >
            <div class="row home-body">
                <!-- <div class="col-md-8 col-sm-12 home-picture">
                    <img src="images/part-4.jpg" alt="car"/>
                </div>        -->

                <div id="carouselExampleIndicators" class="col-lg-8 col-sm-12 carousel slide home-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/carousel/part-4.jpg" alt="Brake & Go">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/carousel/part-4-1.jpg" alt="Brake & Go">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/carousel/part-4-2.jpg" alt="Brake & Go">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/carousel/part-4-3.jpg" alt="Brake & Go">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/carousel/part-4-4.jpg" alt="Brake & Go">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-12 text-center m-auto home-text">
                    <p>Our mission is to focus on you and your car providing good quality products so you can always get where you are going safely and reliably.</p>
                </div>
            </div> 
        </div>

        <div class='container marketing'>
            <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/part-3.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>High quality parts</h2>
                <p>some content will be here</p>
                
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 div-center">
                <img class="rounded-circle" src="images/part-2.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Best engines</h2>
                <p>some content will be here</p>
                
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/part-1.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Genuine parts</h2>
                <p>some content will be here</p>
                <!-- <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p> -->
            </div><!-- /.col-lg-4 -->
            </div>
        </div>
        <hr/>
        <footer class="container">
            <p class="float-right"><a href="#log">Back to top</a></p>
            <p>© 2020 Brake&Go, Inc.</p>
        </footer>
</div>   
</body>
</html>