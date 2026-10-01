<?php
require_once 'config/db_connection.php';

$settings = $pdo->query("SELECT * FROM site_settings WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 4");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية - MISSING HISTORY</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background-color: #8f8267b3;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .logo-area {
            display: flex;
            align-items: center;
            gap: 10px;
            height: 100%;
        }
        
        .logo-area img {
           height: 60px;
            width: auto;
            max-width: 100px;
            object-fit: contain;
            border: 2px solid #f9f9f9;
            border-radius: 50%;
        }
        
        .logo-area h1 {
            color: #333;
            font-size: 24px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .nav-links a:hover {
            background-color: rgba(255,255,255,0.3);
        }
        
        .footer {
            background-color: #8f8267b3;
            padding: 30px 50px;
            margin-top: 50px;
            text-align: center;
            color: #333;
        }
        
        .welcome-section {
           display: flex;
            align-items: center;
            gap: 50px;
            padding: 60px 50px;
            background: #8f8267b3;
        }
        
        .welcome-text {
            flex: 1;
        }
        
        .welcome-text h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        
        .welcome-text p {
            font-size: 18px;
            color: #484848;
            line-height: 1.6;
        }
        
        .welcome-image {
            flex: 1;
        }
        
        .welcome-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .artifacts-section {
            padding: 50px;
        }
        
        .section-title {
            text-align: center;
            font-size: 32px;
            color: #333;
            margin-bottom: 40px;
        }
        
        .artifacts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-10px);
        }
        
        .card-image {
            height: 200px;
            overflow: hidden;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .card-content {
            padding: 20px;
        }
        
        .card-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .card-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .read-more {
            display: inline-block;
            background-color: #8f8267b3;
            color: #333;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s;
            cursor: pointer;
            border: none;
        }
        
        .read-more:hover {
            background-color: #423727b3;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }
        
        .modal.show {
            display: flex;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h2 {
            margin: 0;
            color: #333;
        }
        
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: #333;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .modal-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .modal-meta {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        
        .modal-meta p {
            margin: 5px 0;
        }
        
        .modal-description {
            line-height: 1.8;
            color: #555;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .artifacts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .welcome-section {
                flex-direction: column;
                text-align: center;
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                height: auto;
                padding: 20px;
            }
            
            .logo-area {
                margin-bottom: 10px;
            }
            
            .logo-area h1 {
                font-size: 20px;
            }
            
            .nav-links {
                margin-top: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .artifacts-grid {
                grid-template-columns: 1fr;
            }
        }

        .status-lost {
            background-color: #8f8267b3;
            color: #080808;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
        }

        .status-found {
            background-color: #8f8267b3;
            color: #2e7d32;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
        }

        .status-stolen {
            background-color: #8f8267b3;
            color: #080808;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo-area">
            <img src="Logo.jpeg" alt="MISSING HISTORY" style="height: 60px; width: auto; max-width: 100px; object-fit: contain;">
            <h1>MISSING HISTORY</h1>
        </div>
        
        <div class="nav-links">
            <a href="index.php">الرئيسية</a>
            <a href="single.php">صفحة العرض</a>
            <a href="login.php">تسجيل دخول</a>
            <a href="register.php">إنشاء حساب</a>
        </div>
    </nav>
    
    <section class="welcome-section">
        <div class="welcome-text">
            <h2>مرحباً بكم في MISSING HISTORY</h2>
            <p>موقع إلكتروني يوثق القطع الأثرية المفقودة أو المسروقة عبر التاريخ، يعرض معلومات تفصيلية عن كل قطعة، مثل تاريخها، أصل الحضارة، ظروف إختفائها أو سرقتها، وقيمتها الثقافية.</p>
        </div>
        <div class="welcome-image">
            <img src="<?php echo htmlspecialchars($settings['welcome_image'] ?? 'welcome-image.jpg'); ?>" alt="Welcome" onerror="this.src='https://via.placeholder.com/600x400?text=Welcome+Image'">
        </div>
    </section>
    
    <section class="artifacts-section">
        <h2 class="section-title">أحدث المقالات</h2>
        
        <div class="artifacts-grid">
            <?php if (empty($articles)): ?>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                <div class="card">
                    <div class="card-image">
                        <img src="https://via.placeholder.com/300x200?text=Article+<?php echo $i; ?>" alt="Article">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">عنوان المقال <?php echo $i; ?></h3>
                        <p class="card-description">هذا نص تجريبي للوصف وسيتم استبداله بمحتوى حقيقي من قاعدة البيانات لاحقاً...</p>
                        <button class="read-more" onclick='showModal(<?php echo json_encode([
                            'title' => "عنوان المقال $i",
                            'content' => "هذا نص تجريبي للمقال وسيتم استبداله بمحتوى حقيقي من قاعدة البيانات لاحقاً. يمكن أن يكون هذا النص أطول بكثير ليشمل تفاصيل أكثر عن المقال.",
                            'image_url' => "https://via.placeholder.com/600x400?text=Article+$i",
                            'created_at' => "غير محدد",
                            'status' => "lost"
                        ]); ?>)'>قراءة المزيد</button>
                    </div>
                </div>
                <?php endfor; ?>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                <?php
                    $statusForJson = $article['status'] ?? 'lost';
                    if (empty($statusForJson) || !in_array($statusForJson, ['lost', 'found', 'stolen'])) {
                        $statusForJson = 'lost';
                    }
                ?>
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo htmlspecialchars($article['image_url'] ?: 'https://via.placeholder.com/300x200'); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h3>
                        <p class="card-description">
                            <?php
                                $content = $article['content'] ?? '';
                                echo htmlspecialchars(mb_substr($content, 0, 150)) . (mb_strlen($content) > 150 ? '...' : '');
                            ?>
                        </p>
                        <button class="read-more" onclick='showModal(<?php echo json_encode([
                            'title' => $article['title'],
                            'content' => $article['content'] ?? '',
                            'image_url' => $article['image_url'] ?: 'https://via.placeholder.com/600x400',
                            'created_at' => $article['created_at'] ?? 'غير محدد',
                            'status' => $statusForJson
                        ], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>)'>قراءة المزيد</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    
    <footer class="footer">
        <p>جميع الحقوق محفوظة &copy; 2026 - MISSING HISTORY</p>
    </footer>

    <div id="articleModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle"></h2>
                <span class="close" onclick="hideModal()">&times;</span>
            </div>
            <div class="modal-body">
                <img id="modalImage" class="modal-image" src="" alt="">
                <div class="modal-meta">
                    <p><strong>تاريخ الإنشاء:</strong> <span id="modalCreatedAt"></span></p>
                    <p><strong>الحالة:</strong> <span id="modalStatus" class="status-badge"></span></p>
                </div>
                <div id="modalContent" class="modal-description"></div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('articleModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');
        const modalCreatedAt = document.getElementById('modalCreatedAt');
        const modalStatus = document.getElementById('modalStatus');
        const modalContent = document.getElementById('modalContent');

        function showModal(article) {
            modalTitle.textContent = article.title || '';
            modalImage.src = article.image_url || 'https://via.placeholder.com/600x400';
            modalCreatedAt.textContent = article.created_at || 'غير محدد';

            let statusClass = '';
            let statusText = '';
            let statusValue = article.status || 'lost';

            switch (statusValue) {
                case 'found':
                    statusClass = 'status-found';
                    statusText = 'تم العثور';
                    break;
                case 'stolen':
                    statusClass = 'status-stolen';
                    statusText = 'مسروق';
                    break;
                case 'lost':
                default:
                    statusClass = 'status-lost';
                    statusText = 'مفقود';
                    break;
            }

            modalStatus.className = 'status-badge ' + statusClass;
            modalStatus.textContent = statusText;
            modalContent.textContent = article.content || '';

            modal.classList.add('show');
        }

        function hideModal() {
            modal.classList.remove('show');
        }


        window.onclick = function(event) {
            if (event.target == modal) {
                hideModal();
            }
        }
    </script>
</body>
</html>