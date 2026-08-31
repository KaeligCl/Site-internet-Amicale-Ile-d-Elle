<?php

namespace App\Form;

use App\Entity\Evenements;
use App\Entity\PhotoEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('dateDebut', DateTimeType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
            ])
            ->add('dateFin', DateTimeType::class, [
                'label' => 'Date de fin (optionnel)',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('lieu', TextType::class, ['label' => 'Lieu'])
            ->add('lienEvent', UrlType::class, [
                'label' => 'Lien Facebook (optionnel)',
                'required' => false,
            ])
            ->add('pic', EntityType::class, [
                'class' => PhotoEvent::class,
                'choice_label' => 'id',
                'required' => false,
                'placeholder' => '— Aucune photo —',
                'label' => 'Galerie photo',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
