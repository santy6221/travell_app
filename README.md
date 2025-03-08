# Aplicación de Gestión de Viajes

![Captura de pantalla](https://i.pinimg.com/1200x/10/af/6e/10af6e62ebbd7e8ebfd1225eb8e50383.jpg)

Aplicación web para consultar clima y conversión de divisas en tiempo real.

## Características
- Consulta de temperatura actual (°C)
- Conversión de COP a moneda local
- Soporte para 5 ciudades globales
- Diseño responsive

## Tecnologías
| **Frontend**       | **Backend**         | **APIs**               |
|--------------------|---------------------|------------------------|
| Bootstrap 5        | Laravel 10          | OpenWeatherMap         |
| jQuery             | PHP 8.4             | ExchangeRate-API       |
|                    | MySQL 8.0           |                        |

## Instalación 🔧
1. **Clonar repositorio**:
```bash
git clone https://github.com/santy6221/travell_app.git && cd prueba-infodec
```

2. **Instalar dependencias**
```bash
composer install
```

3. **Configurar entorno**
```bash
cp .env.example .env && php artisan key:generate
```

4. **Base de datos**
Configurar .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_app
DB_USERNAME=tu_usuariodb
DB_PASSWORD=tu_contraseña
```
```bash
php artisan migrate --seed
```

5. **Iniciar servidor**
```bash
php artisan serve
```

## Uso
1. Accede a http://localhost:8000/travel
2. Selecciona la ciudad e ingresa un presupuesto en COP
3. Los resultados incluyen
 - Temperatura actual
 - Presupuesto convertido
 - Codigo y nombre de la moneda a convertir
 - Tasa de cambio

