<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Wallpoet' rel='stylesheet'>

	<title>About</title>
</head>
<style type="text/css">
	body{
		 background-color: rgb(36, 65, 65);
		font-family: poppins;
		color: #00FF00;
	}

    
        .pcontainer {
            max-width: 800px;
            margin-left: 400px;
            margin-top: 15px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: black;
            color: #00FF00;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }
        .pcontainer:hover {
          background-color: #333;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            transform: translateY(-5px);
            color: #05ff3b;
        }
        .pcontainer h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #00FF00;
            display: flex;
            align-items: center;
        }
        .pcontainer p {
            line-height: 1.6;
        }
        .pcontainer ul {
            list-style-type: none;
            padding-left: 20px;
        }
        .pcontainer ul li {
            margin-bottom: 8px;
        }

</style>
<body>
<div class="logo">
    <img src="img/1.png" alt="Logo">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <a href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
    <a href="about.php" class="active"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
   
</div>

<div class="abouts">
    <img src="img/3.png" alt="About Image" style="border-radius: 10px;">
    <div id="clock" style="color: #05ff3b; font-size: 30px; display:inline-block;float:right;padding-top: 30px; padding-right: 10px; font-family: Wallpoet;"></div>
</div>

<div class="pcontainer">
    <h3>About Us <i class="fas fa-info-circle" style="margin-left: auto;"></i></h3>
    <p>Welcome to our MovieX!</p>
</div>

<div class="pcontainer">
    <h3>Who We Are <i class="fas fa-user" style="margin-left: auto;"></i></h3>
    <p>We are passionate movie enthusiasts dedicated to building a comprehensive database of movies from various genres and eras. Our mission is to provide a centralized platform where users can easily explore, discover, and learn about their favorite movies.</p>
</div>

<div class="pcontainer">
    <h3>What We Do <i class="fas fa-tasks" style="margin-left: auto;"></i></h3>
    <ul>
        <li><i class="fas fa-film"></i> Browse Movies: Explore a vast collection of movies from different genres and decades.</li>
        <li><i class="fas fa-search"></i> Search Movies: Easily find your favorite movies by title, genre, or release year.</li>
        <li><i class="fas fa-plus"></i> Add New Movies: Contribute to our database by adding new movies with their details.</li>
        <li><i class="fas fa-edit"></i> Edit Movie Details: Update existing movie information to keep our database accurate and up-to-date.</li>
    </ul>
</div>

<div class="pcontainer">
    <h3>Why Choose Us? <i class="fas fa-question-circle" style="margin-left: auto;"></i></h3>
    <ul>
        <li><i class="fas fa-database"></i> Comprehensive Database: We strive to maintain a comprehensive and accurate database of movies.</li>
        <li><i class="fas fa-desktop"></i> User-Friendly Interface: Our platform is designed to be easy to navigate, ensuring a seamless user experience.</li>
        <li><i class="fas fa-users"></i> Contribution: We encourage user contribution to help grow and enrich our movie database.</li>
    </ul>
</div>
	<script type="text/javascript">
		 function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        // Format the time as HH:MM:SS AM/PM
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        // Display the time
        document.getElementById('clock').innerText = currentTime;
    }
    // Update the clock every second
    setInterval(updateClock, 1000);
    // Initialize the clock
    updateClock();
	</script>

</body>
</html>