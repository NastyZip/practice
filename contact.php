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

	<title>Contact</title>
</head>
<style type="text/css">
	body{
		 background-color: rgb(36, 65, 65);
		font-family: poppins;
		color: #00FF00;
	}
	.contact {
            max-width: 600px;
           
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: black;
            margin-top: 10px;
            margin-left: 35%;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 150px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #45a049;
        }

</style>
<body>
	    <div class="logo">
        <img src="img/1.png" alt="Logo">
        <a href="index.php" ><i class="fas fa-home"></i> Home</a>
        <a href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
        <a href="about.php" ><i class="fas fa-info-circle"></i> About</a>
        <a href="#contact" class="active"><i class="fas fa-envelope"></i> Contact</a>
    
    </div>
<div class="abouts">
        <img src="img/4.png">
        <div id="clock" style="color: #05ff3b; font-size: 30px; display:inline-block;float:right;padding-top: 30px; padding-right: 10px; font-family: Wallpoet;"></div>
</div>
 <div class="contact">
        <h2>Contact Us</h2>
        <form action="send_email.php" method="post">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Send Message</button>
            </div>
        </form>
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