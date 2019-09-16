<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Categorie;
use App\Entity\Image;
use App\Entity\Mark;
use App\Entity\Model;
use App\Entity\Product;
use App\Repository\ModelRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('image',EntityType::class,[
                'class'=>Image::class,
                'choice_label'=>'path',
            ])
            ->add('price')
            ->add('marque',EntityType::class,[
                'class'=>Brand::class,
                'choice_label' => 'name',

            ])
            ->add('categorie',EntityType::class,[
                'class'=>Categorie::class,
                'choice_label' => 'name',

            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
