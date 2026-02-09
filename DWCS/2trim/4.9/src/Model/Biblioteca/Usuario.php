<?php
namespace App\Model\Biblioteca;

class Usuario {
    private int $id;
    private string $nombre;
    private string $email;
    private array $prestamos = [];

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

    public function addPrestamo(Prestamo $prestamo): void
    {
        $this->prestamos [$prestamo->getRecurso()->getId()] = $prestamo;
    }

    public function removePrestamo(int $recursoId){
        if(isset($this->prestamos[$recursoId])){
            unset($this->prestamos[$recursoId]);
        }
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}