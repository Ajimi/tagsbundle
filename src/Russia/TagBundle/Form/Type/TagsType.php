<?php

namespace Russia\TagBundle\Form\Type;

use Doctrine\Common\Persistence\ObjectManager;
use Russia\TagBundle\Form\DataTransformer\TagsTransformer;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagsType extends AbstractType
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new CollectionToArrayTransformer(), true)
            ->addModelTransformer(new TagsTransformer($this->manager), true);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('attr', [
            'class' => 'tag-input',
            'data-role' => 'tagsinput'
        ]);
        $resolver->setDefault('required', false);
    }

    public function getParent()
    {
        return TextType::class;
    }


}