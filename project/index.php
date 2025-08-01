<?php
header("Content-Type: application/json");
require 'db.php';

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

$method = $_SERVER['REQUEST_METHOD'];

// Clean URI path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$path = str_replace($script_name, '', $uri);
$path = trim($path, '/');

$segments = explode('/', $path);
$resource = $segments[0] ?? null;
$id = $segments[1] ?? null;


// Only allow /posts
if ($resource !== 'posts') {
    http_response_code(404);
    echo json_encode(['error' => 'Invalid endpoint']);
    exit;
}


switch ($method) {
    case 'GET':
        if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
            $stmt->execute([$id]);
            $post = $stmt->fetch();
            if ($post) {
                echo json_encode($post);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Post not found']);
            }
        } else {
            $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
            echo json_encode($stmt->fetchAll());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $title = sanitize($data['title'] ?? '');
        $content = sanitize($data['content'] ?? '');

        if (!$title || !$content) {
            http_response_code(400);
            echo json_encode(['error' => 'Title and content are required']);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())");
        if ($stmt->execute([$title, $content])) {
            http_response_code(201);
            echo json_encode(['message' => 'Post created']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to create post']);
        }
        break;

    case 'PUT':
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'ID is required']);
            exit;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $title = sanitize($data['title'] ?? '');
        $content = sanitize($data['content'] ?? '');

        $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        if ($stmt->execute([$title, $content, $id])) {
            echo json_encode(['message' => 'Post updated']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update post']);
        }
        break;

    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'ID is required']);
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        if ($stmt->execute([$id])) {
            echo json_encode(['message' => 'Post deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete post']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
        break;
}
?>