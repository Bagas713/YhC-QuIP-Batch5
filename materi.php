<?php
if (isset($_GET['materials'])) {
    $courseId = $_GET['materials'];
    $materials = getMaterials($courseId);
}
?>
<br>
<br>
<div class="container">
        <div class="col-md-7 col-lg-8">

            <!-- Formulir untuk menambahkan kursus baru -->
            <div class="container">
                <h2 class="mb-3">Tambahakan Materi Baru</h2>
                <form method="POST" action="index.php">
                <input type="hidden" name="action" value="addMaterial">
                <input type="hidden" name="courseId" value="<?php echo $courseId; ?>"
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" id="" name="title2" required placeholder="Masukkan Judul Anda">
                        </div>
                        <br>
                        <div class="col-12">
                            <label class="form-label" >Deskripsi</label>
                            <textarea style="width: 100%;" name="description2" placeholder="Berikan Deskripsi Singkat" required></textarea>
                        </div>
                        <br>
                        <div class="col-12">
                            <label class="form-label">Link:</label>
                            <input type="url" name="embedLink" required class="form-control" id="" placeholder="Masukkan Link Referensi">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambahkan Materi</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
    <!-- Daftar Materi -->
        <h4>List Materi</h4>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($materials as $material): ?>
                    <tr>
                        <td><?php echo $material['title2']; ?></td>
                        <td><?php echo $material['description2']; ?></td>
                        <td><a href="<?php echo $material['embed_link']; ?>" target="_blank"><?php echo $material['embed_link']; ?></a></td>
                    <td>
                        <form method="POST" action="index.php">
                            <input type="hidden" name="action" value="deleteMaterial">
                            <input type="hidden" name="materialId" value="<?php echo $material['id']; ?>">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
