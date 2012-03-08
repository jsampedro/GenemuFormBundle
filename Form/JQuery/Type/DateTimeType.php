<?php

namespace Genemu\Bundle\FormBundle\Form\JQuery\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToLocalizedStringTransformer;

/**
 * DateType
 *
 */
class DateTimeType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options) {
        $options = $this->getDefaultOptions($options);

        $builder->appendClientTransformer(
            new DateTimeToLocalizedStringTransformer()
                );

        $builder
                ->setAttribute('culture', $options['culture'])
                ->setAttribute('configs', $options['configs']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form) {
        $configs = $form->getAttribute('configs');

        $view
                ->set('configs', $configs)
                ->set('culture', $form->getAttribute('culture'))
                ->set('value', $form->getClientData());
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options) {
        $defaultOptions = array(
            'culture' => \Locale::getDefault(),
            'configs' => array_merge(array(
                'dateFormat' => 'dd/mm/yy',
                    ), $options),
        );

        $options = array_replace_recursive($defaultOptions, $options);

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(array $options) {
        return 'field';
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'genemu_jquerydatetime';
    }

}
