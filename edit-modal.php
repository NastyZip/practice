<!-- Edit Movie Modal -->
<div class="modal fade" id="editMovieModal" tabindex="-1" role="dialog" aria-labelledby="editMovieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: black; color: white;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border-radius: 5px;">&times;</button>
                <h4 class="modal-title" id="editMovieModalLabel">
                    <span class="fas fa-search" aria-hidden="true" style="color: #00FF00;"></span> Search Movies
                </h4>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Movie..." id="searchMovie">
                    <button class="btn btn-primary" type="button" id="searchMovieBtn" style="background-color:gray;">Search</button>
                </div>
                <div id="searchResults" class="list-group">
                    <!-- Search results will appear here -->
                </div>
                
                <!-- Edit Movie Form - initially hidden -->
                <form id="editMovieForm" style="display: none;">
                    <div class="form-group">
                        <label for="editMovieID">Movie ID:</label>
                        <input type="text" class="form-control" id="editMovieID" name="movieID" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editMovieName">Movie Name:</label>
                        <input type="text" class="form-control" id="editMovieName" name="movieName" required>
                    </div>
                    <div class="form-group">
                        <label for="editDuration">Duration:</label>
                        <input type="text" class="form-control" id="editDuration" name="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="editYear">Year:</label>
                        <input type="number" class="form-control" id="editYear" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="editTheme">Genre:</label>
                        <input type="text" class="form-control" id="editTheme" name="theme" required>
                    </div>
                    <button type="button" class="btn btn-primary" id="editMovieBtn" style="margin-top: 5px; background-color: gray;">
                        <span class="fas fa-save" aria-hidden="true"></span> Save Changes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Movie Modal -->
<div class="modal fade" id="deleteMovieModal" tabindex="-1" role="dialog" aria-labelledby="deleteMovieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: black; color: white;">
            <div class="modal-header">
                <h4 class="modal-title" id="editMovieModalLabel">
                    <span class="fas fa-trash" aria-hidden="true" style="color: #00FF00;"></span> Confirm Deletion
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this movie?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
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
                        if (data.length > 0) {
                            data.forEach(function(movie) {
                                resultsHtml += `
                                    <div class="list-group-item">
                                        <span>(${movie.movieID}) ${movie.movieName}</span>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-sm btn-primary edit-btn" data-id="${movie.movieID}" data-name="${movie.movieName}" data-duration="${movie.duration}" data-year="${movie.year}" data-theme="${movie.theme}" style="background-color:gray;">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-id="${movie.movieID}" style="background-color:gray;">Delete</button>
                                        </div>
                                    </div>`;
                            });
                        } else {
                            resultsHtml = '<p class="text-center text-muted" style="color:white;">No movies found</p>';
                        }
                        $('#searchResults').html(resultsHtml);
                        $('#searchResults').show();
                        $('#editMovieForm').hide();
                    },
                    error: function(xhr, status, error) {
                        console.error('Search error:', xhr.responseText);
                        alert('Failed to retrieve movie data');
                    }
                });
            } else {
                $('#searchResults').html('');
                $('#searchResults').hide();
                $('#editMovieForm').hide();
            }
        });
    }

    enableSearch();

    $('#searchResults').on('click', '.edit-btn', function() {
        var movieID = $(this).data('id');
        var movieName = $(this).data('name');
        var duration = $(this).data('duration');
        var year = $(this).data('year');
        var theme = $(this).data('theme');

        $('#editMovieID').val(movieID);
        $('#editMovieName').val(movieName);
        $('#editDuration').val(duration);
        $('#editYear').val(year);
        $('#editTheme').val(theme);

        $('#editMovieForm').show();
        $('#searchResults').html('');
        $('#editMovieModal').modal('show');
    });

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
                    // Update the table row with new data
                    var row = $('#movieTableBody').find('tr[data-id="' + movieID + '"]');
                    row.find('.movieName').text(movieName);
                    row.find('.duration').text(duration);
                    row.find('.year').text(year);
                    row.find('.theme').text(theme);

                    // Hide the modal
                    $('#editMovieModal').modal('hide');
                } else {
                    alert('Failed to update movie details: ' + response);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to update movie details');
            }
        });
    });

    $('#searchResults').on('click', '.delete-btn', function(e) {
        e.preventDefault(); // Prevent default action of showing browser confirm dialog
        var movieID = $(this).data('id');
        $('#deleteMovieModal').modal('show');

        $('#confirmDeleteBtn').off().on('click', function() {
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
});

</script>
