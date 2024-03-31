<?php

namespace App\Entity;

use App\Repository\StationRepository;
use ContainerOiiF2Sp\getTexter_TransportsService;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[ORM\Table(name: 'cdb_station')]
#[ORM\Index(columns:['id'])]
#[ORM\Index(name: 'cdb_station_cc_addresses_id_fk', columns: ['address_id'])]
#[ORM\Index(name: 'cdb_station_cc_associations_id_fk', columns: ['association_id'])]
#[ORM\Index(name: 'cdb_station_sign_up_group_id_cdb_gruppe_id', columns: ['sign_up_group_id'])]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(nullable: false)]
    private int $id;

    #[ORM\Column(length: 40)]
    private ?string $guid = null;

    #[ORM\Column(length: 255)]
    private ?string $bezeichnung = null;

    #[ORM\Column(length: 20)]
    private ?string $shortName = null;

    #[ORM\Column(length: 10)]
    private string $kuerzel;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private string $sortkey;

    #[ORM\Column(length: 7, nullable: false, options: ['default' => 'campus'])]
    private ?string $profileType = null;

    #[ORM\Column( options: ['default' => 0])]
    private ?bool $is_published = null;

    #[ORM\Column(type: 'text', nullable: false)]
    private string $description;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 100, options: ['default' => 'denomination.none'])]
    private ?string $denomination = null;

    #[ORM\Column(nullable: true)]
    private ?int $association_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $address_id = null;

    #[ORM\Column(type: 'text', nullable: false)]
    private string $social_media;

    #[ORM\Column(type: 'text', nullable: false)]
    private string $tags;

    #[ORM\Column(nullable: false, options: ['default' => 0])]
    private ?int $visitors = null;

    #[ORM\Column]
    private ?int $sign_up_group_id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $team_title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private \DateTimeInterface $created_date;

    #[ORM\Column(nullable: false)]
    private int $created_pid;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false)]
    private \DateTimeInterface $modified_date;

    #[ORM\Column(nullable: true)]
    private int $modified_pid;

    public function __construct()
    {
        $this->created_date = new \DateTimeImmutable('now');
        $this->modified_date = new \DateTimeImmutable('now');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): void
    {
        $this->guid = $guid;
    }

    public function getBezeichnung(): ?string
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung(?string $bezeichnung): void
    {
        $this->bezeichnung = $bezeichnung;
    }

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): void
    {
        $this->shortName = $shortName;
    }

    public function getKuerzel(): string
    {
        return $this->kuerzel;
    }

    public function setKuerzel(string $kuerzel): void
    {
        $this->kuerzel = $kuerzel;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getSortkey(): string
    {
        return $this->sortkey;
    }

    public function setSortkey(string $sortkey): void
    {
        $this->sortkey = $sortkey;
    }

    public function getProfileType(): ?string
    {
        return $this->profileType;
    }

    public function setProfileType(?string $profileType): void
    {
        $this->profileType = $profileType;
    }

    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    public function setIsPublished(?bool $is_published): void
    {
        $this->is_published = $is_published;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(?string $denomination): void
    {
        $this->denomination = $denomination;
    }

    public function getAssociationId(): ?int
    {
        return $this->association_id;
    }

    public function setAssociationId(?int $association_id): void
    {
        $this->association_id = $association_id;
    }

    public function getAddressId(): ?int
    {
        return $this->address_id;
    }

    public function setAddressId(?int $address_id): void
    {
        $this->address_id = $address_id;
    }

    public function getSocialMedia(): string
    {
        return $this->social_media;
    }

    public function setSocialMedia(string $social_media): void
    {
        $this->social_media = $social_media;
    }

    public function getTags(): string
    {
        return $this->tags;
    }

    public function setTags(string $tags): void
    {
        $this->tags = $tags;
    }

    public function getVisitors(): ?int
    {
        return $this->visitors;
    }

    public function setVisitors(?int $visitors): void
    {
        $this->visitors = $visitors;
    }

    public function getSignUpGroupId(): ?int
    {
        return $this->sign_up_group_id;
    }

    public function setSignUpGroupId(?int $sign_up_group_id): void
    {
        $this->sign_up_group_id = $sign_up_group_id;
    }

    public function getTeamTitle(): ?string
    {
        return $this->team_title;
    }

    public function setTeamTitle(?string $team_title): void
    {
        $this->team_title = $team_title;
    }

    public function getCreatedDate(): \DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): void
    {
        $this->created_date = $created_date;
    }

    public function getCreatedPid(): int
    {
        return $this->created_pid;
    }

    public function setCreatedPid(int $created_pid): void
    {
        $this->created_pid = $created_pid;
    }

    public function getModifiedDate(): \DateTimeInterface
    {
        return $this->modified_date;
    }

    public function setModifiedDate(\DateTimeInterface $modified_date): void
    {
        $this->modified_date = $modified_date;
    }

    public function getModifiedPid(): int
    {
        return $this->modified_pid;
    }

    public function setModifiedPid(int $modified_pid): void
    {
        $this->modified_pid = $modified_pid;
    }
}
