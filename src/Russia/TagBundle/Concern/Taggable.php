<?php

namespace Russia\TagBundle\Concern;

use AppBundle\Entity\Article;

trait Taggable
{
    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Russia\TagBundle\Entity\Tag", cascade={"persist"})
     */
    private $tags;


    /**
     * Add tag
     *
     * @param \Russia\TagBundle\Entity\Tag $tag
     *
     * @return Article
     */
    public function addTag(\Russia\TagBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Russia\TagBundle\Entity\Tag $tag
     */
    public function removeTag(\Russia\TagBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}