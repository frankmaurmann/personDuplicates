<?php

namespace App\Entity;

use App\Repository\GemeindepersonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GemeindepersonRepository::class)]
#[ORM\Table(name: 'cdb_gemeindeperson')]
#[ORM\Index(columns:['id'])]
#[ORM\Index(name: 'person_id', columns: ['person_id'])]
#[ORM\Index(name: 'station_id', columns: ['station_id'])]
#[ORM\Index(name: 'status_id', columns: ['status_id'])]
class Gemeindeperson
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(nullable: false)]
    private int $id;

    #[ORM\OneToOne( targetEntity: Person::class, inversedBy: 'gemeindeperson')]
    private Person $person;

    #[ORM\Column(length: 50, nullable: false)]
    private string $beruf;

    #[ORM\Column(length: 30, nullable: false)]
    private string $geburtsname;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $geburtsdatum = null;

    #[ORM\Column(length: 30, nullable: false)]
    private string $geburtsort;
    #[ORM\Column(length: 30, nullable: false)]
    private string $nationalitaet;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $nationalitaet_id;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $familienstand_no;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hochzeitsdatum = null;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $station_Id;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $status_id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $erstkontakt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $zugehoerig = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $eintrittsdatum = null;

    #[ORM\Column(length: 10, nullable: false)]
    private string $austrittsgrund;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $austrittsdatum = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $taufdatum = null;

    #[ORM\Column(length: 50, nullable: false)]
    private string $taufort;

    #[ORM\Column(length: 50, nullable: false)]
    private string $getauftdurch;

    #[ORM\Column(length: 30, nullable: false)]
    private string $ueberwiesennach;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $imageurl = null;

    #[ORM\Column(length: 64)]
    private ?string $familyimageurl = null;

    #[ORM\Column(nullable: false)]
    private int $growpath_id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $letzteaenderung = null;

    #[ORM\Column(nullable: true)]
    private ?int $aenderunguser = null;


    #[ORM\Column(nullable: true)]
    private ?int $GEV = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalitaetId(): int
    {
        return $this->nationalitaet_id;
    }

    public function setNationalitaetId(int $nationalitaet_id): void
    {
        $this->nationalitaet_id = $nationalitaet_id;
    }

    public function getAustrittsgrund(): string
    {
        return $this->austrittsgrund;
    }

    public function setAustrittsgrund(string $austrittsgrund): void
    {
        $this->austrittsgrund = $austrittsgrund;
    }

    public function getUeberwiesennach(): string
    {
        return $this->ueberwiesennach;
    }

    public function setUeberwiesennach(string $ueberwiesennach): void
    {
        $this->ueberwiesennach = $ueberwiesennach;
    }

    public function getImageurl(): ?string
    {
        return $this->imageurl;
    }

    public function setImageurl(?string $imageurl): void
    {
        $this->imageurl = $imageurl;
    }

    public function getFamilyimageurl(): ?string
    {
        return $this->familyimageurl;
    }

    public function setFamilyimageurl(?string $familyimageurl): void
    {
        $this->familyimageurl = $familyimageurl;
    }

    public function getGrowpathId(): int
    {
        return $this->growpath_id;
    }

    public function setGrowpathId(int $growpath_id): void
    {
        $this->growpath_id = $growpath_id;
    }

    public function getLetzteaenderung(): ?\DateTimeInterface
    {
        return $this->letzteaenderung;
    }

    public function setLetzteaenderung(?int $letzteaenderung): void
    {
        $this->letzteaenderung = $letzteaenderung;
    }

    public function getAenderunguser(): ?int
    {
        return $this->aenderunguser;
    }

    public function setAenderunguser(?int $aenderunguser): void
    {
        $this->aenderunguser = $aenderunguser;
    }

    public function getGEV(): ?int
    {
        return $this->GEV;
    }

    public function setGEV(?int $GEV): void
    {
        $this->GEV = $GEV;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getBeruf(): ?string
    {
        return $this->beruf;
    }

    public function setBeruf(string $beruf): static
    {
        $this->beruf = $beruf;

        return $this;
    }

    public function getGeburtsname(): ?string
    {
        return $this->geburtsname;
    }

    public function setGeburtsname(string $geburtsname): static
    {
        $this->geburtsname = $geburtsname;

        return $this;
    }

    public function getGeburtsdatum(): ?\DateTimeInterface
    {
        return $this->geburtsdatum;
    }

    public function setGeburtsdatum(\DateTimeInterface $geburtsdatum): static
    {
        $this->geburtsdatum = $geburtsdatum;

        return $this;
    }

    public function getNationalitaet(): ?string
    {
        return $this->nationalitaet;
    }

    public function setNationalitaet(string $nationalitaet): static
    {
        $this->nationalitaet = $nationalitaet;

        return $this;
    }

    public function getFamilienstandNo(): ?int
    {
        return $this->familienstand_no;
    }

    public function setFamilienstandNo(int $familienstand_no): static
    {
        $this->familienstand_no = $familienstand_no;

        return $this;
    }

    public function getHochzeitsdatum(): ?\DateTimeInterface
    {
        return $this->hochzeitsdatum;
    }

    public function setHochzeitsdatum(\DateTimeInterface $hochzeitsdatum): static
    {
        $this->hochzeitsdatum = $hochzeitsdatum;

        return $this;
    }

    public function getStationId(): ?int
    {
        return $this->station_Id;
    }

    public function setStationId(int $station_Id): static
    {
        $this->station_Id = $station_Id;

        return $this;
    }

    public function getStatusId(): ?int
    {
        return $this->status_id;
    }

    public function setStatusId(int $status_id): static
    {
        $this->status_id = $status_id;

        return $this;
    }

    public function getErstkontakt(): ?\DateTimeInterface
    {
        return $this->erstkontakt;
    }

    public function setErstkontakt(\DateTimeInterface $erstkontakt): static
    {
        $this->erstkontakt = $erstkontakt;

        return $this;
    }

    public function getZugehoerig(): ?\DateTimeInterface
    {
        return $this->zugehoerig;
    }

    public function setZugehoerig(\DateTimeInterface $zugehoerig): static
    {
        $this->zugehoerig = $zugehoerig;

        return $this;
    }

    public function getEintrittsdatum(): ?\DateTimeInterface
    {
        return $this->eintrittsdatum;
    }

    public function setEintrittsdatum(\DateTimeInterface $eintrittsdatum): static
    {
        $this->eintrittsdatum = $eintrittsdatum;

        return $this;
    }

    public function getAustrittsdatum(): ?\DateTimeInterface
    {
        return $this->austrittsdatum;
    }

    public function setAustrittsdatum(\DateTimeInterface $austrittsdatum): static
    {
        $this->austrittsdatum = $austrittsdatum;

        return $this;
    }

    public function getTaufdatum(): ?\DateTimeInterface
    {
        return $this->taufdatum;
    }

    public function setTaufdatum(\DateTimeInterface $taufdatum): static
    {
        $this->taufdatum = $taufdatum;

        return $this;
    }

    public function getTaufort(): ?string
    {
        return $this->taufort;
    }

    public function setTaufort(string $taufort): static
    {
        $this->taufort = $taufort;

        return $this;
    }

    public function getGetauftdurch(): ?string
    {
        return $this->getauftdurch;
    }

    public function setGetauftdurch(string $getauftdurch): static
    {
        $this->getauftdurch = $getauftdurch;

        return $this;
    }

    public function getGeburtsort(): string
    {
        return $this->geburtsort;
    }

    public function setGeburtsort(string $geburtsort): void
    {
        $this->geburtsort = $geburtsort;
    }

    public function getPerson(): Person
    {
        return $this->person;
    }

    public function setPerson(Person $person): void
    {
        $this->person = $person;
    }
}
