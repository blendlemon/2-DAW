**PDO vs MySQLi — Guía práctica y fácil de entender**

**Introducción**: Esta guía explica las diferencias entre PDO (PHP Data Objects) y MySQLi, muestra ejemplos claros de uso (conexión, consultas preparadas, transacciones y manejo de errores) y da recomendaciones sobre cuándo usar cada uno.

- **PDO**: una capa de abstracción de bases de datos en PHP. Soporta muchos motores (MySQL, PostgreSQL, SQLite, etc.).
- **MySQLi**: extensión específica de MySQL. Permite uso procedural y orientado a objetos y algunas características específicas de MySQL.

**Resumen rápido**
- **Compatibilidad**: PDO trabaja con muchos motores; MySQLi solo con MySQL.
- **API**: PDO tiene API orientada a objetos y soporta named parameters; MySQLi tiene API procedural y orientada a objetos y usa `?` con `bind_param`.
- **Transacciones**: ambos soportan transacciones.
- **Rendimiento**: similar en la mayoría de casos; diferencias mínimas.

**1) Conexión**

- PDO (orientado a objetos):

```php
// PDO: conexión a MySQL
$dsn = 'mysql:host=localhost;dbname=bookdb;charset=utf8mb4';
$user = 'usuario';
$pass = 'secreto';

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // lanzar excepciones en errores
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch por defecto
    ]);
} catch (PDOException $e) {
    // manejar error de conexión
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
```

- MySQLi (orientado a objetos):

```php
// MySQLi OO
$mysqli = new mysqli('localhost', 'usuario', 'secreto', 'bookdb');
if ($mysqli->connect_errno) {
    echo 'Error de conexión: ' . $mysqli->connect_error;
    exit;
}
$mysqli->set_charset('utf8mb4');
```

- MySQLi (procedural):

```php
$mysqli = mysqli_connect('localhost', 'usuario', 'secreto', 'bookdb');
if (!$mysqli) {
    die('Error de conexión: ' . mysqli_connect_error());
}
mysqli_set_charset($mysqli, 'utf8mb4');
```

**2) Consultas preparadas (evitar SQL injection)**

- PDO (positional y named parameters):

```php
// Positional parameters
$stmt = $pdo->prepare('SELECT * FROM books WHERE title LIKE ?');
$search = '%Harry%';
$stmt->execute([$search]);
$rows = $stmt->fetchAll();

// Named parameters
$stmt = $pdo->prepare('SELECT * FROM books WHERE author = :author');
$stmt->execute(['author' => 'J. K. Rowling']);
$row = $stmt->fetch();
```

- MySQLi (OO):

```php
// MySQLi (OO) con placeholders ? y bind_param
$stmt = $mysqli->prepare('SELECT * FROM books WHERE title LIKE ?');
$search = '%Harry%';
$stmt->bind_param('s', $search); // 's' tipo string
$stmt->execute();
// obtener resultado: si mysqlnd está instalado
if (method_exists($stmt, 'get_result')) {
    $result = $stmt->get_result();
    while ($r = $result->fetch_assoc()) {
        // usar $r
    }
    $result->free();
} else {
    // fallback: bind_result
    $stmt->bind_result($col1, $col2 /*...*/);
    while ($stmt->fetch()) {
        // usar variables ligadas
    }
}
$stmt->close();
```

- MySQLi (procedural) — equivalente con `mysqli_prepare`, `mysqli_stmt_bind_param`, `mysqli_stmt_execute`.

**3) Fetch modes y lectura de resultados**
- PDO ofrece `fetch()`, `fetchAll()` y distintos modos: `PDO::FETCH_ASSOC`, `PDO::FETCH_OBJ`, `PDO::FETCH_NUM`, etc.
- MySQLi devuelve arrays asociativos con `fetch_assoc()` o objetos con `fetch_object()` cuando se usa `get_result()`. Con `bind_result()` recibes columnas en variables.

**4) Transacciones**

- PDO:
```php
$pdo->beginTransaction();
try {
    $pdo->exec("UPDATE accounts SET balance = balance - 100 WHERE id = 1");
    $pdo->exec("UPDATE accounts SET balance = balance + 100 WHERE id = 2");
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo 'Error y rollback: ' . $e->getMessage();
}
```

- MySQLi:
```php
$mysqli->begin_transaction();
try {
    $mysqli->query("UPDATE accounts SET balance = balance - 100 WHERE id = 1");
    $mysqli->query("UPDATE accounts SET balance = balance + 100 WHERE id = 2");
    $mysqli->commit();
} catch (Exception $e) {
    $mysqli->rollback();
    echo 'Error y rollback: ' . $e->getMessage();
}
```

**5) Manejo de errores**
- PDO: puedes configurar `PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION` y usar try/catch.
- MySQLi: revisa `$mysqli->error` y `$mysqli->errno`, o lanza excepciones manualmente.

**6) Ejemplo completo — Buscar libros o autores (MySQLi, OO)**

```php
// connection.php (ejemplo sencillo)
function getConnection() {
    $mysqli = new mysqli('localhost', 'usuario', 'secreto', 'bookdb');
    if ($mysqli->connect_errno) {
        throw new Exception('Conexión fallida: ' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8mb4');
    return $mysqli;
}

// uso en script
require_once 'connection.php';
$terminos = 'Rowling';
$con = getConnection();
$sql = "SELECT title AS resultado FROM books WHERE UPPER(title) LIKE ?
        UNION
        SELECT CONCAT(first_name, ' ', last_name) AS resultado
        FROM authors
        WHERE UPPER(CONCAT(first_name, ' ', last_name)) LIKE ?";

$stmt = $con->prepare($sql);
$filtro = '%' . strtoupper($terminos) . '%';
$stmt->bind_param('ss', $filtro, $filtro);
$stmt->execute();

if (method_exists($stmt, 'get_result')) {
    $res = $stmt->get_result();
    while ($r = $res->fetch_assoc()) {
        echo htmlspecialchars($r['resultado']);
    }
    $res->free();
} else {
    $stmt->bind_result($resultado_col);
    while ($stmt->fetch()) {
        echo htmlspecialchars($resultado_col);
    }
}
$stmt->close();
$con->close();
```

**7) Comparativa práctica**

- **Portabilidad**: PDO gana (mismo código para varios motores).
- **Funciones específicas de MySQL**: MySQLi puede exponer características específicas.
- **Named parameters**: PDO permite `:name`, MySQLi no.
- **get_result()**: MySQLi con `get_result()` requiere `mysqlnd`. Si no está presente hay que usar `bind_result()`.

**8) Recomendaciones**
- Si necesitas compatibilidad con varios motores, elige **PDO**.
- Si solo trabajas con MySQL y necesitas funciones específicas o prefieres `bind_param`, **MySQLi** está bien.
- Para seguridad: usa siempre consultas preparadas (PDO o MySQLi) y `htmlspecialchars()` antes de imprimir datos en HTML.

**9) Cómo probar rápidamente local**

- Ejecuta un servidor local (desde la raíz del proyecto):

```powershell
php -S localhost:8000 -t 'C:\Users\Diego\Desktop\2-DAW\DWCS'
```

- Abre en el navegador: `http://localhost:8000/UD3/Actividade%203.4/search_books.php`

**10) Enlaces útiles**
- Documentación PDO: https://www.php.net/manual/es/book.pdo.php
- Documentación MySQLi: https://www.php.net/manual/es/book.mysqli.php

---

*Archivo creado en `docs/pdo_vs_mysqli.md`.*
