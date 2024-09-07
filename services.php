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

	<title>Services</title>
</head>
<style type="text/css">
	body{
		 background-color: rgb(36, 65, 65);
		font-family: poppins;
		color: #00FF00;
	}
	 .services-container {
            display: flex;
            justify-content: space-around;
            max-width: 1100px;
            margin-left: 250px;
            margin-top: 150px;
        }

        .service-box {
            background-color: black;
            color: #00FF00;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 250px;
            text-align: center;
            transition: all 0.3s;
            margin-bottom: 20px;
            position: relative;
        }

        .service-box:hover {
            background-color: #333;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            transform: translateY(-5px);
            color: #05ff3b;
        }

        .service-box h3 {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .service-box p {
            font-size: 16px;
            line-height: 1.6;
        }

        .service-box i {
            font-size: 3em;
            margin-bottom: 10px;
        }

</style>
<body>
	    <div class="logo">
        <img src="img/1.png" alt="Logo">
        <a href="index.php" ><i class="fas fa-home"></i> Home</a>
        <a href="services.php" class="active"><i class="fas fa-concierge-bell"></i> Services</a>
        <a href="about.php" ><i class="fas fa-info-circle"></i> About</a>
        <a href="#contact" ><i class="fas fa-envelope"></i> Contact</a>
     
    </div>
<div class="abouts">
        <img src="img/5.png">
        <div id="clock" style="color: #05ff3b; font-size: 30px; display:inline-block;float:right;padding-top: 30px; padding-right: 10px; font-family: Wallpoet;"></div>
</div>
<div class="services-container">
        <div class="service-box">
            <i class="fas fa-star"></i>
            <h3>Personalized Recommendations</h3>
            <p>Get personalized movie recommendations based on your preferences and viewing history.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-coins"></i>
            <h3>Subscription and Membership</h3>
            <p>Subscribe to access premium features, ad-free browsing, and early access to new releases.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-play"></i>
            <h3>Streaming and Downloading</h3>
            <p>Stream movies directly or download them for offline viewing.</p>
        </div>
        <div class="service-box">
            <i class="fas fa-graduation-cap"></i>
            <h3>Educational Content</h3>
            <p>Explore educational materials, documentaries, and film analysis to enrich your movie knowledge.</p>
        </div>
    </div>
 
</body>
	
		 
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