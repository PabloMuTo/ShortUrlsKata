# Shorts URLs 

## Stack tecnológico

- PHP
- Framework Laravel 8
- PHPUnit

## About

He utilizado una programación orientada a objetos y dominio, estructurando el código en Application, Domain e Intrastructure.
De esta forma dependo menos del framework Laravel aunque aprovecho algunas de sus ventajas.
Cada capa se encarga de gestionar:

**Application:**
Contiene los diferentes casos de uso. En este caso, sólo hay 1, el correspondiente a la acción de acortar URls

**Domain:**
Contiene las entidades principales y la lógica de negocio que controlan dichas entidades.
He creado dos entidades principales. Token, con su validador. Y Url, entidad que controla la URL de entrada.

**Infrastructure:**
Contiene toda la lógica con los elementos third-party (que podrían ser Base de datos, servicios externos, peticiones HTPP).
Aquí he incluido el archivo api.php con la ruta y un directorio de servicios

## Notas

Me gustaría hacer una segunda entrega con algunos aspecto que me faltan, como el modal de detalles y el exportar a excel de los resultados.
He trabajado poco con tailwind css y me ha costado ajustarme perfectamente al diseño de figma.


## Docker

No he incluido el docker con el que he montado el proyecto.
Si es necesario, avisame y lo incluyo en el repositorio.

## Ejecutar aplicación

```
composer 

php artisan serve

```

## Ejecutar tests

```
.vendor/bin/phpunit test --color
```

## Otros

- Author: Pablo Muñoz (pablo.mu.to@gmail.com)
- Dedicación: 3horas 30 minutos
