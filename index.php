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
    <style type="text/css">
        body {
            background-color: rgb(36, 65, 65);
            font-family: Poppins;
        }
    </style>
    <title>MovieX</title>
</head>
<body>
    <div class="logo">
        <img src="img/1.png" alt="Logo">
        <a href="index.php" class="active"><i class="fas fa-home"></i> Home</a>
        <a href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
        <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact.php"><i class="fas fa-envelope"></i> Contact</a>
        <a href="#addMovieModal" data-bs-toggle="modal"><span class="fas fa-plus"></span> Add</a>
        <!-- Action buttons -->
        <div id="action-buttons">
            <a href="edit-modal.php" id="editBtn"><i class="fas fa-pen-to-square"></i> Actions</a>
        </div>
    </div>


    <div class="container1" style="margin-left: 270px;"> <!-- Adjusted for sidebar width -->
        <div class="dash">
        <img src="img/2.png">
        <div id="clock" style="color: #05ff3b; font-size: 30px; display:inline-block;float:right;padding-top: 30px; padding-right: 10px; font-family: Wallpoet;"></div>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>MovieID</th>
                    <th>Movie Name</th>
                    <th>Duration</th>
                    <th>Year</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody id="movieTableBody">
                <!-- PHP code to fetch and display movies -->
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "movies_db"; 

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch movies from database
                $sql = "SELECT * FROM movies";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['movieID']."</td>";
                        echo "<td>".$row['movieName']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "<td>".$row['year']."</td>";
                        echo "<td>".$row['theme']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No movies found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Placeholders -->
    <div id="add-modal-placeholder"></div>
    <div id="edit-modal-placeholder"></div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Scripts -->
<script>
     $(document).ready(function(){
            // Load the add modal content from add-modal.php into the placeholder div when Add button is clicked
            $('a[href="#addMovieModal"]').click(function(event){
                event.preventDefault(); // Prevent the default anchor behavior
                var target = $(this).attr('href');
                
                // Check if the modal is already loaded to avoid multiple requests
                if (!$('#addMovieModal').length) {
                    $("#add-modal-placeholder").load("add-modal.php", function() {
                        $(target).modal('show');
                    });
                } else {
                    $(target).modal('show');    
                }
            });

            // Load the edit modal content from edit-modal.php into the placeholder div when Edit button is clicked
            $("#editBtn").click(function(event) {
                event.preventDefault(); // Prevent the default anchor behavior
                var target = '#editMovieModal';
                
                // Check if the modal is already loaded to avoid multiple requests
                if (!$('#editMovieModal').length) {
                    $("#edit-modal-placeholder").load("edit-modal.php", function() {
                        $(target).modal('show');
                        // Enable search functionality after modal is loaded
                        enableSearch();
                    });
                } else {
                    $(target).modal('show');
                    // Enable search functionality after modal is loaded
                    enableSearch();
                }
            });

            // Function to enable search functionality
            function enableSearch() {
                $('#searchMovieBtn').click(function() {
                    var query = $('#searchMovie').val().trim();
                    if (query.length > 0) {
                        $.ajax({
                            url: 'search_movies.php',
                            type: 'GET',
                            data: { query: query },
                            dataType: 'json',
                            success: function(data) {
                                var resultsHtml = '';
                                data.forEach(function(movie) {
                                    resultsHtml += '<a href="#" class="list-group-item list-group-item-action" data-id="' + movie.movieID + '">' + movie.movieName + '</a>';
                                });
                                $('#searchResults').html(resultsHtml);
                                
                                // Select a movie from search results
                                $('#searchResults a').click(function(e) {
                                    e.preventDefault();
                                    var movieID = $(this).data('id');
                                    $('#editMovieID').val(movieID);
                                    // Fetch movie details and populate the Format
                                    $.ajax({
                                        url: 'get_movie_details.php',
                                        type: 'GET',
                                        data: { movieID: movieID },
                                        dataType: 'json',
                                        success: function(movie) {
                                            $('#editMovieName').val(movie.movieName);
                                            $('#editDuration').val(movie.duration);
                                            $('#editYear').val(movie.year);
                                            $('#editTheme').val(movie.theme);
                                        }
                                    });
                                    // Close the search results
                                    $('#searchResults').html('');
                                });
                            }
                        });
                    } else {
                        $('#searchResults').html('');
                    }
                });

                // Save changes button click event
                $('#editMovieBtn').click(function() {
                    var movieID = $('#editMovieID').val();
                    var movieName = $('#editMovieName').val();
                    var duration = $('#editDuration').val();
                    var year = $('#editYear').val();
                    var theme = $('#editTheme').val();

                    // AJAX call to update movie details
                    $.ajax({
                        url: 'update-movie.php',
                        type: 'POST',
                        data: {
                            movieID: movieID,
                            movieName: movieName,
                            duration: duration,
                            year: year,
                            theme: theme
                        },
                        success: function(response) {
                            if (response.trim() === 'success') {
                                // Reload the table or update the table row with new data
                                location.reload();
                            } else {
                                alert('Failed to update movie details: ' + response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Failed to update movie details');
                        }
                    });

                    $("#editMovieModal").modal("hide");
                });

                // Delete movie button click event

        $('#searchResults').on('click', '.delete-btn', function(e) {
            e.preventDefault(); // Prevent default action of showing browser confirm dialog
            var movieID = $(this).data('id');
            $('#editMovieModal').modal('hide');
            $('#deleteMovieModal').modal('show');

            $('#confirmDeleteBtn').off().on('click', function() {
                $('#deleteMovieModal').modal('hide');
                location.reload();
                $.ajax({
                    url: 'delete-movie.php',
                    type: 'POST',
                    data: { movieID: movieID },
                    success: function(response) {
                        if (response.trim() === 'success') {
                            $('button[data-id="' + movieID + '"]').closest('div.list-group-item').remove();
                            $('#deleteMovieModal').modal('hide'); // Hide the modal

                            // Hide the edit modal as well if it's open
                            $('#editMovieModal').modal('hide');

                            // Reload the page
                            location.reload();
                        } else {
                            alert('Failed to delete movie');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Delete error:', xhr.responseText);
                        alert('Failed to delete movie');
                    }
                });
            });
        });

            }
        });
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
