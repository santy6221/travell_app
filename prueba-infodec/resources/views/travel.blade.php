<!DOCTYPE html>
<html>
<head>
    <title>Travel Weather & Budget</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form id="travelForm">
                            <div class="mb-3">
                                <label for="city" class="form-label">Select City</label>
                                <select class="form-select" id="city" required>
                                    <option value="">Choose a city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="budget" class="form-label">Budget (COP)</label>
                                <input type="number" class="form-control" id="budget" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Get Travel Info</button>
                        </form>

                        <div id="results" class="mt-4" style="display: none;">
                            <h4>Travel Information</h4>
                            <p>Temperature: <span id="temperature"></span>°C</p>
                            <p>Local Currency: <span id="currency"></span></p>
                            <p>Converted Amount: <span id="converted"></span></p>
                            <p>Exchange Rate: <span id="rate"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#travelForm').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: '/api/travel-info',
                    method: 'POST',
                    data: {
                        city_id: $('#city').val(),
                        budget: $('#budget').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#temperature').text(response.weather);
                        $('#currency').text(response.currency_name + ' (' + response.currency_symbol + ')');
                        $('#converted').text(response.currency_symbol + response.converted.toFixed(2));
                        $('#rate').text('1 COP = ' + response.exchange + ' ' + response.currency_name);
                        $('#results').show();
                    }
                });
            });
        });
    </script>
</body>
</html>