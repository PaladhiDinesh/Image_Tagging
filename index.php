
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Image Tagging</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link type="text/css" href="css/image_tag.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.sumoselect.js"></script>
    <link href="css/sumoselect.css" rel="stylesheet" />

    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function () {
           
            window.Search = $('.search-box').SumoSelect({ csvDispCount: 3, search: true });


        });
    </script>
    <style type="text/css">
        body{font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;color:#444;font-size:20px;width: 200px}
        p,div,ul,li{padding:0px; margin:0px;}
    </style>
    
</head>

<body>
      <style>
        .SumoSelect > .CaptionCont{
            width: 500px;
            border-width: 3px;
        }
        .SumoSelect.open > .optWrapper {
    width: 527px;
}
          #search_bar{
              margin-bottom: 40px; 
			  margin-right:290px;
          }
          .img-responsive{
              margin-bottom: 5px;
          }
          #body_container{
              margin-left: 250px;
          }
         
    </style>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                   
                </button>
                <a class="navbar-brand" href="#">Image Tagging</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
<!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <center>
   
    <div class="container" id = "body_container">
        <div id ="content" style = "border:2px solid #cbcbcb;margin-bottom:10px">
		 <?php
		 
		 $msg = "";
		 $image ="";
	//if upload button is pressed
	if (isset($_POST['upload'])&& !empty($_POST["upload"])){
		//the path to store the uploaded image
	
		$target = "images/".basename($_FILES['fileToUpload']['name']);
	//connect to the database
	$db = mysqli_connect("localhost", "root", "", "image_tagging");
	$sample = "a";
	$sample1="b";
	// var_dump($db);
	//Get all the submitted data from the form 
	$image = (string)$_FILES['fileToUpload']['name'];

	$sql = "INSERT INTO image_table(image_tag,image_path) VALUES('sample1','$image')";
	mysqli_query($db,$sql)or die("Failed to query database".mysql_error()); //stores the submitted data into the database table : image_table


//uploaded images into the folder
	 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target)){
		 $msg = "Image Uploaded Successfully";
	 }
	 else{
		 $msg = "There was a problem uploading image";
	 }

		 echo "<div id = 'img_div'>";
		echo "<img src= 'images/".$image."'style =\"width:40%;padding:5px;margin:15px auto\">";
		echo "</div>";
	 // header("Location:index.php");
      //exit;

}

		 ?>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                 <!--  <h3>Select image to upload: </h3> -->
                <input type ="hidden" name="size" value="1000000">
				<!-- <div id = 'img_div'> -->
					<!-- <img src= 'images/default.png'style ="width:40%;padding:5px;margin:15px auto"> -->
				<!-- </div> -->
                <div id ="upload">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div id ="submit" style = "margin-bottom:2px">
                    <input type="submit" name="upload" id ="submit">
                </div>
    <!--            <a href="#">    <input type="button" value="Delete picture"> -->
            </form>
        </div>
        <!-- Page Header -->
        <div class="row" id = "search_bar">
            <div class="col-lg-12">
                <select multiple="multiple" placeholder="Search for a Tag" onchange="console.log($(this).children(':selected').length)" class="search-box">
				<?php
					$db = mysqli_connect("localhost", "root", "", "image_tagging");
					$sql = "SELECT DISTINCT image_tag from image_table";
					mysqli_query($db,$sql)or die("Failed to query database".mysql_error());
				
				
				
				?>
                   <option selected value="volvo">Volvo</option>
                   <option value="saab">Saab</option>
                   <option disabled="disabled" value="mercedes">Mercedes</option>
                   <option value="audi">Audi</option>
                   <option selected value="bmw">BMW</option>
                   <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                     <option value="porsche">Porche</option>
                   <option value="ferrari">Ferrari</option>
                   <option value="mitsubishi">Mitsubishi</option>
                </select>
            </div>
        </div>
    
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
               <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
                
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
               
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
               <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
               
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
               <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
               
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
               
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <span><button type="button" class="btn btn-success">Tag 1</button>
                <button type="button" class="btn btn-success">Tag 2</button>
                <button type="button" class="btn btn-success">Tag 3</button></span>
               
            </div>
        </div>

        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    </center>
    <!-- /.container -->

    <!-- jQuery -->
  
<!--    <script src="js/jquery.js"></script>-->
    <!-- Bootstrap Core JavaScript -->
  
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
