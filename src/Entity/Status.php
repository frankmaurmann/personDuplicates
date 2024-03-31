<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
#[ORM\Table(name: 'cdb_status')]
#[ORM\Index(columns:['id'])]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(nullable: false)]
    private int $id;

    #[ORM\Column(length: 30, nullable: false)]
    private string $bezeichnung;

    #[ORM\Column(length: 10, nullable: false)]
    private string $kuerzel;

    #[ORM\Column(nullable: false)]
    private int $mitglied_yn;

    #[ORM\Column(nullable: false)]
    private int $infreitextauswahl_yn;

    #[ORM\Column(nullable: false)]
    private int $sortkey;

    #[ORM\Column(nullable: false)]
    private int $securitylevel_id;

    public function getSortkey(): int
    {
        return $this->sortkey;
    }

    public function setSortkey(int $sortkey): void
    {
        $this->sortkey = $sortkey;
    }

    public function getSecuritylevelId(): int
    {
        return $this->securitylevel_id;
    }

    public function setSecuritylevelId(int $securitylevel_id): void
    {
        $this->securitylevel_id = $securitylevel_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getBezeichnung(): ?string
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung(string $bezeichnung): static
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getKuerzel(): ?string
    {
        return $this->kuerzel;
    }

    public function setKuerzel(string $kuerzel): static
    {
        $this->kuerzel = $kuerzel;

        return $this;
    }

    public function getMitgliedYn(): ?int
    {
        return $this->mitglied_yn;
    }

    public function setMitgliedYn(int $mitglied_yn): static
    {
        $this->mitglied_yn = $mitglied_yn;

        return $this;
    }

    public function getInfreitextauswahlYn(): ?int
    {
        return $this->infreitextauswahl_yn;
    }

    public function setInfreitextauswahlYn(int $infreitextauswahl_yn): static
    {
        $this->infreitextauswahl_yn = $infreitextauswahl_yn;

        return $this;
    }
}
