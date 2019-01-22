<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['start']))
{
    $wp_dbname = $_POST["wp_dbname"];
    $wp_dbuser = $_POST["wp_dbuser"];
    $wp_dbpass = $_POST["wp_dbuser"];
    $wp_dbpass = $_POST["wp_dbpass"];  
    $wp_dbhost = $_POST["wp_dbhost"];
    $wp_dir = $_POST["wp_dir"];
    $check_conf = $_POST["check_conf"];
    $wp_url = $_POST["wp_url"];
    $wp_title = $_POST["wp_title"];
    $wp_admin = $_POST["wp_admin"];
    $wp_pass = $_POST["wp_pass"];
    $wp_email = $_POST["wp_email"];

    $file = fopen("wp-set.txt", "w") or die("Unable to open file!");;
    fwrite($file, $wp_dbname."\n");
    fwrite($file, $wp_dbuser."\n");
    fwrite($file, $wp_dbpass."\n");
    fwrite($file, $wp_dbhost."\n");
    fwrite($file, $wp_dir."\n");
    fwrite($file, $check_conf."\n");
    fwrite($file, $wp_url."\n");
    fwrite($file, $wp_title."\n");
    fwrite($file, $wp_admin."\n");
    fwrite($file, $wp_pass."\n");
    fwrite($file, $wp_email."\n");

    fclose($file);    
           
    install();
}

function install() 
{
    echo "Install...";
    system('python wp-install.py');
    system('rm wp-install.py');
    system('rm wp-set.txt');
    exit;
};

echo "<head>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'></script>
</head>";

echo "<body class='container bg-light'>
      <div class='py-5 text-center'>
        <h2>WP AUTO INSTALLER</h2>
        <p class='lead'>Uwaga przed instalacją uzupełnij wszystkie pola i tyle :)</p>
      </div>

      <div class='row'>
        <div class='col-md-4 order-md-2 mb-4'>

        </div>
        <div class='col-md-8 order-md-1'>
          <h4 class='mb-3'>Dane potrzebne do instalacji:</h4>
          <form action='index.php' method='post' class='needs-validation' novalidate>

            <div class='mb-3'>
              <label for='address'>Nazwa bazy:</label>
              <input type='text' class='form-control' name='wp_dbname'>
            </div>

            <div class='mb-3'>
              <label for='address'>Login do bazy:</label>
              <input type='text' class='form-control' name='wp_dbuser'>
            </div>

            <div class='mb-3'>
              <label for='address'>Hasło do bazy:</label>
              <input type='text' class='form-control' name='wp_dbpass'>
            </div>

            <div class='mb-3'>
              <label for='address'>Adres hosta bazy:</label>
              <input type='text' class='form-control' name='wp_dbhost'>
            </div>

            <div class='mb-3'>
              <label for='address'>Nazwa folderu instalacji:</label>
              <input type='text' class='form-control' name='wp_dir' placeholder='example.com'>
            </div>

            <h5 class='mb-3'>Czy skonfigurować WP?</h5>

            <div class='d-block my-3'>
              <div class='custom-control custom-radio'>
                <input id='nie' name='check_conf' type='radio' class='custom-control-input' checked required value='0'>
                <label class='custom-control-label' for='nie'>Nie</label>
              </div>
              <div class='custom-control custom-radio'>
                <input id='tak' name='check_conf' type='radio' class='custom-control-input' required value='1'>
                <label class='custom-control-label' for='tak'>Tak</label>
              </div>
            </div>

            <div class='mb-3'>
              <label for='address'>Pełny adres strony:</label>
              <input type='text' class='form-control' name='wp_url' placeholder='http://www.example.com'>
            </div>

            <div class='mb-3'>
              <label for='address'>Tytuł strony:</label>
              <input type='text' class='form-control' name='wp_title' placeholder='example.com'>
            </div>

            <div class='mb-3'>
              <label for='address'>Admin login:</label>
              <input type='text' class='form-control' name='wp_admin'>
            </div>

            <div class='mb-3'>
              <label for='address'>Admin hasło:</label>
              <input type='text' class='form-control' name='wp_pass'>
            </div>

            <div class='mb-3'>
              <label for='address'>Admin email:</label>
              <input type='text' class='form-control' name='wp_email'>
            </div>

            <hr class='mb-4'>
            <button class='btn btn-primary btn-lg btn-block' type='submit' name='start'>Instaluj WP</button>
          </form>
        </div>
      </div>

      <footer class='my-5 pt-5 text-muted text-center text-small'>
        <p class='mb-1'>&copy; 2019 github.com/ciszakdamian </p>
      </footer>
    </div>
</body>";

?>

