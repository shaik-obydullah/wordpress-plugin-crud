<?php
global $wpdb;
$table_name = $wpdb->prefix . 'books';

// Handle Add/Edit/Delete
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $wpdb->insert($table_name, [
        'title' => sanitize_text_field($_POST['title']),
        'author' => sanitize_text_field($_POST['author']),
        'year' => intval($_POST['year']),
    ]);
    echo "<div class='updated'><p>Book added!</p></div>";
}

if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $wpdb->update($table_name, [
        'title' => sanitize_text_field($_POST['title']),
        'author' => sanitize_text_field($_POST['author']),
        'year' => intval($_POST['year']),
    ], ['id' => intval($_POST['id'])]);
    echo "<div class='updated'><p>Book updated!</p></div>";
}

if (isset($_GET['delete'])) {
    $wpdb->delete($table_name, ['id' => intval($_GET['delete'])]);
    echo "<div class='updated'><p>Book deleted!</p></div>";
}

// Get all books
$books = $wpdb->get_results("SELECT * FROM $table_name");
?>

<div class="wrap">
    <h1>📚 Book List</h1><br/>

    <form method="post" style="margin-bottom: 20px;">
        <input type="hidden" name="action" value="add">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="year" placeholder="Year" required>
        <button type="submit" class="button button-primary">Add Book</button>
    </form>

    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= esc_html($book->id) ?></td>
                <td><?= esc_html($book->title) ?></td>
                <td><?= esc_html($book->author) ?></td>
                <td><?= esc_html($book->year) ?></td>
                <td>
                    <a href="?page=wp-simple-crud&delete=<?= $book->id ?>" class="button button-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>