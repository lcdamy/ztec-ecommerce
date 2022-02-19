<?php

namespace App\Helpers;

trait ErrorMessage
{
    public function getErrorMessage($statusCodeAlias, $context) {
        return $this->provideErrorMessage($statusCodeAlias, $context);
    }

    private function provideErrorMessage($statusCodeAlias, $context) {
        switch ($statusCodeAlias) {
            case 'creation_failure': 
                return 'We were not able to create your ' . $context . '. It might be a network failure. Please try again.';
            case 'data_deleted':
                return 'We were not able to find the ' . $context . '. It might have been deleted.';
            default:
                return 'Creation failure';
        }
    }
}