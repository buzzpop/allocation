<!doctype html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=BASE_URL?>/public/css/default.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<header>
    <div class="row justify-content-center bg-dark text-white p-2">
        <h4>Room Allocation Management</h4>
    </div>
    <div class="row justifer-content-center p-2" id="menu">
        <nav  class="navbar navbar-expand-sm  w-100">

            <!-- Links -->
            <ul class="navbar-nav w-100 justify-content-between ml-4 mr-4">
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/etudiant/index">Register Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/etudiant/lists">List Students</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="<?=BASE_URL?>/chambre/room">List Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/batiment/index">Register Building</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/chambre/index">Register Room</a>
                </li>
            </ul>
        </nav>
    </div>

</header>
    <div class=" container-fluid d-flex justify-content-center align-items-center "  id="main">

    <!--Start layout-->

        <!--affichage des views dans le layout-->
        <?=$dynamic_view?>
    </div>
</div>
</body>
</html>
