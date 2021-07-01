<?php

namespace App\Form;

use App\Entity\Categorias;
use App\Entity\Operacion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', ChoiceType::class, [
                "choices" => [
                    "Ingreso" => "Ingreso",
                    "Gasto" => "Gasto"
                ]
            ])
            ->add('cantidad')
            ->add('descripcion')
            ->add('categoria', EntityType::class, [
                "class" => Categorias::class,
                'choice_label' => 'nombre',

            ])
            ->add('moneda', ChoiceType::class, [
                "choices" => ['cup'=>'cup', 'mlc'=>'mlc']
            ])
            ->add('fecha')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operacion::class,
        ]);
    }
}
