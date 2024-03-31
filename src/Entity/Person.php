<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\Table(name: 'cdb_person')]
class Person
{
    #[ORM\OneToOne(targetEntity: Gemeindeperson::class, mappedBy: 'person')]
    private Gemeindeperson $gemeindeperson;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', nullable: false)]
    private int $id;

    #[ORM\Column(length: 40, nullable: false)]
    private string $guid;

    #[ORM\Column(length: 30, nullable: false)]
    private string $name;

    #[ORM\Column(length: 30, nullable: false)]
    private string $vorname;

    #[ORM\Column(length: 30, nullable: false)]
    private string $spitzname;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $active_yn;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $loginstr = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastlogin = null;

    #[ORM\Column(nullable: false)]
    private int $loginerrorcount;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $acceptedsecurity = null;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $geschlecht_no;

    #[ORM\Column(length: 30, nullable: false)]
    private string $titel;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $strasse = null;

    #[ORM\Column(length: 20, nullable: false)]
    private string $plz;

    #[ORM\Column(length: 40, nullable: false)]
    private string $ort;

    #[ORM\Column(length: 30, nullable: false)]
    private string $land;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $zusatz = null;

    #[ORM\Column(length: 30, nullable: false)]
    private string $telefonprivat;

    #[ORM\Column(length: 20, nullable: false)]
    private string $telefongeschaeftlich;

    #[ORM\Column(length: 20, nullable: false)]
    private string $telefonhandy;

    #[ORM\Column(length: 20, nullable: false)]
    private string $fax;

    #[ORM\Column(length: 50, nullable: false)]
    private string $email;

    #[ORM\Column(length: 20, nullable: false)]
    private string $geolat;

    #[ORM\Column(length: 20, nullable: false)]
    private string $geolng;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $geolat_loose = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $geolng_loose = null;

    #[ORM\Column(length: 50)]
    private ?string $cmsuserid = null;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $archiv_yn;

    #[ORM\Column(length: 30, nullable: false)]
    private string $optigem_nr;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datasecuritymail_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $privacy_policy_agreement_date = null;

    #[ORM\Column(nullable: true)]
    private int $privacy_policy_agreement_type_id;

    #[ORM\Column(nullable: true)]
    private int $privacy_policy_agreement_who_id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $letzteaenderung = null;

    #[ORM\Column(nullable: true)]
    private int $aenderunguser;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private int $is_system_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function setGuid(string $guid): void
    {
        $this->guid = $guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getVorname(): string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): void
    {
        $this->vorname = $vorname;
    }

    public function getSpitzname(): string
    {
        return $this->spitzname;
    }

    public function setSpitzname(string $spitzname): void
    {
        $this->spitzname = $spitzname;
    }

    public function getActiveYn(): int
    {
        return $this->active_yn;
    }

    public function setActiveYn(int $active_yn): void
    {
        $this->active_yn = $active_yn;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getLoginstr(): ?string
    {
        return $this->loginstr;
    }

    public function setLoginstr(?string $loginstr): void
    {
        $this->loginstr = $loginstr;
    }

    public function getLastlogin(): ?\DateTimeInterface
    {
        return $this->lastlogin;
    }

    public function setLastlogin(?\DateTimeInterface $lastlogin): void
    {
        $this->lastlogin = $lastlogin;
    }

    public function getLoginerrorcount(): int
    {
        return $this->loginerrorcount;
    }

    public function setLoginerrorcount(int $loginerrorcount): void
    {
        $this->loginerrorcount = $loginerrorcount;
    }

    public function getAcceptedsecurity(): ?\DateTimeInterface
    {
        return $this->acceptedsecurity;
    }

    public function setAcceptedsecurity(?\DateTimeInterface $acceptedsecurity): void
    {
        $this->acceptedsecurity = $acceptedsecurity;
    }

    public function getGeschlechtNo(): int
    {
        return $this->geschlecht_no;
    }

    public function setGeschlechtNo(int $geschlecht_no): void
    {
        $this->geschlecht_no = $geschlecht_no;
    }

    public function getTitel(): string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): void
    {
        $this->titel = $titel;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(?string $strasse): void
    {
        $this->strasse = $strasse;
    }

    public function getPlz(): string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): void
    {
        $this->plz = $plz;
    }

    public function getOrt(): string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): void
    {
        $this->ort = $ort;
    }

    public function getLand(): string
    {
        return $this->land;
    }

    public function setLand(string $land): void
    {
        $this->land = $land;
    }

    public function getZusatz(): ?string
    {
        return $this->zusatz;
    }

    public function setZusatz(?string $zusatz): void
    {
        $this->zusatz = $zusatz;
    }

    public function getTelefonprivat(): string
    {
        return $this->telefonprivat;
    }

    public function setTelefonprivat(string $telefonprivat): void
    {
        $this->telefonprivat = $telefonprivat;
    }

    public function getTelefongeschaeftlich(): string
    {
        return $this->telefongeschaeftlich;
    }

    public function setTelefongeschaeftlich(string $telefongeschaeftlich): void
    {
        $this->telefongeschaeftlich = $telefongeschaeftlich;
    }

    public function getTelefonhandy(): string
    {
        return $this->telefonhandy;
    }

    public function setTelefonhandy(string $telefonhandy): void
    {
        $this->telefonhandy = $telefonhandy;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getGeolat(): string
    {
        return $this->geolat;
    }

    public function setGeolat(string $geolat): void
    {
        $this->geolat = $geolat;
    }

    public function getGeolng(): string
    {
        return $this->geolng;
    }

    public function setGeolng(string $geolng): void
    {
        $this->geolng = $geolng;
    }

    public function getGeolatLoose(): ?string
    {
        return $this->geolat_loose;
    }

    public function setGeolatLoose(?string $geolat_loose): void
    {
        $this->geolat_loose = $geolat_loose;
    }

    public function getGeolngLoose(): ?string
    {
        return $this->geolng_loose;
    }

    public function setGeolngLoose(?string $geolng_loose): void
    {
        $this->geolng_loose = $geolng_loose;
    }

    public function getCmsuserid(): ?string
    {
        return $this->cmsuserid;
    }

    public function setCmsuserid(?string $cmsuserid): void
    {
        $this->cmsuserid = $cmsuserid;
    }

    public function getArchivYn(): int
    {
        return $this->archiv_yn;
    }

    public function setArchivYn(int $archiv_yn): void
    {
        $this->archiv_yn = $archiv_yn;
    }

    public function getOptigemNr(): string
    {
        return $this->optigem_nr;
    }

    public function setOptigemNr(string $optigem_nr): void
    {
        $this->optigem_nr = $optigem_nr;
    }

    public function getDatasecuritymailDate(): ?\DateTimeInterface
    {
        return $this->datasecuritymail_date;
    }

    public function setDatasecuritymailDate(?\DateTimeInterface $datasecuritymail_date): void
    {
        $this->datasecuritymail_date = $datasecuritymail_date;
    }

    public function getPrivacyPolicyAgreementDate(): ?\DateTimeInterface
    {
        return $this->privacy_policy_agreement_date;
    }

    public function setPrivacyPolicyAgreementDate(?\DateTimeInterface $privacy_policy_agreement_date): void
    {
        $this->privacy_policy_agreement_date = $privacy_policy_agreement_date;
    }

    public function getPrivacyPolicyAgreementTypeId(): int
    {
        return $this->privacy_policy_agreement_type_id;
    }

    public function setPrivacyPolicyAgreementTypeId(int $privacy_policy_agreement_type_id): void
    {
        $this->privacy_policy_agreement_type_id = $privacy_policy_agreement_type_id;
    }

    public function getPrivacyPolicyAgreementWhoId(): int
    {
        return $this->privacy_policy_agreement_who_id;
    }

    public function setPrivacyPolicyAgreementWhoId(int $privacy_policy_agreement_who_id): void
    {
        $this->privacy_policy_agreement_who_id = $privacy_policy_agreement_who_id;
    }

    public function getCreatedate(): ?\DateTimeInterface
    {
        return $this->createdate;
    }

    public function setCreatedate(?\DateTimeInterface $createdate): void
    {
        $this->createdate = $createdate;
    }

    public function getLetzteaenderung(): ?\DateTimeInterface
    {
        return $this->letzteaenderung;
    }

    public function setLetzteaenderung(?\DateTimeInterface $letzteaenderung): void
    {
        $this->letzteaenderung = $letzteaenderung;
    }

    public function getAenderunguser(): int
    {
        return $this->aenderunguser;
    }

    public function setAenderunguser(int $aenderunguser): void
    {
        $this->aenderunguser = $aenderunguser;
    }

    public function getIsSystemUser(): int
    {
        return $this->is_system_user;
    }

    public function setIsSystemUser(int $is_system_user): void
    {
        $this->is_system_user = $is_system_user;
    }

    public function getGemeindeperson(): Gemeindeperson
    {
        return $this->gemeindeperson;
    }

    public function setGemeindeperson(Gemeindeperson $gemeindeperson): void
    {
        $this->gemeindeperson = $gemeindeperson;
    }
}
