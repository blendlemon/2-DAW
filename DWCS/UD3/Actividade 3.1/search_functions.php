<?php
function buscarLibros(PDO $con, string $termo): array {
    $termo = trim($termo);
    if ($termo === '') {
        return [];
    }

    $sql = "
        SELECT DISTINCT b.title
        FROM books b
        JOIN book_authors ba ON ba.book_id = b.book_id
        JOIN authors a ON a.author_id = ba.author_id
        WHERE b.title LIKE :q
        OR a.first_name LIKE :q
    ";
    $stmt = $con->prepare($sql);
    $stmt->execute([':q' => '%' . $termo . '%']);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}