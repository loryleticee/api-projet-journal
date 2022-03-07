<?php

namespace App\Trait;
use Doctrine\ORM\Mapping as ORM;
use DateTime as DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

trait DataTimeTrait {
    #[ORM\Column(type: 'datetime')]
    #[Groups(['read_article', "write_article", "read_user", "write_user"])]
    private DateTime $createdAt;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['read_article', "write_article", "read_user", "write_user"])]
    private DateTime $updateAt;

    /**
     * Get the value of updateAt
     *
     * @return DateTime
     */
    public function getUpdateAt(): DateTime
    {
        return $this->updateAt;
    }

    /**
     * Set the value of updateAt
     *
     * @param DateTime $updateAt
     *
     * @return self
     */
    public function setUpdateAt(DateTime $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param DateTime $createdAt
     *
     * @return self
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}