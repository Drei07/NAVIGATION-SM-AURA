<?php
session_start(); // Add session handling

include_once __DIR__ . '/../../../database/dbconfig.php';

class ScanQRCode
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    //scan qrcode
    public function scanQRCode($qrcode)
    {

        $stmt = $this->runQuery('SELECT * FROM floor WHERE qrcode = :qrcode');
        $stmt->execute(array(":qrcode" => $qrcode));
        $qrcodeExist = $stmt->fetch();

        if ($qrcodeExist) {
            $_SESSION['status_title'] = 'QR Code is valid!';
            $_SESSION['status'] = 'You can now view the map';
            $_SESSION['status_code'] = 'success';
            $_SESSION['status_timer'] = 40000;
            header("Location: ../../../maps?maps_id=$qrcode");

        } else {
            $_SESSION['status_title'] = 'Oops!';
            $_SESSION['status'] = "No qrcode found";
            $_SESSION['status_code'] = 'error';
            $_SESSION['status_timer'] = 40000;
            header('Location: ../../../');
        }
    }


    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
}

//scan
if (isset($_POST['scan'])) {

    $qrcode = trim($_POST['scan']);

    $scan_qrcode = new ScanQRCode();
    $scan_qrcode->scanQRCode($qrcode);
}
