<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SR_Validator {
    public static function validate_fields( $data ) {
        foreach ( $data as $field => $value ) {
            if ( empty( $value ) ) {
                return false;
            }
        }
        return true;
    }

    public static function validate_date( $date ) {
        return preg_match( '/^\d{4}-\d{2}-\d{2}$/', $date );
    }

    public static function validate_time( $time ) {
        return preg_match( '/^\d{2}:\d{2}$/', $time );
    }
}
