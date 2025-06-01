<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[

            ])
            ->add('content', CKEditorType::class, [
                'config' => [
                    'toolbar' => ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                    'uiColor' => '#ffffff',
                ]
            ])
            ->add('imageFile', FileType::class)
            // ->add('excerpt')
            ->add('author', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'firstname',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('isPublished', CheckboxType::class,[
                'required' => false
            ])
            ->add('isUrgent', CheckboxType::class,[
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
