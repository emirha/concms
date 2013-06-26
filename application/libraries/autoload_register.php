<?php
/**
 * Created by JetBrains PhpStorm.
 * User: emirhadzic
 * Date: 6/26/13
 * Time: 11:03 PM
 * To change this template use File | Settings | File Templates.
 */

spl_autoload_register( 'Autoload_Register::register' );

class Autoload_Register {

    const CI_PREFIX     = "CI_";

    public static function register( $insClass ) {
        $sPrefix = substr( $insClass, 0, 3 );

        $sSuffix = strrchr( strtolower( $insClass ), '_' );

        switch( $sSuffix ) {
            case '_model':
                require_once BASEPATH . 'core/Model' . EXT;
                $sDir = 'models';
                break;
            default:
                $sDir = 'libraries';
                break;
        }

        $sFile = APPPATH . $sDir . DIRECTORY_SEPARATOR . strtolower( $insClass ) . EXT;

        if ( file_exists( $sFile ) ) {
            require_once $sFile;
        }
    }

}