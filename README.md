# Prueba Blog (Laravel)

Proyecto de blog simple con registro/login, publicación de entradas y panel de administración de usuarios por roles.

## Mejoras aplicadas en esta versión

- Rutas limpiadas y sin duplicados.
- Cierre de sesión migrado de `GET` a `POST` (más seguro).
- Validaciones de login/registro/publicación reforzadas.
- Formularios con `action` explícito, valores `old()` y campos `required`.
- Búsqueda con debounce y manejo seguro del input.
- Tests de feature para registro, login y logout.
- Configuración de pruebas con SQLite en memoria.

## Requisitos

- PHP 8.1+
- Composer
- Node.js 18+ y npm
- Extensión de PHP para SQLite (recomendado para tests)

## Instalación

```bash
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

## Uso rápido

- Home: `http://127.0.0.1:8000`
- Registro: `/register`
- Login: `/login`
- Crear publicación: `/publicacion`
- Administración (si aplica): `/admin` y `/admin/users`

## Ejecutar pruebas

```bash
php artisan test
```

## Notas

- El proyecto usa los modelos y nombres originales para mantener compatibilidad con la base actual.
- Si quieres endurecer más seguridad, el siguiente paso recomendado es agregar políticas (`Policies`) y autorización por acciones.
