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

    // Mendapatkan daftar kursus dari database
    function getCourses()
    {
    global $db;
    $query = $db->query('SELECT * FROM courses');
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambahkan kursus baru ke dalam database
    function addCourse($title, $description, $duration)
    {
    global $db;
    $query = $db->prepare('INSERT INTO courses (title, description, duration) VALUES (?, ?, ?)');
    $query->execute([$title, $description, $duration]);
    }

    // Mengupdate kursus berdasarkan ID
    function editCourse($id, $title, $description, $duration)
    {
        global $db;
        $query = $db->prepare('UPDATE courses SET title = ?, description = ?, duration = ? WHERE id = ?');
        $query->execute([$title, $description, $duration, $id]);
    }

    // Hapus kursus berdasarkan ID dari database
    function deleteCourse($id)
    {
    global $db;
    $query = $db->prepare('DELETE FROM courses WHERE id = ?');
    $query->execute([$id]);
    }

    // Mendapatkan daftar materi berdasarkan ID kursus dari database
    function getMaterials($courseId)
    {
    global $db;
    $query = $db->prepare('SELECT * FROM materials WHERE course_id = ?');
    $query->execute([$courseId]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambahkan materi baru ke dalam database
    function addMaterial($courseId, $title2, $description2, $embedLink)
    {
    global $db;
    $query = $db->prepare('INSERT INTO materials (course_id, title2, description2, embed_link) VALUES (?, ?, ?, ?)');
    $query->execute([$courseId, $title2, $description2, $embedLink]);
    }

    // Menghapus materi berdasarkan ID dari database
    function deleteMaterial($materialId)
    {
    global $db;
    $query = $db->prepare('DELETE FROM materials WHERE id = ?');
    $query->execute([$materialId]);
    }

    // Proses form penambahan kursus
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'add') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        addCourse($title, $description, $duration);
    } elseif ($_POST['action'] === 'edit') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        editCourse($id, $title, $description, $duration);
    }elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        deleteCourse($id);
    } elseif ($_POST['action'] === 'addMaterial') {
        $courseId = $_POST['courseId'];
        $title2 = $_POST['title2'];
        $description2 = $_POST['description2'];
        $embedLink = $_POST['embedLink'];
        addMaterial($courseId, $title2, $description2, $embedLink);
    } elseif ($_POST['action'] === 'deleteMaterial') {
        $materialId = $_POST['materialId'];
        deleteMaterial($materialId);
    }

    header('Location: index.php');
    exit();
}

$courses = getCourses();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body style="margin-top: 2%;">
    <div class="container">

        <div class="col-md-7 col-lg-8">
            <h1 class="text-center">Manajemen Kursus</h1>
            <br>

            <!-- Formulir untuk menambahkan kursus baru -->
            <div class="container">
                <h2 class="mb-3">Tambahakan Kursus Baru</h2>
                <form method="POST" action="index.php">
                <input type="hidden" name="action" value="add">
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" id="" name="title" required placeholder="Masukkan Judul Anda">
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label" >Deskripsi</label>
                            <textarea style="width: 100%;" name="description" placeholder="Berikan Deskripsi Singkat" required></textarea>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label">Durasi</label>
                            <input type="text" class="form-control" id=""  name="duration" placeholder="Masukkan Durasi Anda">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tambahkan Kursus</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Daftar kursus -->
    <div class="container">

        <h4>List Kursus</h4>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Durasi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo $course['title']; ?></td>
                        <td><?php echo $course['description']; ?></td>
                    <td><?php echo $course['duration']; ?></td>
                    <td>
                        <button class="btn btn-info">
                            <a style="color: black;" href="edit.php?id=<?php echo $course['id']; ?>">Edit</a>
                        </button>

                        <button class="btn btn-danger" value="delete" onclick="confirmDelete(<?php echo $course['id']; ?>)">Delete</button>

                        <!-- <button class="btn btn-danger">
                            <a style="color: whitesmoke;" href="?action=delete&id=<?php echo $course['id']; ?>" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </button> -->
                        
                        <button class="btn btn-info">
                            <a style="color: black;" href="?materials=<?php echo $course['id']; ?>">View Materials</a>
                        </button>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
    <!-- Materi -->
    <?php if (isset($_GET['materials'])): ?>
        <?php include 'materi.php'; ?>
    <?php endif; ?>

    <script>
    function confirmDelete(courseId) {
        if (confirm('Are you sure you want to delete this course?')) {
        window.location.href = '?action=delete&id=' + courseId;
        }
    }
    </script>

</body>
</html>
