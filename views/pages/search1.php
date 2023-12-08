<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search_input').on('input', function() {
                var search_string = $(this).val();

                if (search_string.length > 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'search.php',
                        data: {search_string: search_string},
                        success: function(response) {
                            $('#search_results').html(response);
                        }
                    });
                } else {
                    $('#search_results').html('');
                }
            });
        });
    </script>
</head>
<body>
    <input type="text" id="search_input" />
    <div id="search_results"></div>
</body>
</html>