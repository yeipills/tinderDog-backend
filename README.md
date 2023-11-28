# TinderDog

    alunmos : Juan Pablo Rosas Martin
              Diego Gutierrez Mella
              Yerko Cisternas Torres
              
  descripción del proyecto.

## Requisitos

- PHP >= [versión]
- Composer
- Base de datos supabase
 
## Instalación

### Clonar el Repositorio

Primero, clona el repositorio en tu máquina local:

```bash
git clone [URL del repositorio]
```
### Instalar Dependencias

Instala todas las dependencias de Composer:

```bash
composer install
```

### Configurar el Archivo .env

Copia el archivo `.env.example` a `.env` y configúralo según tu entorno:

```bash
cp .env.example .env
```

Edita el archivo `.env` con tu editor preferido y configura tus variables de entorno (por ejemplo, detalles de la base de datos, claves API, etc.).

### Generar Clave de Aplicación

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

### Configurar la Base de Datos

Crea una base de datos y actualiza las credenciales en el archivo `.env`.

### Ejecutar Migraciones y Seeders

Ejecuta las migraciones y seeders para configurar la base de datos:

```bash
php artisan migrate
php artisan db:seed
```

### Iniciar el Servidor de Desarrollo

Inicia el servidor de desarrollo:

```bash
php artisan serve
```

El servidor se iniciará en `http://localhost:8000` por defecto.

## Uso

Descripción de cómo usar el proyecto, endpoints de API, etc.

## Contribuir

Instrucciones para contribuir al proyecto, si es aplicable.

---

Recuerda personalizar este `README.md` según las necesidades específicas de tu proyecto, incluyendo cualquier paso adicional, configuraciones o detalles relevantes que los usuarios necesiten saber para configurar y usar tu aplicación correctamente.
