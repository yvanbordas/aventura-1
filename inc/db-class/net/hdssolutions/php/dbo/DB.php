<?php
    namespace net\hdssolutions\php\dbo;

    use PDO;
    use PDOException;

    /**
     * Database
     *
     * @author Hermann D. Schimpf <hschimpf@hds-solutions.net>
     */
    final class DB {
        /**
         * Conexiones abiertas
         * @var array
         */
        private static $connections = Array();

        /**
         * Datos de conexion por defecto
         */
        private static $USER = null;
        private static $PASS = null;
        private static $HOST = 'localhost';
        private static $PORT = '3306';
        private static $DDBB = null;

        /**
         * Almacena los datos de conexion a la DDBB
         * @param String $HOST Host
         * @param String $PORT Puerto
         * @param String $USER Usuario
         * @param String $PASS Contraseña
         * @param String $DDBB Base de Datos
         */
        public static function setParams($HOST, $PORT, $USER, $PASS, $DDBB) {
        	// los datos
        	self::$HOST = $HOST !== null ? $HOST : self::$HOST;
        	self::$PORT = $PORT !== null ? $PORT : self::$PORT;
        	self::$USER = $USER !== null ? $USER : self::$USER;
        	self::$PASS = $PASS !== null ? $PASS : self::$PASS;
        	self::$DDBB = $DDBB !== null ? $DDBB : self::$DDBB;
        }

        /**
         * Retorna una conexion a la base de datos
         * @param string $trxName Nombre de la transaccion
         * @return DB Conexion a la DB
         */
        public static function getConnection($trxName = null) {
            // si no hay transaccion usamos una clave generica (null como clave no guarda en el array)
            $trxName = $trxName === null ? 'NULL' : $trxName;
            // verificamos si la conexion existe
            if (!array_key_exists($trxName, self::$connections)) {
                // creamos la conexion
                self::$connections[$trxName] = self::newConnection();
                // verificamos si se especifico transaccion
                if ($trxName !== 'NULL')
                    // iniciamos la transaccion en la conexion
                    self::$connections[$trxName]->beginTransaction();
            }
            // retornamos la conexion
            return self::$connections[$trxName];
        }

        /**
         * Finaliza la transaccion
         * @param type $trxName Nombre de la transaccion
         * @return boolean
         */
        public static function commitTransaction($trxName) {
            // si no hay transaccion usamos una clave generica (null como clave no guarda en el array)
            $trxName = $trxName === null ? 'NULL' : $trxName;
            // verificmaos si existe la transaccion
            if (!array_key_exists($trxName, self::$connections))
                // retornamos false
                return false;
            // confirmamos la transaccion
            $result = self::$connections[$trxName]->commit();
            // iniciamos una nueva transaccion
            self::$connections[$trxName]->beginTransaction();
            // retornamos el resultado
            return $result;
        }

        /**
         * Cancela una transaccion en curso
         * @param type $trxName Nombre de la transaccion
         * @return boolean
         */
        public static function rollbackTransaction($trxName) {
            // si no hay transaccion usamos una clave generica (null como clave no guarda en el array)
            $trxName = $trxName === null ? 'NULL' : $trxName;
            // verificmaos si existe la transaccion
            if (!array_key_exists($trxName, self::$connections))
                // retornamos false
                return false;
            // confirmamos la transaccion
            $result = self::$connections[$trxName]->rollBack();
            // eliminamos la transaccion
            self::$connections[$trxName] = null;
            // eliminamos la clave
            unset(self::$connections[$trxName]);
            // retornamos el resultado
            return $result;
        }

        /**
         * Genera una nueva conexion
         */
        private static function newConnection() {
            // ruta de conexion a la base de datos
            $dsn = 'mysql:dbname=' . self::$DDBB . ';port=' . self::$PORT . ';host=' . self::$HOST;
            try {
                // creamos la conexion
                $dbc = new PDO($dsn, self::$USER, self::$PASS);
                // seteamos los errores a excepcion
                $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // seteamos los caracteres a UTF8
                $dbc->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
                // retornamos la conexion
                return $dbc;
            } catch (PDOException $e) {
                throw $e;
            }
        }
    }