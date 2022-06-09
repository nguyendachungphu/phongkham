<?php
namespace db;
use helper\Helper;
use PDOException;
use PDO;
class Db
{
    public $connect = null;
    private $host = '';
    private $db_name = '';
    private $user = '';
    private $pw = '';
    protected $sql = '';
    private $table_name = '';

    public function __construct($config)
    {
        $this->host = $config['HOST'];
        $this->db_name = $config['DB_NAME'];
        $this->user = $config['USERNAME'];
        $this->pw = $config['PASSWORD'];
        $this->connect();
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    private function connect()
    {
        try {
            $this->connect = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->user, $this->pw);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Connect db failed: " . $e->getMessage();
            die();
        }

    }

    public function table($table_name = '')
    {
        $this->table_name = $table_name;
        return $this;
    }

    private function disconnect()
    {
        $this->connect = null;
    }

    public function insert(array $insert)
    {
        try {
            $this->sql = "";
            $column_array = array_keys($insert);
            $value = array_values($insert);

            $column_str = implode(',', $column_array);
            $bind_param = implode(',', array_fill(0, count($value), '?'));
            $this->sql = "INSERT INTO {$this->table_name} ({$column_str}) VALUES ({$bind_param})";
            $stmt = $this->connect->prepare($this->sql);
            return $stmt->execute($value);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function raw($sql)
    {
        $this->sql = '';
        $this->sql = $sql;
        return $this;
    }

    protected function getAll()
    {
        $data = array();
        if ($this->sql == '') {
            return array();
        }
        $stmt = $this->connect->prepare($this->sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }
        return $data;

    }

    protected function getOne()
    {
        if ($this->sql == '') {
            return array();
        }

        $stmt = $this->connect->prepare($this->sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Get danh sach bac si
     * @return array
     */
    public function getListDocter()
    {
        $sql = "SELECT * FROM BACSY";
        return $this->raw($sql)->getAll();
    }

    /**
     * Get danh sacs khoa
     *
     * @return array
     */
    public function getListDepartment()
    {
        $sql = "SELECT * FROM CHUYENKHOA WHERE TRANGTHAI = " . STATUS_AVAILABLE;
        return $this->raw($sql)->getAll();
    }

    public function checkIfUserExist($ten_dang_nhap)
    {
        if ($ten_dang_nhap == '') {
            return false;
        }
        $sql = "SELECT USER_TAIKHOAN FROM USER WHERE USER_TAIKHOAN = '{$ten_dang_nhap}'";
        $user = $this->raw($sql)->getOne();
        if (empty($user) === true) {
            return false;
        }
        return true;
    }
}