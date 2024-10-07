<?php
declare(strict_types=1);

namespace App\TournamentManagement\Infrastructure\Presentation\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournamentCompositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('trialName', TextType::class, [
                'label' => 'Nom de l\'épreuve',
            ])
            ->add('dogName', TextType::class, [
                'label' => 'Nom du chien',
            ])
            ->add('masterName', TextType::class, [
                'label' => 'Nom du maître',
            ]);
    }
}
