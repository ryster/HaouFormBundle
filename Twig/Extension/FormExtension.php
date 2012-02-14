<?php
namespace Haou\FormBundle\Twig\Extension;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormError;

/**
 * FormExtension.
 *
 * @author ryster <mynameisryster@gmail.com>
 */
class FormExtension extends \Twig_Extension
{
    /**
     * Twig extends function.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'is_freeze'      => new \Twig_Function_Method($this, 'isFreeze'),
            '_get_form_type' => new \Twig_Function_Method($this, 'getFormType'),
            '_get_password'  => new \Twig_Function_Method($this, 'getPassword'),
        );
    }

    /**
     * Check whether "freeze" option is valid.
     *
     * @param \Symfony\Component\Form\FormView $view
     * @return bool
     */
    public function isFreeze(FormView $view)
    {
        if ($view->has('freeze') && $view->get('freeze')) {
            return true;
        }

        $view = $this->getMaximumParent($view);
        if ($view->has('freeze') && $view->get('freeze')) {
            return true;
        }

        return false;
    }

    /**
     * get form type.
     *
     * @param Symfony\Component\Form\FormView $view
     * @return null|string
     */
    public function getFormType(FormView $view)
    {
        $types = $view->get('types');

        if (is_array($types)) {
            if (in_array('password', $types)) {
                return 'password';
            }

            if (in_array('text', $types)) {
                return 'text';
            }

            if (in_array('radio', $types)) {
                return 'radio';
            }

            if (in_array('checkbox', $types)) {
                return 'checkbox';
            }

            if (in_array('choice', $types)) {
                if ($view->get('expanded') == true && $view->get('multiple') == true) {
                    return 'checkbox';
                } elseif ($view->get('expanded') == true && $view->get('multiple') == false) {
                    return 'radio';
                } else {
                    return 'select';
                }
            }
        }

        return null;
    }

    /**
     * Get password.
     * TODO: 無理矢理パスワードを取得してる為、もうちょい考えてみる
     */
    public function getPassword(FormView $view)
    {
        $method = 'get'.ucfirst($view->get('name'));
        return $view->getParent()->get('value')->$method();
    }

    /**
     * Get maximum parent.
     *
     * @param \Symfony\Component\Form\FormView $view
     * @return \Symfony\Component\Form\FormView
     */
    public function getMaximumParent(FormView $view)
    {
        while (false !== $view->hasParent()) {
            $view = $view->getParent();
        }
        return $view;
    }

    /*
     * Get twig extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'haou_twig_extension_form';
    }
}
