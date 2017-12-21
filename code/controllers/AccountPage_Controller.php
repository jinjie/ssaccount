<?php

/**
 * AccountPage_Controller
 *
 * @package ssaccount
 * @subpackage Subpackage
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

class AccountPage_Controller extends Page_Controller
{
    private static $allowed_actions = array(
        'profile',
        'ProfileForm',
    );

    public function init()
    {
        parent::init();

        if (! Member::currentUser())
        {
            Security::permissionFailure();
        }
    }

    public function profile()
    {
        return $this->customise(array(
            'Title' => 'Edit Profile'
        ))->renderWith(array(
            'ProfilePage',
            'Page',
        ));
    }

    public function ProfileForm()
    {
        $member = Member::currentUser();

        $fields = new FieldList();

        $fields->push(TextField::create('FirstName', 'First Name', $member->FirstName));

        $fields->push(TextField::create('Surname', 'Surname', $member->Surname));

        $actions = new FieldList();
        $actions->push(FormAction::create('doProfileform')->setTitle('Save'));

        $requiredFields = new RequiredFields('FirstName');

        $form = new Form($this, 'ProfileForm', $fields, $actions, $requiredFields);

        return $form;
    }

    public function doProfileForm($data, Form $form)
    {
        $member = Member::currentUser();

        $member->FirstName = $data['FirstName'];
        $member->Surname   = $data['Surname'];

        $member->write();

        $form->sessionMessage('Profile Saved', 'success');

        $this->redirectBack();
    }
}