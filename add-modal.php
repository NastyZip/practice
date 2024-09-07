<!-- Add New Movie Modal -->
<div class="modal fade" id="addMovieModal" tabindex="-1" role="dialog" aria-labelledby="addMovieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: black; color: white;">
            <div class="modal-header">
                <button type="button" class="close"  aria-hidden="true" style="border-radius: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="addMovieModalLabel"><span class="fas fa-clapperboard" aria-hidden="true" style="color: #00FF00;"></span> Add New Movie</h4>
            </div>
            <div class="modal-body">
                <form id="addMovieForm">
                    <div class="form-group">
                        <label for="movieName">Movie Name:</label>
                        <input type="text" class="form-control" id="movieName" name="movieName" required>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    <div class="form-group">
                        <label for="theme">Genre:</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 5px; background-color: gray;">
                        <span class="fas fa-bookmark" aria-hidden="true"></span> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Add movie form submission
        $('#addMovieForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting traditionally

            // Serialize form data
            var formData = $(this).serialize();

            // Submit form via AJAX
            $.ajax({
                type: 'POST',
                url: 'add_movie.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Clear form fields
                    $('#movieName').val('');
                    $('#duration').val('');
                    $('#year').val('');
                    $('#theme').val('');

                    // Append new row to the table
                    var newRow = '<tr>' +
                        '<td>' + response.movieID + '</td>' +
                        '<td>' + response.movieName + '</td>' +
                        '<td>' + response.duration + '</td>' +
                        '<td>' + response.year + '</td>' +
                        '<td>' + response.theme + '</td>' +
                        '</tr>';
                    $('#movieTableBody').append(newRow);

                    // Hide the modal
                    $('#addMovieModal').modal('hide');

                    // Reload the page
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error adding movie:', error);
                    alert('Failed to add movie');
                }
            });
        });
    });
</script>

