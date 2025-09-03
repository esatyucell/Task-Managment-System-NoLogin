<?php


namespace App\Core;

// PDO ve PDOException sınıflarını kullanmak için import ediyoruz
use PDO;
use PDOException;

// Database adında bir sınıf tanımlıyoruz
class Database {

    // Sınıfın tek bir örneğini tutacak static değişken (Singleton Pattern için)
    private static $instance= null;
    // PDO bağlantısını tutacak değişken
    private $connection;

    // Yapıcı (constructor) fonksiyon, dışarıdan çağrılamaz (private)
    private function __construct() {
        // Veritabanı ayarlarını içeren dosyayı dahil ediyoruz
        $config = require __DIR__ . '/../../config.php';
        // Ayarları $db değişkenine atıyoruz
        $db=$config['db'];

        // PDO için DSN (Data Source Name) oluşturuyoruz
        $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}";
        try {
            // PDO ile veritabanına bağlanıyoruz
            $this->connection = new PDO($dsn, $db['user'], $db['password']);
            // Hata ayıklama modunu aktif ediyoruz (hata olursa exception fırlatır)
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            // Bağlantı hatası olursa ekrana hata mesajı basılır ve program durur
            die("Veri Tabanı Bağlantı Hatası: " . $e->getMessage());
        }
    }

    // Sınıfın tek örneğini döndüren static fonksiyon (Singleton Pattern)
    public static function getInstance() {
        // Eğer daha önce bir örnek oluşturulmadıysa oluştur
        if (!self::$instance) {
            self::$instance = new self();
        }
        // Var olan örneği döndür
        return self::$instance;
    }

    // PDO bağlantısını döndüren fonksiyon
    public function getConnection() {
        return $this->connection;
    }
}