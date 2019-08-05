<?php 
	require_once 'db.php';


	if(isset($_POST['send'])){
		if(trim($_POST['name']) == "" || trim($_POST['email']) == "" || trim($_POST['message']) == "") 
		{
			$error =  '<div class="alert alert-danger" role="alert">Заповнять всі поля будь-ласка</div>';

		} else {

		$coments = R::dispense('coments');
		$coments->name = $_POST['name'];
		$coments->email = $_POST['email'];
		$coments->message = $_POST['message'];
		$coments->date = date("Y.m.d");
		$coments->rating = $_POST['rating'];

	R::store($coments);
	header('location: /');
	}
}

if (isset($_GET['page'])){
	$page = $_GET['page'];
} else {
	$page = 1;
}
$limit = 4;
$number = ($page * $limit) - $limit;
$res_count = mysqli_query($con, "SELECT COUNT(*) FROM `coments` ");
$row = mysqli_fetch_row($res_count);
$total = $row[0];
$str_pag = ceil($total / $limit);
$query = mysqli_query($con, "SELECT * FROM `coments` ORDER BY id DESC LIMIT $number, $limit ");

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>GuestBook</title>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<style type="text/css">
#pagination {
		margin-left: 10px;
	}

h1 {
	text-align: center;
	font-family: Robotic;
}

#myBtn {
  display: none; 
  position: fixed; 
  bottom: 20px; 
  right: 30px; 
  z-index: 99; 
  border: none; 
  outline: none; 
  background-color: red; 
  color: white; 
  cursor: pointer; 
  padding: 15px; 
  border-radius: 10px; 
  font-size: 18px; 
}

#myBtn:hover {
  background-color: #555; 
}

</style>
<body>
<div class="container">
 <?php ?>
	<h1>You are welcome to GuestBook</h1>
	
	
<form action="" method="post">
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Ім'я</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm" name="name" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="name@person.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Comment out</label>
    <div class="col-sm-10">
      <textarea class="form-control form-control-lg" name="message"></textarea> 
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Рейтинг</label>
    <div class="col-sm-10">
    	<?php $ran = mysqli_query($con, "SELECT  AVG(rating) as star  FROM coments"); ?>
    	<?php $point = mysqli_fetch_assoc($ran);  ?>
      <td></td>
            <td><b class="rating"><?php //echo $entry_bad; ?></b>&nbsp;
              <?php if ($rating == 1) { ?>
              <input type="radio" name="rating" value="1" checked />
              <b>1</b>
              <?php } else { ?>
              <input type="radio" name="rating" value="1" />
              <b>1</b>
              <?php } ?>
              &nbsp;
              <?php if ($rating == 2) { ?>
              <input type="radio" name="rating" value="2" checked />
              <b>2</b>
              <?php } else { ?>
              <input type="radio" name="rating" value="2" />
              <b>2</b>
              <?php } ?>
              &nbsp;
              <?php if ($rating == 3) { ?>
              <input type="radio" name="rating" value="3" checked />
              <b>3</b>
              <?php } else { ?>
              <input type="radio" name="rating" value="3" />
              <b>3</b>
              <?php } ?>
              &nbsp;
              <?php if ($rating == 4) { ?>
              <input type="radio" name="rating" value="4" checked />
              <b>4</b>
              <?php } else { ?>
              <input type="radio" name="rating" value="4" />
              <b>4</b>
              <?php } ?>
              &nbsp;
              <?php if ($rating == 5) { ?>
              <input type="radio" name="rating" value="5" checked />
              <b>5</b>
              <?php } else { ?>
              <input type="radio" name="rating" value="5" />
              <b>5</b>
              <?php } ?>
              &nbsp; <b class="rating"><?php //echo $entry_good; ?></b>
              
              <?php  echo '<b>'.' '.'Загальний рейтинг-'.' '.round($point['star'],1).'</b>'; ?>
          </td>
    </div>
  </div>
  <button type="submit" class="btn btn-secondary btn-lg " name="send">Залишии відгук</button>
</form>
<div class="reviews">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Відгуки</th>
      <th scope="col">Ім'я</th>
      <th scope="col">Повідомлення</th>
      <th scope="col">Дата</th>
      <th scope="col">Оцінка</th>
    </tr>
  </thead>
  	<tbody>
<?php if(mysqli_num_rows($query) == 0){
		echo "There are no records!";
} else {
	while($article = mysqli_fetch_assoc($query)) 
	{

?>
	<tr>
	 <td><img width="150px" src="http://pm1.narvii.com/6889/74979d4d2744ec6e27995b6e866f091d04c0b40cr1-515-414v2_uhq.jpg"></td>
	  <td><?= $article['name'] ?></td>
	  <td><?= $article['message'] ?></td>
	  <td><?= $article['date'] ?></td>
	  <td><?= $article['rating'] ?></td>
	</tr>
<?php } } ?> 
  </tbody>
  <tr>
  	<td>
<?php 
for ($i = 1; $i <=$str_pag; $i++)
{
echo " <a id='pagination' class='btn btn-primary  ' role='button' aria-pressed='true' href=index.php?page=".$i.">".$i."</a> ";
}
?>
    		</td>
  		</tr>
 	</table>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>
</body>
<script type="text/javascript">
	window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}


function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; //  IE and Opera
}
</script>
</html>