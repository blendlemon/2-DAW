<?php
namespace App\Model\Biblioteca;

class Usuario {
    private string $nombre;
    private string $email;
    private array $prestamos;

    public function __construct(string $nombre, string $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of prestamos
     *
     * @return array
     */
    public function getPrestamos(): array
    {
        return $this->prestamos;
    }

    /**
     * Set the value of prestamos
     *
     * @param array $prestamos
     *
     * @return self
     */
    public function setPrestamos(array $prestamos): self
    {
        $this->prestamos = $prestamos;

        return $this;
    }
}