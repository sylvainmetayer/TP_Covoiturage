<?php
class Mypdo extends PDO {
	protected $dbo;
	public function __construct() {
		// le paramétrage de cette classe se fait dans le fichier config.inc.php
		if (ENV == 'dev') {
			$bool = true;
		} else {
			$bool = false;
		}
		try {
			$this->dbo = parent::__construct ( "mysql:host=" . DBHOST . "; dbname=" . DBNAME, DBUSER, DBPASSWD, array (
					PDO::ATTR_PERSISTENT => true,
					PDO::ATTR_ERRMODE => $bool,
					PDO::ERRMODE_EXCEPTION => $bool 
			) );
		} catch ( PDOException $e ) {
			echo 'échec de la connexion : ' . $e->getMessage ();
		}
	}
}

?>

