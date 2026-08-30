# Evaluaciones 2 y 3 - Desarrollo de Software Web 1

## Encargo: Gestion de Proyectos

Aplicacion desarrollada en Laravel para la gestion de proyectos. Incluye la Evaluacion 2, con autenticacion y CRUD web, y la Evaluacion 3, con una API REST JSON para gestionar proyectos.

### Entrega:

- Integrantes
    - Pia Alarcón
    - Ain Cortés
- Sección: 50
- Docente: Victor Cofre

## Tecnologias utilizadas

- Laravel 11
- PHP 8.3
- Bootstrap 5
- MySQL

## Funcionalidades principales

- registro de usuarios
- inicio y cierre de sesion
- proteccion de rutas con middleware `auth`
- listado de proyectos
- vista para crear proyectos
- vista para ver un proyecto por ID
- vista para editar proyectos
- vista de confirmacion para eliminar proyectos
- asociacion de cada proyecto con su usuario creador
- componente reutilizable que muestra un valor UF simulado
- API REST JSON para listar, crear, consultar, actualizar y eliminar proyectos
- validacion de datos y respuestas HTTP `404` y `422` en la API
- pruebas automatizadas para los endpoints de proyectos

## Modelos principales

### User

- `id`
- `name`
- `email`
- `password`

### Proyecto

- `id`
- `nombre`
- `fecha_inicio`
- `estado`
- `responsable`
- `monto`
- `created_by`

## Instalacion y ejecucion

1. Instalar dependencias de PHP:

```bash
composer install
```

2. Instalar dependencias de frontend:

```bash
npm install
```

3. Crear el archivo de entorno si aun no existe:

```bash
cp .env.example .env
```

4. Configurar MySQL en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desarrollo_software_1
DB_USERNAME=root
DB_PASSWORD=desarrollo_software_1
```

5. Crear la base de datos en MySQL:

```sql
CREATE DATABASE desarrollo_software_1;
```

6. Generar la clave de la aplicacion:

```bash
php artisan key:generate
```

7. Ejecutar migraciones y seeders:

```bash
php artisan migrate:fresh --seed
```

8. Levantar el servidor si no se utiliza Laravel Herd:

```bash
php artisan serve
```

9. En otra terminal, ejecutar Vite si se desea trabajar con assets en desarrollo:

```bash
npm run dev
```

### Ejecucion con Laravel Herd

Con Laravel Herd, el proyecto queda disponible en:

```text
http://tech-solutions.test
```

La API queda disponible bajo `http://tech-solutions.test/api`.

## Credenciales de prueba

Si ejecutas los seeders, queda disponible este usuario:

- email: `test@example.com`
- password: `desarrollo_software_1`

## Flujo de autenticacion

1. Un usuario puede registrarse en `/register`
2. El registro crea el usuario con contrasena cifrada
3. Luego inicia sesion automaticamente
4. Todas las rutas de proyectos requieren autenticacion
5. Cada proyecto nuevo se guarda con `created_by` igual al ID del usuario autenticado

## Prueba manual sugerida

1. Entrar a `/`
2. Verificar redireccion a `login`
3. Registrar un usuario nuevo o usar el usuario de prueba
4. Confirmar acceso al listado de proyectos
5. Crear un proyecto nuevo
6. Verificar que aparece el nombre del creador en el listado
7. Editar el proyecto
8. Eliminar el proyecto
9. Cerrar sesion
10. Intentar volver a `/proyectos` y comprobar redireccion a `login`

## Rutas principales

- `/`
- `/login`
- `/register`
- `/logout`
- `/proyectos`
- `/proyectos/crear`
- `/proyectos/{id}`
- `/proyectos/{id}/editar`
- `/proyectos/{id}/eliminar`

## API REST de proyectos

La Evaluacion 3 incorpora endpoints JSON sin autenticacion API para operar con proyectos. La ruta base es `/api/proyectos`.

| Metodo | Ruta | Respuesta esperada |
| --- | --- | --- |
| `GET` | `/api/proyectos` | `200 OK` con un arreglo JSON |
| `POST` | `/api/proyectos` | `201 Created` con el proyecto creado |
| `GET` | `/api/proyectos/{id}` | `200 OK` o `404 Not Found` |
| `PUT` | `/api/proyectos/{id}` | `200 OK` o `404 Not Found` |
| `DELETE` | `/api/proyectos/{id}` | `204 No Content` o `404 Not Found` |

Los campos requeridos para crear o actualizar un proyecto son `nombre`, `fecha_inicio`, `estado`, `responsable`, `monto` y `created_by`. Las solicitudes incompletas responden con `422 Unprocessable Content` y errores de validacion en JSON.

### Ejemplo de solicitud

```json
{
  "nombre": "Proyecto API",
  "fecha_inicio": "2026-08-29",
  "estado": "Pendiente",
  "responsable": "Responsable API",
  "monto": 100000,
  "created_by": 1
}
```

### Pruebas automatizadas

Ejecutar las pruebas de la aplicacion:

```bash
php artisan test
```

El archivo `tests/Feature/ProyectoApiTest.php` cubre listado vacio, creacion, validacion, consulta, actualizacion, eliminacion y respuestas `404`.

## Base de datos

El proyecto utiliza MySQL con la base `desarrollo_software_1`. La relacion entre proyectos y usuarios se implementa mediante el campo `created_by`, que referencia `users.id`.

## Migraciones y seeders

- migracion base de `users`
- migracion base de `proyectos`
- migracion adicional para agregar `created_by` a `proyectos`
- `DatabaseSeeder` crea un usuario de prueba conocido
- `ProyectoSeeder` crea un proyecto asociado a ese usuario

## Componente UF

La vista principal de proyectos incorpora el componente reutilizable `x-uf-extract`, que muestra:

- nombre del servicio
- valor UF simulado
- fecha del dia
- mensaje de servicio externo simulado

## Capturas de pantalla Vistas solicitadas

### Login

![Vista login](docs/capturas/vista-login.png)

### Registro

![Vista register](docs/capturas/vista-register.png)

### Listado de proyectos

![Vista proyectos](docs/capturas/vista-proyectos.png)

### Crear proyecto

![Vista crear proyecto](docs/capturas/vista-crear-proyecto.png)

### Ver proyecto

![Ver proyecto](docs/capturas/proyectos-show.png)

### Editar proyecto

![Vista editar proyecto](docs/capturas/vista-editar-proyecto.png)

### Eliminar proyecto

![Vista eliminar proyecto](docs/capturas/vista-eliminar-proyecto.png)

## Capturas de pruebas manuales

### Redireccion inicial a login

![Redireccion inicial](docs/capturas/vista-redirecion-01.png)

### Redireccion de ruta protegida sin sesion

![Redireccion ruta protegida](docs/capturas/vista-redirecion-02.png)

### Proyecto creado

![Proyecto creado](docs/capturas/vista-proyecto-creado.png)

### Proyecto editado

![Proyecto editado](docs/capturas/vista-proyecto-editado.png)

### Proyecto eliminado

![Proyecto eliminado](docs/capturas/vista-proyecto-eliminado.png)

### Sesion cerrada

![Sesion cerrada](docs/capturas/vista-sesion-cerrada.png)

## Evidencias de la Evaluacion 3

### API disponible en Herd

![API en navegador](docs/capturas/captura-api-browser.png)

### Rutas API registradas

![Rutas API](docs/capturas/evidencia_rutas_phpartisan.png)

### Coleccion y variables de Postman

![Coleccion Postman](docs/capturas/coleccion-postman.png)

![Variables Postman](docs/capturas/postman_variables.png)

### Pruebas del CRUD API

#### Listar proyectos: `200 OK`

![Listar proyectos](docs/capturas/postman_01_listar_Proyectos.png)

#### Crear proyecto: `201 Created`

![Crear proyecto](docs/capturas/postman_02_crear_proyecto.png)

#### Validacion de campos requeridos: `422 Unprocessable Content`

![Crear proyecto incompleto](docs/capturas/postman_03_crear_proyecto_incompleto.png)

#### Consultar proyecto creado: `200 OK`

![Consultar proyecto creado](docs/capturas/postman_04_consultar_proyecto_creado.png)

#### Consultar identificador inexistente: `404 Not Found`

![Consultar proyecto inexistente](docs/capturas/postman_05_consultar_id_inexistente.png)

#### Actualizar proyecto: `200 OK`

![Actualizar proyecto](docs/capturas/postman_06_actualizar_proyecto.png)

#### Actualizar identificador inexistente: `404 Not Found`

![Actualizar proyecto inexistente](docs/capturas/postman_07_actualizar_proyecto_inexistente.png)

#### Eliminar proyecto: `204 No Content`

![Eliminar proyecto](docs/capturas/postman_08_eliminar_proyecto.png)

#### Confirmar eliminacion: `404 Not Found`

![Confirmar proyecto eliminado](docs/capturas/postman_09_confirmar_proyecto_eliminado.png)

#### Eliminar identificador inexistente: `404 Not Found`

![Eliminar proyecto inexistente](docs/capturas/postman_10_eliminar_id_inexistente.png)

### Ejecucion de pruebas automatizadas

![Pruebas automatizadas](docs/capturas/evidencia_ejecucion_test_automatizado.png)
