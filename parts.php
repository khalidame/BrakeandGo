<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/scss" href="Styles/Stylesheet.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require_once 'includes/header.php' ?>
        <div class='container'>
            <div class="row home-body justify-content-center pt-5">
                <div class="col-12 text-center">
                    <h3>Select Your Vehicle </h3>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Select Year...</option>
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                            <option>2014</option>
                            <option>2013</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Select Make...</option>
                            <option>Honda</option>
                            <option>Toyota</option>
                            <option>Mazda</option>
                            <option>Jeep</option>
                            <option>Ford</option>
                            <option>Kia</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Select Model...</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <p>We are still working on this page</p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>