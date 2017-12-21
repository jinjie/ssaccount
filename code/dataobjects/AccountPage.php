<?php

/**
 * AccountPage
 *
 * @package ssaccount
 * @subpackage Subpackage
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

class AccountPage extends Page
{
    private static $db = array(
    );

    private static $has_one = array();

    private static $has_many = array();

    public function AccountLinks()
    {
        $links = new ArrayList();

        $links->push(new ArrayData(array(
            'Title' => 'Edit Profile',
            'Link'  => $this->Link() . 'profile',
            'Sort'  => '10'
        )));

        $links->push(new ArrayData(array(
            'Title' => 'Log Out',
            'Link'  => 'Security/logout',
            'Sort'  => '20',
        )));

        $this->extend('updateAccountLinks', $links);

        return $links->sort('Sort');
    }
}