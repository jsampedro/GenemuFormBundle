<?php

namespace Genemu\Bundle\FormBundle\Form\JQuery\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * DateType
 *
 */
class DateTimeType extends AbstractType {

    private $options;

    /**
     * Constructs
     *
     * @param array $options
     */
    public function __construct(array $options) {
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options) {
        $options = $this->getDefaultOptions($options);

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
                ->set('culture', $form->getAttribute('culture'));
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options) {
        $defaultOptions = array(
            'culture' => \Locale::getDefault(),
            'input' => 'datetime',
            'date_widget' => 'single_text',
            'time_widget' => 'single_text',
            'configs' => array_merge(array(
                'dateFormat' => 'dd-mm-yy',
                    ), $this->options),
        );

        $options = array_replace_recursive($defaultOptions, $options);

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(array $options) {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'genemu_jquerydatetime';
    }


}
