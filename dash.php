<!DOCTYPE html>
<!-- saved from url=(0056)https://getbootstrap.com.br/docs/4.1/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com.br/favicon.ico">

    <title>Dashboard FOR</title>

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </style>

<style type="text/css">
  @media only screen and (max-width: 600px) {
    body {
      width : 350px;
      text-align: center;
    }
  }


</style>

  <body>
    <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="https://getbootstrap.com.br/docs/4.1/examples/dashboard/#">Flooding on Route</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="https://getbootstrap.com.br/docs/4.1/examples/dashboard/#">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="https://getbootstrap.com.br/docs/4.1/examples/dashboard/#">
                  
                  Dashboard <span class="sr-only">(atual)</span>
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="?pagina=aca" style="color:#000;text-decoration: none"> 
                  
              <i class="fas fa-box"></i>&nbsp;Nível
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="?pagina=clientes" style="color:#000;text-decoration: none">

              <i class="far fa-user"></i>&nbsp;Temperatura
                </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="?pagina=vendas" style="color:#000;text-decoration: none">

              <i class="fas fa-dollar-sign"></i>&nbsp;Umidade

                </a>
              </li>
            </ul>
          </div>
        </nav>
      <!-- conteudo  -->

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
              
            </div>
          </div>

         <?php
        if(isset($_GET['pagina'])) {
        
          switch ($_GET['pagina']) {
            case 'aca':
            echo '<h2>Altura da coluna</h2>';
            include 'graficos/graficos.php'; 
            
            break;

            case 'temperatura':
              echo '<h2>Temperatura</h2>';
            
            break;

            case 'umidade':
              echo '<h2>Umidade</h2>';

            
            break;

            default:
            echo '<h2>Flooding on Route</h2>';
            include 'default.php'; 
            include 'default2.php'; 

            break;
          }


        }
         ?>


        </main>
      </div>
    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body></html>