<?php

declare(strict_types=1);

namespace App\Form;

use App\TaskTable\Task\Infrastructure\Doctrine\Entity\TaskEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TaskForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // for example
        $builder
            ->add('name', TextType::class, [
                'label' => 'trans.name'
            ]) //....
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TaskEntity::class,
            'validation_groups' => null
        ]);
    }
}