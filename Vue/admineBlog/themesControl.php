<?php
include "../../classes/themes.php";
include "../../classes/conn.php";

$themes = new themes($conn);



$allThemes = $themes->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Themes Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-4">Themes Management Dashboard</h2>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Add New Theme</h5>
            </div>
            <div class="card-body">
                <form action="addTheme.php" method="POST">
                    <input type="hidden" name="action" value="create">
                    <div class="mb-3">
                        <label for="theme" class="form-label">Theme Name</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Theme</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Existing Themes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Theme</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allThemes as $theme): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($theme['id_theme']); ?></td>
                                    <td><?php echo htmlspecialchars($theme['theme']); ?></td>
                                    <td><?php echo htmlspecialchars($theme['description']); ?></td>
                                    <td>
                                        <a href="editTheme.php?action=edit&id=<?php echo $theme['id_theme']; ?>"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <a href="themeDeleteMethode.php?id=<?php echo $theme['id_theme']; ?>"
                                            class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>


                                <div class="modal fade" id="editModal<?php echo $theme['id']; ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Theme</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="id" value="<?php echo $theme['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="editTheme<?php echo $theme['id']; ?>"
                                                            class="form-label">Theme Name</label>
                                                        <input type="text" class="form-control"
                                                            id="editTheme<?php echo $theme['id']; ?>" name="theme"
                                                            value="<?php echo htmlspecialchars($theme['theme']); ?>"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editDescription<?php echo $theme['id']; ?>"
                                                            class="form-label">Description</label>
                                                        <textarea class="form-control"
                                                            id="editDescription<?php echo $theme['id']; ?>"
                                                            name="description" rows="3"
                                                            required><?php echo htmlspecialchars($theme['description']); ?></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>