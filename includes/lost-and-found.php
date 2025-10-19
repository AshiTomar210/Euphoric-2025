<?php

require_once '../config/database.php';

try {
    $database = new Database();
    $pdo = $database->getConnection();
} catch (PDOException $e) {
    die("Database operation failed: " . $e->getMessage());
}


// Create uploads directory if it doesn't exist
$upload_dir = './uploads/lost_found/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Handle form submission
$message = '';
$message_type = '';

if ($_POST && isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $date_found = $_POST['date_found'];
    $time_found = $_POST['time_found'];
    $contact_info = trim($_POST['contact_info']);
    $status = $_POST['status'];

    // Validate required fields
    if (empty($title) || empty($description) || empty($location) || empty($contact_info)) {
        $message = "Please fill in all required fields.";
        $message_type = "error";
    } else {
        $image_path = null;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/jpg', 'image/png'];
            $max_size = 5 * 1024 * 1024; // 5MB

            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                $message = "Only JPG and PNG images are allowed.";
                $message_type = "error";
            } elseif ($_FILES['image']['size'] > $max_size) {
                $message = "Image size should not exceed 5MB.";
                $message_type = "error";
            } else {
                $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $new_filename = uniqid('item_') . '.' . $file_extension;
                $upload_path = $upload_dir . $new_filename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                    $image_path = $upload_path;
                } else {
                    $message = "Error uploading image.";
                    $message_type = "error";
                }
            }
        }

        if (empty($message)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO lost_and_found (title, description, location, date_found, time_found, image_path, contact_info, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $description, $location, $date_found, $time_found, $image_path, $contact_info, $status]);

                $message = "Item posted successfully!";
                $message_type = "success";

                // Clear form data
                $_POST = array();
            } catch (PDOException $e) {
                $message = "Error saving item: " . $e->getMessage();
                $message_type = "error";
            }
        }
    }
}

// Handle search and filter
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$filter_status = isset($_GET['status']) ? $_GET['status'] : '';
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'created_at DESC';

$where_conditions = [];
$params = [];

if ($search) {
    $where_conditions[] = "(title LIKE ? OR description LIKE ? OR location LIKE ?)";
    $search_term = "%$search%";
    $params[] = $search_term;
    $params[] = $search_term;
    $params[] = $search_term;
}

if ($filter_status) {
    $where_conditions[] = "status = ?";
    $params[] = $filter_status;
}

$where_clause = $where_conditions ? "WHERE " . implode(" AND ", $where_conditions) : "";
$order_clause = "ORDER BY $sort_by";

$stmt = $pdo->prepare("SELECT * FROM lost_and_found $where_clause $order_clause");
$stmt->execute($params);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// // (requires GD extension)
// function resizeImage($source, $destination, $max_width, $max_height) {
//     
//     if (!extension_loaded('gd')) {
//         return false;
//     }
//     $image_info = getimagesize($source);
//     if (!$image_info) return false;

//     $width = $image_info[0];
//     $height = $image_info[1];
//     $type = $image_info[2];

//     // New dimensions
//     $ratio = min($max_width / $width, $max_height / $height);
//     $new_width = intval($width * $ratio);
//     $new_height = intval($height * $ratio);

//     switch ($type) {
//         case IMAGETYPE_JPEG:
//             $source_image = imagecreatefromjpeg($source);
//             break;
//         case IMAGETYPE_PNG:
//             $source_image = imagecreatefrompng($source);
//             break;
//         default:
//             return false;
//     }

//     $new_image = imagecreatetruecolor($new_width, $new_height);

//     if ($type == IMAGETYPE_PNG) {
//         imagealphablending($new_image, false);
//         imagesavealpha($new_image, true);
//         $transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
//         imagefill($new_image, 0, 0, $transparent);
//     }

//     imagecopyresampled($new_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

//     // Save image
//     $result = false;
//     switch ($type) {
//         case IMAGETYPE_JPEG:
//             $result = imagejpeg($new_image, $destination, 85);
//             break;
//         case IMAGETYPE_PNG:
//             $result = imagepng($new_image, $destination, 6);
//             break;
//     }

//     imagedestroy($source_image);
//     imagedestroy($new_image);

//     return $result;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <link rel="stylesheet" href="../assets/css/lost-and-found.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="container">
         <div id="navbar-container"></div>
        <h1>Lost & Found</h1>

        <!-- Add Item Form -->
        <div class="form-section">
            <h2>Report an Item</h2>

            <?php if ($message): ?>
                <div class="message <?php echo $message_type; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Item Title *</label>
                        <input type="text" id="title" name="title" required
                            value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>"
                            placeholder="e.g., Black Wallet">
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="lost" <?php echo (isset($_POST['status']) && $_POST['status'] == 'lost') ? 'selected' : ''; ?>>Lost</option>
                            <option value="found" <?php echo (isset($_POST['status']) && $_POST['status'] == 'found') ? 'selected' : ''; ?>>Found</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="location">Location *</label>
                        <input type="text" id="location" name="location" required
                            value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>"
                            placeholder="e.g., Library Building, 2nd Floor">
                    </div>

                    <div class="form-group">
                        <label for="contact_info">Contact Info *</label>
                        <input type="text" id="contact_info" name="contact_info" required
                            value="<?php echo isset($_POST['contact_info']) ? htmlspecialchars($_POST['contact_info']) : ''; ?>"
                            placeholder="Phone/Email/WhatsApp">
                    </div>

                    <div class="form-group">
                        <label for="date_found">Date</label>
                        <input type="date" id="date_found" name="date_found"
                            value="<?php echo isset($_POST['date_found']) ? $_POST['date_found'] : date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="time_found">Time</label>
                        <input type="time" id="time_found" name="time_found"
                            value="<?php echo isset($_POST['time_found']) ? $_POST['time_found'] : ''; ?>">
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" required
                            placeholder="Provide detailed description of the item..."><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label for="image">Upload Image (JPG/PNG, max 5MB)</label>
                        <input type="file" id="image" name="image" accept="image/jpeg,image/jpg,image/png">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn"> Post Item</button>
            </form>
        </div>

        <!-- Search and Filter -->
        <div class="search-filter-section">
            <form method="GET">
                <div class="search-controls">
                    <div class="form-group">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search"
                            value="<?php echo htmlspecialchars($search); ?>"
                            placeholder="Search by title, description, or location...">
                    </div>

                    <div class="form-group">
                        <label for="filter_status">Filter by Status</label>
                        <select id="filter_status" name="status">
                            <option value="">All Items</option>
                            <option value="lost" <?php echo $filter_status == 'lost' ? 'selected' : ''; ?>>Lost Only</option>
                            <option value="found" <?php echo $filter_status == 'found' ? 'selected' : ''; ?>>Found Only</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sort">Sort By</label>
                        <select id="sort" name="sort">
                            <option value="created_at DESC" <?php echo $sort_by == 'created_at DESC' ? 'selected' : ''; ?>>Newest First</option>
                            <option value="created_at ASC" <?php echo $sort_by == 'created_at ASC' ? 'selected' : ''; ?>>Oldest First</option>
                            <option value="title ASC" <?php echo $sort_by == 'title ASC' ? 'selected' : ''; ?>>Title A-Z</option>
                            <option value="location ASC" <?php echo $sort_by == 'location ASC' ? 'selected' : ''; ?>>Location A-Z</option>
                        </select>
                    </div>

                    <button type="submit" class="btn">Search</button>
                </div>
            </form>
        </div>

        <!-- Items List -->
        <div class="items-section">
            <h2>Items List (<?php echo count($items); ?> items)</h2>

            <?php if (empty($items)): ?>
                <div class="no-items">
                    <p>No items found. Be the first to post!</p>
                </div>
            <?php else: ?>
                <div class="items-grid">
                    <?php foreach ($items as $item): ?>
                        <div class="item-card">
                            <div>
                                <?php if ($item['image_path'] && file_exists($item['image_path'])): ?>
                                    <img src="<?php echo htmlspecialchars($item['image_path']); ?>"
                                        alt="Item Image" class="item-image">
                                <?php else: ?>
                                    <div class="no-image">
                                        <br>No Image
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="item-info">
                                <h3><?php echo htmlspecialchars($item['title']); ?></h3>

                                <span class="status-badge status-<?php echo $item['status']; ?>">
                                    <?php echo $item['status'] == 'lost' ? 'Lost' : 'Found'; ?>
                                </span>

                                <div class="item-details">
                                    <strong>Location:</strong> <?php echo htmlspecialchars($item['location']); ?>
                                </div>

                                <?php if ($item['date_found']): ?>
                                    <div class="item-details">
                                        <strong> Date:</strong> <?php echo date('F j, Y', strtotime($item['date_found'])); ?>
                                        <?php if ($item['time_found']): ?>
                                            at <?php echo date('g:i A', strtotime($item['time_found'])); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="item-details">
                                    <strong> Description:</strong> <?php echo nl2br(htmlspecialchars($item['description'])); ?>
                                </div>

                                <div class="contact-info">
                                    <strong> Contact:</strong> <?php echo htmlspecialchars($item['contact_info']); ?>
                                </div>

                                <div class="item-details" style="font-size: 12px; color: #999; margin-top: 10px;">
                                    Posted on <?php echo date('M j, Y g:i A', strtotime($item['created_at'])); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        
        fetch("navbar.html")
            .then(res => res.text())
            .then(data => {
                document.getElementById("navbar-container").innerHTML = data;
            }); 
       
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.querySelector('.message.success');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 300);
                }, 5000);
            }
        });
    </script>
</body>

</html>