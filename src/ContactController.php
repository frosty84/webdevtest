<?php

namespace webdev\src;

use db\Contact;


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
        list($name, $surname, $email) = $this->prepareArguments();

        $contact = $this->buildContactObject();;
        $contact->setName($name);
        $contact->setSurname($surname);
        $contact->setEmail($email);
        $contact->setCreatedAt(date("Y-m-d H:i:s"));
        $ret = $contact->save();

        return $ret;
    }

    /**
     * PhpUnit friendly wrapper to gather list of arguments
     * @return array
     */
    protected function prepareArguments()
    {
        $name = $this->getArgument('name');
        $surname = $this->getArgument('surname');
        $email = $this->getArgument('email');

        return array($name, $surname, $email);
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

