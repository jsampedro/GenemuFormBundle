<?php
namespace Genemu\Bundle\FormBundle\Form\JQuery\Type;

use Genemu\Bundle\FormBundle\Form\JQuery\Type\DateType as BaseType;

/**
 * DateTimeType
 *
 */
class DateTimeType extends BaseType
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'genemu_jquerydatetime';
    }

 
}
