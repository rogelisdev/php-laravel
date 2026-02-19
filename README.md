# 🚀 Proyecto Laravel con Docker (Sail)

Este proyecto está configurado para ejecutarse completamente con Docker usando Laravel Sail.
No necesitas instalar PHP, MySQL, Composer o Node en tu máquina.

---

# 🐳 Requisitos

Antes de comenzar, asegúrate de tener instalado:

* Docker Desktop (Windows / Mac / Linux)
  o
* Docker Engine (Linux)

Verifica que Docker esté corriendo:

```bash
docker ps
```

Si no muestra error, está listo.

---

# ⚙️ Instalación del Proyecto

## 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/usuario/proyecto.git
cd proyecto
```

---

## 2️⃣ Copiar variables de entorno

```bash
cp .env.example .env
```

Si necesitas cambiar puertos (por ejemplo si 80 o 3306 están ocupados), edítalos aquí o en `docker-compose.yml`.

---

## 3️⃣ Instalar dependencias con Docker (sin PHP local)

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

Esto ejecuta Composer dentro de un contenedor temporal.

---

## 4️⃣ Levantar contenedores

```bash
./vendor/bin/sail up -d
```

La primera vez puede tardar varios minutos mientras se construyen las imágenes.

Para verificar que todo está corriendo:

```bash
docker ps
```

Deberías ver los contenedores:

* laravel.test
* mysql

---

## 5️⃣ Generar la key de Laravel

```bash
./vendor/bin/sail artisan key:generate
```

---

## 6️⃣ Ejecutar migraciones

```bash
./vendor/bin/sail artisan migrate
```

Si deseas datos de prueba:

```bash
./vendor/bin/sail artisan db:seed
```

---

# 🌐 Acceso a la aplicación

Si usas el puerto por defecto:

```
http://localhost
```

Si configuraste puerto 8080:

```
http://localhost:8080
```

---

# 🛠 Comandos útiles

## Detener contenedores

```bash
./vendor/bin/sail down
```

## Ver logs

```bash
./vendor/bin/sail logs
```

## Ejecutar comandos Artisan

```bash
./vendor/bin/sail artisan <comando>
```

Ejemplo:

```bash
./vendor/bin/sail artisan test
```

## Ejecutar NPM dentro del contenedor

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

---

# 🧪 Ejecutar Tests

```bash
./vendor/bin/sail artisan test
```

---

# 🗄 Base de Datos

Por defecto:

* Host: mysql
* Puerto interno: 3306
* Usuario: sail
* Password: password

Si cambiaste el puerto externo (ej: 3307), la app seguirá usando 3306 internamente.

---

# ⚠️ Problemas comunes

## Puerto en uso (80, 3306, 5173)

Si aparece error como:

```
bind: address already in use
```

Solución:

* Cambiar el puerto en `docker-compose.yml`
* O detener el servicio local que esté usando ese puerto

---

# 🧠 Flujo Profesional

Para cualquier desarrollador nuevo:

1. Instalar Docker
2. Clonar el repo
3. Copiar `.env`
4. Ejecutar `sail up`
5. Migrar base de datos

No necesita instalar nada más.

---

# 🔥 Stack del Proyecto

* Laravel
* MySQL
* Docker
* Laravel Sail
* PHPUnit
* Vite

---

# 📦 Apagar el entorno

```bash
./vendor/bin/sail down
```

---

# 👨‍💻 Autor

Proyecto preparado para desarrollo profesional con entorno completamente dockerizado.

---

🐳 Happy coding!
