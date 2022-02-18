<?php

namespace App\Entity;

use App\Repository\MangaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MangaRepository::class)
 */
class Manga
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puntuacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $portada;

    /**
     * @ORM\OneToMany(targetEntity=Capitulos::class, mappedBy="mangaId", orphanRemoval=true)
     */
    private $Capitulos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $votos;

    public function __construct()
    {
        $this->Capitulos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getPuntuacion(): ?int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(int $puntuacion): self
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getPortada(): ?string
    {
        return $this->portada;
    }

    public function setPortada(string $portada): self
    {
        $this->portada = $portada;

        return $this;
    }

    /**
     * @return Collection|Capitulos[]
     */
    public function getCapitulos(): Collection
    {
        return $this->Capitulos;
    }

    public function addCapitulo(Capitulos $capitulo): self
    {
        if (!$this->Capitulos->contains($capitulo)) {
            $this->Capitulos[] = $capitulo;
            $capitulo->setMangaId($this);
        }

        return $this;
    }

    public function removeCapitulo(Capitulos $capitulo): self
    {
        if ($this->Capitulos->removeElement($capitulo)) {
            // set the owning side to null (unless already changed)
            if ($capitulo->getMangaId() === $this) {
                $capitulo->setMangaId(null);
            }
        }

        return $this;
    }

    public function getVotos(): ?int
    {
        return $this->votos;
    }

    public function setVotos(?int $votos): self
    {
        $this->votos = $votos;

        return $this;
    }
}
