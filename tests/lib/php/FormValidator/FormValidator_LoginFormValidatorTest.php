<?php
define('PROJECT_DIR', dirname(__FILE__) . '/../../../..');
require_once PROJECT_DIR . '/config/const.php';
require_once LIB_DIR . '/FormValidator/LoginFormValidator.php';

class FormValidator_LoginFormValidatorTest extends PHPUnit_Framework_TestCase
{
    protected $form_validator;

    public function setUp()
    {
        $this->form_validator = new FormValidator_LoginFormValidator();
    }

    public function test_ユーザー名にはrequiredとuserNameのルールが適用されていること()
    {
        $expected = array(
            array(
                'filter' => 'required',
                'label' => 'ユーザー名',
                'opts' => array()
            ),
            array(
                'filter' => 'userName',
                'label' => 'ユーザー名',
                'opts' => array()
            )
        );

        $this->assertEquals($expected, $this->form_validator->getRule('user_name'));
    }

    public function test_パスワードにはrequiredとpasswordのルールが適用されていること()
    {
        $expected = array(
            array(
                'filter' => 'required',
                'label' => 'パスワード',
                'opts' => array()
            ),
            array(
                'filter' => 'password',
                'label' => 'パスワード',
                'opts' => array()
            )
        );

        $this->assertEquals($expected, $this->form_validator->getRule('password'));
    }

}
