<?php
class Part {
    private $conn; // Properti untuk menyimpan koneksi database
    private $table_name = "inventory"; // Nama tabel di database

    public $id; // Properti untuk menyimpan ID part
    public $part_name; // Properti untuk menyimpan nama part
    public $stock; // Properti untuk menyimpan stok part
    public $description; // Properti untuk menyimpan deskripsi part

    // Konstruktor untuk menginisialisasi koneksi database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Metode untuk menyimpan part (baik menambah baru atau memperbarui yang sudah ada)
    public function save() {
        if ($this->id) {
            // Jika ID ada, maka update part yang sudah ada
            $query = "UPDATE " . $this->table_name . " SET part_name = ?, stock = ?, description = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sisi", $this->part_name, $this->stock, $this->description, $this->id);
        } else {
            // Jika ID tidak ada, maka tambahkan part baru
            $query = "INSERT INTO " . $this->table_name . " (part_name, stock, description) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sis", $this->part_name, $this->stock, $this->description);
        }

        // Eksekusi query dan kembalikan hasilnya
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
