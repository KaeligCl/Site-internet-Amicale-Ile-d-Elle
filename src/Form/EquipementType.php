<?php

namespace App\Form;

use App\Entity\Equipement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('prixPlein', IntegerType::class, ['label' => 'Prix plein tarif (€)'])
            ->add('prixMembre', IntegerType::class, ['label' => 'Prix membre (€)'])
            ->add('image', TextType::class, [
                'label' => 'Image (chemin, ex : picture/barnum.jpg)',
                'required' => false,
            ])
            ->add('encoreDisponible', CheckboxType::class, [
                'label' => 'Encore disponible ?',
                'required' => false,
            ])
            ->add('description', TextareaType::class, ['label' => 'Description'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipement::class,
        ]);
    }
}
