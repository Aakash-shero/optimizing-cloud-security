<?php 
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_NAME", 'be');
define("DB_HOST", 'localhost');
define("TABLES", '*');

$backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$backupDatabase->backupTables(TABLES);

class Backup_Database
{
    var $host = 'localhost';
	var $username = 'root';
    var $passwd = '';
    var $dbName = 'be';
    var $charset = '';

    //set variables to connect to database
	function Backup_Database($host, $username, $passwd, $dbName, $charset = 'utf8')
    {
        $this->host     = $host;
        $this->username = $username;
        $this->passwd   = $passwd;
        $this->dbName   = $dbName;
        $this->charset  = $charset;

        $this->initializeDatabase();
    }
	//connect to database
    protected function initializeDatabase()
    {
        $conn = mysql_connect($this->host, $this->username, $this->passwd);
        mysql_select_db($this->dbName, $conn);
        if (! mysql_set_charset ($this->charset, $conn))
        {
            mysql_query('SET NAMES '.$this->charset);
        }
    }

    public function backupTables($tables = '*')
    {
        try
        {
            if($tables == '*')
            {
                $tables = array();
                $result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))//select all tables from database
                {
                    $tables[] = $row[0];
                }
            }
            else
            {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
            }

            $sql = 'CREATE DATABASE IF NOT EXISTS '.$this->dbName.";\n\n";
            $sql .= 'USE '.$this->dbName.";\n\n";

			//scan through tables
            foreach($tables as $table)
            {
                $result = mysql_query('SELECT * FROM '.$table);
                $numFields = mysql_num_fields($result);

                $sql .= 'DROP TABLE IF EXISTS '.$table.';';
                $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                $sql.= "\n\n".$row2[1].";\n\n";

                //read contents of each tables
				for ($i = 0; $i < $numFields; $i++) 
                {
                    while($row = mysql_fetch_row($result))
                    {
                        $sql .= 'INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$numFields; $j++) 
                        {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = str_replace("\n","\\n",$row[$j]);
                            if (isset($row[$j]))
                            {
                                $sql .= '"'.$row[$j].'"' ;
                            }
                            else
                            {
                                $sql.= '""';
                            }

                            if ($j < ($numFields-1))
                            {
                                $sql .= ',';
                            }
                        }
                        $sql.= ");\n";
                    }
                }
            }
        }
        catch (Exception $e)
        {
            var_dump($e->getMessage());
            return false;
        }

        return $this->saveFile($sql);
    }

    protected function saveFile(&$sql)
    {
        if (!$sql) return false;

        try
        {
            //write contents to file and save it in a folder
			date_default_timezone_set("Asia/Kolkata");
			$filename = "C:\\xampp\htdocs\BEPROJECT\Html\backup/be_".date("Y-m-d_H-i-s", time()).".sql";
			$handle = fopen($filename,'w');
            fwrite($handle, $sql);
            fclose($handle);
        }
        catch (Exception $e)
        {
            var_dump($e->getMessage());
            return false;
        }
        return true;
    }
}
?>