<?php

namespace Haou\FormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

/**
 * ExplainTypeExtension.
 *
 * @author ryster <mynameisryster@gmail.com>
 */
class ExplainTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->setAttribute('explain', $options['explain']);
    }

    public function buildView(FormView $view, FormInterface $form)
    {
        $view->set('explain', $form->getAttribute('explain'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'explain' => null,
        );
    }

    public function getExtendedType()
    {
        return 'field';
    }
}