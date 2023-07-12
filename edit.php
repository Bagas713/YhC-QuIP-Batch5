<?php
// Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
$host = 'localhost';
$dbname = 'msib';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Fungsi untuk mendapatkan kursus berdasarkan ID dari database
function getCourse($id) {
    global $db;
    $query = $db->prepare('SELECT * FROM courses WHERE id = ?');
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Mendapatkan ID kursus dari parameter URL
    if (!isset($_GET['id'])) {
    header('Location: index.php');
    }

$id = $_GET['id'];
$course = getCourse($id);

    if (!$course) {
    header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style="margin-top: 5%;">
    <div class="container">
    <div class="col-md-7 col-lg-8">
            <!-- Formulir untuk mengedit kursus  -->
            <div class="container">
                <h4 class="mb-3">Edit Kursus</h4>
                <form method="POST" action="?action=update">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $course['title']; ?>" required>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label" >Deskripsi</label>
                            <textarea style="width: 100%;" name="description" required><?php echo $course['description']; ?></textarea>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label">Durasi</label>
                            <input type="text" class="form-control" id="" name="duration" value="<?php echo $course['duration']; ?>" required>
                        </div>
                        <div style="padding: 0 5px" class="text-center">
                            <button style="width: 50%;" type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <br>
                            <br>
                            <button style="width: 50%;" class="btn btn-primary" <a href="index.php">Back to Course List</a></button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
