<!DOCTYPE html>
<html>
<head>
    <title>Travel Weather & Budget</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-card {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
            border-radius: 8px;
        }
        .highlight {
            color: #0d6efd;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">¡Hola Marlon!</h4>
                    </div>
                    <div class="card-body">
                        <form id="travelForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="city" class="form-label">¿Cual es tu siguiente destino?</label>
                                    <select class="form-select" id="city" required>
                                        <option value="">Elige una ciudad</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="budget" class="form-label">Tu presupuesto (COP)</label>
                                    <input type="number" class="form-control" id="budget" required>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">Ver información</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="results" class="card info-card" style="display: none;">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Resumen de viaje</h4>
                    </div>
                    <div class="card-body">
                        <div class="travel-summary">
                            <p class="lead">
                                Hoy en <span class="highlight" id="city_name"></span>, 
                                Se esperan temperaturas de <span class="highlight" id="temperature"></span>°C.
                            </p>
                            <p class="lead">
                                Con un presupuesto de <span class="highlight" id="original_budget"></span> (COP),
                                Tendrás aproximadamente <span class="highlight" id="converted"></span>
                                (<span id="currency_code"></span>) al cambio para tu viaje.
                            </p>
                            <p class="text-muted">
                                Tasa de conversión usada: 1 Peso colombiano = <span id="rate"></span> <span id="currency_name"></span>
                            </p>
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
                        // Update results
                        $('#city_name').text(response.city_name);
                        $('#temperature').text(response.weather);
                        $('#original_budget').text($('#budget').val());
                        $('#converted').text(response.currency_symbol + response.converted.toFixed(2));
                        $('#currency_code').text(response.currency_code);
                        $('#currency_name').text(response.currency_name);
                        $('#rate').text(response.exchange);
                        
                        // Show results card
                        $('#results').show().hide().fadeIn(400);
                        
                        // Optional: Smooth scroll to results
                        $('html, body').animate({
                            scrollTop: $('#results').offset().top - 50
                        }, 500);
                    }
                });
            });
        });
    </script>
</body>
</html>