<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use App\Trait\DataTimeTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_article']], denormalizationContext: ['groups' => ['write_article']])]
class Article
{
    use DataTimeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_article', "write_article"])]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['read_article', "write_article"])]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Groups(['read_article', "write_article"])]
    private $content;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'articles')]
    #[Groups(['read_article', "write_article"])]
    
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

}
