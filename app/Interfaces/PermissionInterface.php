<?php

namespace App\Interfaces;

interface PermissionInterface
{
    public const CAN_VIEW_LIBRARIES = 'view-libraries';
    public const CAN_VIEW_PARTICULAR_LIBRARY = 'view-particular-library';
    public const CAN_CREATE_LIBRARIES = 'create-libraries';
    public const CAN_UPDATE_LIBRARIES = 'update-libraries';
    public const CAN_DELETE_LIBRARIES = 'delete-libraries';

    public const CAN_VIEW_RECORDS = 'view-records';
    public const CAN_VIEW_PARTICULAR_RECORD = 'view-particular-record';
    public const CAN_CREATE_RECORDS = 'create-records';
    public const CAN_UPDATE_RECORDS = 'update-records';
    public const CAN_DELETE_RECORDS = 'delete-records';

    public const CAN_CREATE_USERS = 'create-users';
    public const CAN_UPDATE_USERS = 'update-users';
    public const CAN_DELETE_USERS = 'delete-users';
}