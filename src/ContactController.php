<?php

namespace webdev\src;

use db\Contact;
use db\Formsubmit;
use db\Formsubmitdata;


/**
 * Signup Controller
 * @package CodeTest\Src\Controller
 */
class ContactController extends Controller
{
    /**
     * General Signup action
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function contact()
    {
        $arguments  = $this->prepareArguments(getFields());
        $formSubmitObj = $this->getNewFormSubmit();
        if($formSubmitObj instanceof Formsubmit) {

            foreach ($arguments as $name => $value) {
                $data = new Formsubmitdata();

                $data->setFormsubmit($formSubmitObj);
                $data->setName($name);
                $data->setValue($value);

                $formSubmitObj->addFormsubmitdata($data);
            }

            $entityManager = getEntityManager();
            $entityManager->persist($formSubmitObj);
            $entityManager->flush();
        }
        return $formSubmitObj->getId();
    }

    protected function getNewFormSubmit(){
        $data = new Formsubmit();

        $data->setDate(new \DateTime());

        return $data;
    }

    /**
     * PhpUnit friendly wrapper to gather list of arguments
     * @return array
     */
    protected function prepareArguments($fields = [])
    {
        $arguments = [];

        foreach ($fields as $field) {
            $name = $field->getName();
            $arguments[$name] = $this->getArgument($name);
        }

        return $arguments;
    }

    /**
     * A wrapper for PhpUnit
     * @return User
     */
    protected function buildContactObject()
    {
        return new Contact();
    }
}

