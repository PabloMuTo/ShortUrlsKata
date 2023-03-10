# Short URLS Kata

## Stack tecnológico

- PHP 8.0
- Framework Laravel 9
- PHPUnit 9

## About

He utilizado una programación orientada a dominio, estructurando el código en Application, Domain e Intrastructure.
De esta forma dependo menos del framework Laravel aunque aprovecho algunas de sus ventajas.
Cada capa se encarga de gestionar:

**Application:**
Contiene los diferentes casos de uso. En este caso, sólo hay 1, el correspondiente a la acción de acortar URls

**Domain:**
Contiene las entidades principales y la lógica de negocio que controlan dichas entidades.
He creado dos entidades principales. Token, con su validador. Y Url, entidad que controla la URL de entrada.
La validación del token es un Servicio de dominio (Src/Domain/Validation) que se instancia en la validación de la entidad.

**Infrastructure:**
Contiene toda la lógica con los elementos third-party (que podrían ser Base de datos, servicios externos, peticiones HTTP).
Aquí he incluido el archivo api.php con la ruta y un directorio de servicios con el servicio que contiene el client HTTP

## Ejecutar aplicación

#### 1. El proyecto está dockerizado

```
docker-compose up -d
```

#### 2. Una vez levantados los contenedores, verificar su estado correcto

```
docker-compose ps
```

#### 2. Ejecutar paquetes y liberías mediante composer

```
docker exec -it shorturlskata_app_1 composer install
```

#### 3. Iniciar servicio

```
docker exec -it shorturlskata_app_1 php artisan serve
```


## Ejecutar e iniciar proyecto

Vía postman, iniciar un request GET a la URL siguiente:

```
http://localhost:8787/api/v1/short-urls

Body: url: string, required
Header: Authorization Bearer ()[] 
```

## Ejecutar tests

```
docker exec -it shorturlskata_app_1 ./vendor/bin/phpunit tests --color
```


## Otros

- Author: Pablo Muñoz (pablo.mu.to@gmail.com)
- Dedicación: 3horas
