<?php

namespace App\Entity;

use App\Repository\EcartRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EcartRepository::class)
 */
class Ecart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = -1,
     *      max = 36,
     *      minMessage = "Vous devez entrer un nombre supérieur à 0",
     *      maxMessage = "Vous devez entrer un nombre ne dépassant pas 36"
     * )
     */
    private $tirage;

    /**
     * @ORM\Column(type="integer")
     */
    private $douzaine1=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $douzaine2=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $douzaine3=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $colonne1=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $colonne2=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $colonne3=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $transversale1=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $transversale2=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $transversale3=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $sixain1=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $sixain2=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $sixain3=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $final1=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $final2=0;

    /**
     * @ORM\Column(type="integer")
     */
    private $final3=0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTirage(): ?int
    {
        return $this->tirage;
    }

    public function setTirage(int $tirage): self
    {
        $this->tirage = $tirage;

        return $this;
    }

    public function getDouzaine1(): ?int
    {
        return $this->douzaine1;
    }

    public function setDouzaine1(int $douzaine1): self
    {
        $this->douzaine1 = $douzaine1;

        return $this;
    }

    public function getDouzaine2(): ?int
    {
        return $this->douzaine2;
    }

    public function setDouzaine2(int $douzaine2): self
    {
        $this->douzaine2 = $douzaine2;

        return $this;
    }

    public function getDouzaine3(): ?int
    {
        return $this->douzaine3;
    }

    public function setDouzaine3(int $douzaine3): self
    {
        $this->douzaine3 = $douzaine3;

        return $this;
    }

    public function getColonne1(): ?int
    {
        return $this->colonne1;
    }

    public function setColonne1(int $colonne1): self
    {
        $this->colonne1 = $colonne1;

        return $this;
    }

    public function getColonne2(): ?int
    {
        return $this->colonne2;
    }

    public function setColonne2(int $colonne2): self
    {
        $this->colonne2 = $colonne2;

        return $this;
    }

    public function getColonne3(): ?int
    {
        return $this->colonne3;
    }

    public function setColonne3(int $colonne3): self
    {
        $this->colonne3 = $colonne3;

        return $this;
    }

    public function getTransversale1(): ?int
    {
        return $this->transversale1;
    }

    public function setTransversale1(int $transversale1): self
    {
        $this->transversale1 = $transversale1;

        return $this;
    }

    public function getTransversale2(): ?int
    {
        return $this->transversale2;
    }

    public function setTransversale2(int $transversale2): self
    {
        $this->transversale2 = $transversale2;

        return $this;
    }

    public function getTransversale3(): ?int
    {
        return $this->transversale3;
    }

    public function setTransversale3(int $transversale3): self
    {
        $this->transversale3 = $transversale3;

        return $this;
    }

    public function getSixain1(): ?int
    {
        return $this->sixain1;
    }

    public function setSixain1(int $sixain1): self
    {
        $this->sixain1 = $sixain1;

        return $this;
    }

    public function getSixain2(): ?int
    {
        return $this->sixain2;
    }

    public function setSixain2(int $sixain2): self
    {
        $this->sixain2 = $sixain2;

        return $this;
    }

    public function getSixain3(): ?int
    {
        return $this->sixain3;
    }

    public function setSixain3(int $sixain3): self
    {
        $this->sixain3 = $sixain3;

        return $this;
    }

    public function getFinal1(): ?int
    {
        return $this->final1;
    }

    public function setFinal1(int $final1): self
    {
        $this->final1 = $final1;

        return $this;
    }

    public function getFinal2(): ?int
    {
        return $this->final2;
    }

    public function setFinal2(int $final2): self
    {
        $this->final2 = $final2;

        return $this;
    }

    public function getFinal3(): ?int
    {
        return $this->final3;
    }

    public function setFinal3(int $final3): self
    {
        $this->final3 = $final3;

        return $this;
    }
}
