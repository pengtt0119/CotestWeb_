<?php 
use Zend\Form\Factory;

$factory = new Factory();
$form    = $factory->createForm(array(
    'hydrator'  => 'Zend\Stdlib\Hydrator\ArraySerializable',
    'fieldsets' => array(
        array(
            'spec' => array(
                'name' => 'sender',
                'elements' => array(
                    array(
                        'spec' => array(
                            'name' => 'name',
                            'options' => array(
                                'label' => 'Your name',
                            ),
                            'type' => 'Text'
                        ),
                    ),
                    array(
                        'spec' => array(
                            'type' => 'Zend\Form\Element\Email',
                            'name' => 'email',
                            'options' => array(
                                'label' => 'Your email address',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        array(
            'spec' => array(
                'name' => 'details',
                'elements' => array(
                    array(
                        'spec' => array(
                            'name' => 'subject',
                            'options' => array(
                                'label' => 'Subject',
                            ),
                            'type' => 'Text',
                        ),
                    ),
                    array(
                        'spec' => array(
                            'name' => 'message',
                            'type' => 'Zend\Form\Element\Textarea',
                            'options' => array(
                                'label' => 'Message',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'elements' => array(
        array(
            'spec' => array(
                'type' => 'Zend\Form\Element\Captcha',
                'name' => 'captcha',
                'options' => array(
                    'label' => 'Please verify you are human. ',
                    'captcha' => array(
                        'class' => 'Dumb',
                    ),
                ),
            ),
        ),
        array(
            'spec' => array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'security',
        ),
    ),
    array(
        'spec' => array(
            'name' => 'send',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
            ),
        ),
     ),
    ),
    // Configuration to pass on to
    // Zend\InputFilter\Factory::createInputFilter()
    'input_filter' => array(
    /* ... */
    ),
));