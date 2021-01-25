<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php?page=home">
		<img src="https://www.pngkit.com/png/detail/133-1331721_red-dollar-sign-png-dollar-sign-icon-red.png" width="30" height="30" class="d-inline-block align-top" alt="">
		Jednostka Rozliczająca
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		<li class="nav-item active">
			<a class="nav-link" href="index.php?page=akceptacja_przelewow">Akceptacja przelewów<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index.php?page=przelewy">Przelewy</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index.php?page=historia_przelewow">Historia Przlewów</a>
		</li>
		</ul>
	</div>
        <form action="index.php?page=main.php" method="post" class="form-inline">	
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Wyloguj</button>
		</form>	
</nav>

    <?php
        $current_page = isset($_GET['page']) ? $_GET['page'] : null; 

        switch ($current_page){
                        
            case 'home':
                default;
                include $_SERVER['DOCUMENT_ROOT'].'/J_rozliczajaca/UI/html/home.php';
                break;

            case 'akceptacja_przelewow':
                include $_SERVER['DOCUMENT_ROOT'].'/J_rozliczajaca/UI/html/akceptacja_przelewow.php';
                break;

            case 'przelewy':
                include $_SERVER['DOCUMENT_ROOT'].'/J_rozliczajaca/UI/html/przelewy.php';
                break;

            case 'historia_przelewow':
                include $_SERVER['DOCUMENT_ROOT'].'/J_rozliczajaca/UI/html/historia_przelewow.php';
                break; 
        }
    ?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
{
    func();
}
function func()
{
    session_destroy();
    redirect('index.php?page=login');
    exit;    
}
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
    }
    else
    {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
?>