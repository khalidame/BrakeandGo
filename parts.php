<!DOCTYPE html>
<html>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />

</head>

<body>

    <div class="page-header">

        <?php require_once 'includes/header.php' ?>
    </div>

    <div class="page-body w-100 h-100">

        <div class="container h-100">
        
            <div class="container-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Select Your Vehicle </h1>
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
            </div>
        </div>
    </div>
</body>

</html>