<?php

namespace App\Entity;

use App\Repository\CapitulosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapitulosRepository::class)
 */
class Capitulos
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
    private $uploader;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaSubida;

    /**
     * @ORM\ManyToOne(targetEntity=Manga::class, inversedBy="Capitulos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mangaId;

    /**
     * @ORM\Column(type="string")
     */
    private $imagenes = "";

  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUploader(): ?string
    {
        return $this->uploader;
    }

    public function setUploader(string $uploader): self
    {
        $this->uploader = $uploader;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getFechaSubida(): ?\DateTimeInterface
    {
        return $this->fechaSubida;
    }

    public function setFechaSubida(\DateTimeInterface $fechaSubida): self
    {
        $this->fechaSubida = $fechaSubida;

        return $this;
    }

    public function getMangaId(): ?Manga
    {
        return $this->mangaId;
    }

    public function setMangaId(?Manga $mangaId): self
    {
        $this->mangaId = $mangaId;

        return $this;
    }

    public function getImagenes(): ?string
    {
        return $this->imagenes;
    }

    public function setImagenes(string $imagenes): self
    {
        $this->imagenes = $imagenes;

        return $this;
    }

   
}
