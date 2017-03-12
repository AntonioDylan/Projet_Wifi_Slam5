<?php
namespace Utility\Secure
{
    // ssh protocols
    // note: once openShell method is used, cmdExec does not work
    // Source: http://php.net/manual/fr/function.ssh2-connect.php
    class ssh2 {

        private $host = 'host';
        private $user = 'user';
        private $port = '22';
        private $password = 'password';
        private $con = null;
        private $shell_type = 'xterm';
        private $shell = null;
        private $log = '';

        public function __construct($host='', $port=''  ) {

            if( $host!='' ) $this->host  = $host;
            if( $port!='' ) $this->port  = $port;

            $this->con  = ssh2_connect($this->host, $this->port);
            if( !$this->con ) {
                $this->log .= "Connection failed !"; 
            }

        }

        public function authPassword( $user = '', $password = '' ) {

            if( $user!='' ) $this->user  = $user;
            if( $password!='' ) $this->password  = $password;

            if( !ssh2_auth_password( $this->con, $this->user, $this->password ) ) {
                $this->log .= "Authorization failed !"; 
            }

        }

        public function openShell( $shell_type = '' ) {

            if ( $shell_type != '' ) $this->shell_type = $shell_type;
            $this->shell = ssh2_shell( $this->con,  $this->shell_type );
            if( !$this->shell ) $this->log .= " Shell connection failed !";

        }

        public function writeShell( $command = '' ) {

            fwrite($this->shell, $command."\n");

        }

        public function cmdExec( ) {

            $argc = func_num_args();
            $argv = func_get_args();

            $cmd = '';
            for( $i=0; $i<$argc ; $i++) {
                if( $i != ($argc-1) ) {
                    $cmd .= $argv[$i]." && ";
                }else{
                    $cmd .= $argv[$i];
                }
            }
            echo $cmd;

            $stream = ssh2_exec( $this->con, $cmd );
            stream_set_blocking( $stream, true );
            return fread( $stream, 4096 );

        }

        public function getLog() {

            return $this->log; 

        }
    }




    /**
    * Classe encapsulant les commandes nécessaires 
    * à communiquer à la borne cisco
    */
    class CiscoCmdManager
    {
        private $shell;

        public function __construct($shellp){
            $this->shell = $shellp;
        }
        
        public function ajouter($mac){
            $this->shell->writeShell('nvram set wlan0_ssid0_acl_list=ab:cd:ef:01:23:45,unknown,1\;');
        }

        public function valider(){
            $this->shell->writeShell('nvram commit');
        }

        public function redemarrer(){
            $this->shell->writeShell('reboot');
        }

        /* A Finir */

    }
}


?>