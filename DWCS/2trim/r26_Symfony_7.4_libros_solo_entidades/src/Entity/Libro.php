<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $titulo = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $fechaPublicacion = null;

    #[ORM\Column(nullable: true)]
    private ?int $unidadesVendidas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeImmutable
    {
        return $this->fechaPublicacion;
    }

    public function setFechaPublicacion(?\DateTimeImmutable $fechaPublicacion): static
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    public function getUnidadesVendidas(): ?int
    {
        return $this->unidadesVendidas;
    }

    public function setUnidadesVendidas(?int $unidadesVendidas): static
    {
        $this->unidadesVendidas = $unidadesVendidas;

        return $this;
    }
}
