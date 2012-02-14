<?php

namespace Haou\FormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

/**
 * FreezeTypeExtension.
 *
 * @author ryster <mynameisryster@gmail.com>
 */
class FreezeTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->setAttribute('freeze', $options['freeze']);
    }

    public function buildView(FormView $view, FormInterface $form)
    {
        $view->set('freeze', $form->getAttribute('freeze'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'freeze' => false,
        );
    }

    public function getExtendedType()
    {
        return 'field';
    }
}