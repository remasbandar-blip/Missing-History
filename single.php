<?php
require_once 'config/db_connection.php';

$stmt = $pdo->query("SELECT * FROM missing_artifacts ORDER BY created_at DESC LIMIT 6");
$artifacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>القطع الأثرية المهمة - MISSING HISTORY</title>
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
        
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }
        
        .page-title {
            text-align: center;
            font-size: 32px;
            color: #333;
            margin-bottom: 40px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .card:hover {
            transform: translateY(-5px);
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
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .card-title {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #8f8267b3;
            padding-bottom: 8px;
        }
        
        .card-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            flex: 1;
        }
        
        .card-meta {
            background-color: #f9f9f9;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .meta-item {
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
        }
        
        .meta-item strong {
            color: #333;
            width: 90px;
            display: inline-block;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        
        .status-lost {
            background-color: #8f8267b3;
            color: #c62828;
        }
        
        .status-found {
            background-color: #8f8267b3;
            color: #2e7d32;
        }
        
        .status-stolen {
            background-color: #8f8267b3;
            color: #080808;
        }
        
        .btn-read-more {
            display: inline-block;
            background-color: #8f8267b3;
            color: #333;
            text-decoration: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            text-align: center;
            margin-top: auto;
        }
        
        .btn-read-more:hover {
            background-color: #8f8267b3;
        }
        
        .no-data {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: #666;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            align-items: center;
            justify-content: center;
        }
        
        .modal-content {
            background-color: white;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }
        
        .close-modal {
            position: absolute;
            left: 20px;
            top: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #666;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .close-modal:hover {
            color: #333;
        }
        
        .modal-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .modal-title {
            font-size: 30px;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 3px solid #8f8267b3;
            padding-bottom: 10px;
        }
        
        .modal-meta {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        
        .modal-meta-item {
            color: #555;
        }
        
        .modal-content-text {
            line-height: 1.9;
            color: #444;
            font-size: 18px;
        }
        
        @media (max-width: 992px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                height: auto;
                padding: 20px;
            }
            
            .nav-links {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .cards-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo-area">
            <img src="Logo.jpeg" alt="MISSING HISTORY" onerror="this.src='logo.jpg'; this.onerror=null;">
            <h1>MISSING HISTORY</h1>
        </div>
        
        <div class="nav-links">
            <a href="index.php">الرئيسية</a>
            <a href="single.php">صفحة العرض</a>
            <a href="login.php">تسجيل دخول</a>
            <a href="register.php">إنشاء حساب</a>
        </div>
    </nav>
    
    <div class="container">
        <h1 class="page-title">القطع الأثرية المهمة</h1>
        
        <?php if (empty($artifacts)): ?>
            <div class="no-data">
                <h2>لا توجد قطع مهمة حالياً</h2>
                <p>لم يتم إضافة أي قطع بعد.</p>
                <a href="index.php" class="btn-read-more">العودة إلى الرئيسية</a>
            </div>
        <?php else: ?>
            <div class="cards-grid">
                <?php foreach ($artifacts as $artifact): ?>
                <div class="card" id="card-<?= htmlspecialchars($artifact['id']) ?>">
                    <div class="card-image">
                        <img src="<?= htmlspecialchars($artifact['image_url'] ?? 'https://via.placeholder.com/800x400?text=Artifact') ?>" alt="<?= htmlspecialchars($artifact['title']) ?>">
                    </div>
                    <div class="card-content">
                        <h2 class="card-title"><?= htmlspecialchars($artifact['title']) ?></h2>
                        <div class="card-meta">
                            <div class="meta-item"><strong>الحالة:</strong> 
                                <?php 
                                $status = isset($artifact['status']) ? $artifact['status'] : 'lost';
                                if ($status === 'searching') {
                                    $status = 'stolen';
                                }
                                $status_map = [
                                    'lost' => ['class' => 'status-lost', 'text' => 'مفقود'],
                                    'found' => ['class' => 'status-found', 'text' => 'تم العثور'],
                                    'stolen' => ['class' => 'status-stolen', 'text' => 'مسروق']
                                ];
                                $status_class = isset($status_map[$status]) ? 'status-badge ' . $status_map[$status]['class'] : 'status-badge status-lost';
                                $status_text = isset($status_map[$status]) ? $status_map[$status]['text'] : 'مفقود';
                                ?>
                                <span class="<?= $status_class ?>"><?= htmlspecialchars($status_text) ?></span>
                            </div>
                            <div class="meta-item"><strong>تاريخ الإضافة:</strong> <?= htmlspecialchars(date('Y-m-d', strtotime($artifact['created_at'] ?? 'now'))) ?></div>
                        </div>
                        <p class="card-description">
                            <?php 
                            $description = $artifact['description'] ?? '';
                            echo nl2br(htmlspecialchars(mb_substr($description, 0, 150))) . (mb_strlen($description) > 150 ? '...' : '');
                            ?>
                        </p>
                        <!-- حقل مخفي يحتوي على المحتوى الكامل (يُستخدم في الـ Modal) -->
                        <div class="full-content" style="display: none;"><?= htmlspecialchars($description) ?></div>
                        <button class="btn-read-more" onclick="openModal(this)">قراءة المزيد</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- الـ Modal -->
    <div id="articleModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <img id="modalImage" class="modal-image" src="" alt="">
            <h2 id="modalTitle" class="modal-title"></h2>
            <div class="modal-meta">
                <span id="modalStatus" class="modal-meta-item"></span>
                <span id="modalDate" class="modal-meta-item"></span>
            </div>
            <div id="modalContent" class="modal-content-text"></div>
        </div>
    </div>
    
    <!-- الفوتر -->
    <footer class="footer">
        <p>جميع الحقوق محفوظة &copy; 2026 - MISSING HISTORY</p>
    </footer>
    
    <script>
        function openModal(button) {
            const card = button.closest('.card');
            if (!card) return;
            
            const title = card.querySelector('.card-title').textContent;
            const image = card.querySelector('.card-image img').src;
            const statusElement = card.querySelector('.status-badge');
            const statusText = statusElement ? statusElement.textContent : 'مفقود';
            const statusClass = statusElement ? statusElement.className : 'status-badge status-lost';
            const date = card.querySelector('.meta-item:last-child').textContent.replace('تاريخ الإضافة:', '').trim();
            const fullContent = card.querySelector('.full-content')?.innerHTML || '';
            
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalImage').src = image;
            document.getElementById('modalContent').innerHTML = fullContent.replace(/\n/g, '<br>');
            
            const modalStatus = document.getElementById('modalStatus');
            modalStatus.innerHTML = '<strong>الحالة:</strong> <span class="' + statusClass + '">' + statusText + '</span>';
            
            document.getElementById('modalDate').innerHTML = '<strong>تاريخ الإضافة:</strong> ' + date;
            document.getElementById('articleModal').style.display = 'flex';
        }
        
        function closeModal() {
            document.getElementById('articleModal').style.display = 'none';
        }
        
        window.onclick = function(event) {
            const modal = document.getElementById('articleModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>