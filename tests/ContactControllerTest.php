<?php
/**
 * Created by PhpStorm.
 * User: frosty84
 * Date: 12.07.2016
 * Time: 18:28
 */

namespace webdev\tests;


use db\Contact;
use webdev\src\ContactController;

class ContactTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test positive case of contact
     */
    public function testContactSuccessful()
    {
        list($name, $surname, $email) = ['testName', 'testSurname', 'testEmail'];

        $contactMock = $this->getMockBuilder(Contact::class)
            ->disableOriginalConstructor()
            ->setMethods(['setName', 'setEmail', 'setSurname', 'setCreatedAt', 'save'])
            ->getMock();


        $contactMock->expects($this->once())->method('setName')->with($name);
        $contactMock->expects($this->once())->method('setEmail')->with($email);
        $contactMock->expects($this->once())->method('setSurname')->with('testSurname');
        $contactMock->expects($this->once())->method('save')->willReturn(true);

        $controllerMock = $this->getMockBuilder(ContactController::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepareArguments', 'buildUserObject'])
            ->getMock();

        $controllerMock->expects($this->once())->method('prepareArguments')
            ->willReturn([$name, $surname, $email]);

        $controllerMock->expects($this->once())->method('buildContactObject')->willReturn($contactMock);

        $this->assertTrue($controllerMock->contact());
    }

    /**
     * Test negative case of contact
     */
    public function testContactFail()
    {
        list($name, $surname, $email) = ['testName', 'testSurname', 'testEmail'];

        $contactMock = $this->getMockBuilder(Contact::class)
            ->disableOriginalConstructor()
            ->setMethods(['setName', 'setEmail', 'setSurname', 'setCreatedAt', 'save'])
            ->getMock();


        $contactMock->expects($this->once())->method('setName')->with($name);
        $contactMock->expects($this->once())->method('setEmail')->with($email);
        $contactMock->expects($this->once())->method('setSurname')->with('testSurname');
        $contactMock->expects($this->once())->method('save')->willReturn(false);

        $controllerMock = $this->getMockBuilder(ContactController::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepareArguments', 'buildContactObject'])
            ->getMock();

        $controllerMock->expects($this->once())->method('prepareArguments')
            ->willReturn([$name, $surname, $email]);

        $controllerMock->expects($this->once())->method('buildContactObject')->willReturn($contactMock);

        $this->assertFalse($controllerMock->contact());
    }
}
