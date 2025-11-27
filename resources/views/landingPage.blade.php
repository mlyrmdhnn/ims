@extends('layouts.loginLayout')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page IMS - Sistem Manajemen Inventaris</title>
    <style>
        /* Reset dan dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f9f9f9;
            overflow-x: hidden;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            color: #4a90e2;
            font-size: 1.8rem;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 2rem;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            color: #4a90e2;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            padding: 120px 2rem 5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-text {
            animation: fadeInLeft 1s ease-out;
        }

        .hero-text h2 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-text .btn {
            display: inline-block;
            background: #ffd700;
            color: #333;
            padding: 1rem 2.5rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .hero-text .btn:hover {
            background: #ffed4e;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .hero-illustration {
            animation: fadeInRight 1s ease-out;
            text-align: center;
        }

        .hero-illustration svg {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        /* Animasi */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* About Section */
        .about {
            padding: 5rem 2rem;
            background: #fff;
        }

        .about .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text {
            animation: slideInUp 1s ease-out;
        }

        .about-text h3 {
            font-size: 2.5rem;
            color: #4a90e2;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .about-illustration {
            animation: slideInUp 1.2s ease-out;
            text-align: center;
        }

        .about-illustration img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 5rem 2rem;
            background: #f4f4f4;
        }

        .features .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features h3 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
            animation: fadeIn 1s ease-out;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: bounceIn 1s ease-out;
            animation-fill-mode: both;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .feature-item:nth-child(1) { animation-delay: 0.2s; }
        .feature-item:nth-child(2) { animation-delay: 0.4s; }
        .feature-item:nth-child(3) { animation-delay: 0.6s; }
        .feature-item:nth-child(4) { animation-delay: 0.8s; }

        .feature-item h4 {
            font-size: 1.5rem;
            color: #4a90e2;
            margin-bottom: 1rem;
        }

        .feature-item p {
            font-size: 1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 2rem;
            background: #fff;
        }

        .testimonials .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonials h3 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 3rem;
            animation: fadeIn 1s ease-out;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-item {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            animation: slideInUp 1s ease-out;
            animation-fill-mode: both;
        }

        .testimonial-item:nth-child(1) { animation-delay: 0.2s; }
        .testimonial-item:nth-child(2) { animation-delay: 0.4s; }
        .testimonial-item:nth-child(3) { animation-delay: 0.6s; }

        .testimonial-item p {
            font-style: italic;
            margin-bottom: 1rem;
        }

        .testimonial-item cite {
            font-weight: bold;
            color: #4a90e2;
        }

        /* CTA Section */
        .cta {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
            color: #fff;
            text-align: center;
        }

        .cta h3 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeIn 1s ease-out;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            animation: fadeIn 1.2s ease-out;
        }

        .cta .btn {
            display: inline-block;
            background: #ffd700;
            color: #333;
            padding: 1rem 2.5rem;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .cta .btn:hover {
            background: #ffed4e;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        /* Footer */
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 2rem;
        }

        footer p {
            margin: 0;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .hero .container,
            .about .container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-text h2 {
                font-size: 2.5rem;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .about-text h3,
            .features h3,
            .testimonials h3,
            .cta h3 {
                font-size: 2rem;
            }

            .feature-grid,
            .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .hero-illustration svg,
            .about-illustration img {
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>IMS</h1>
        <nav>
            <ul>
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <section id="hero" class="hero">
        <div class="container">
            <div class="hero-text">
                <h2>Selamat Datang di IMS</h2>
                <p>Sistem Manajemen Inventaris Terintegrasi untuk Efisiensi Bisnis Anda. Kelola stok, laporan, dan integrasi dengan mudah.</p>
                <a href="#about" class="btn">Pelajari Lebih Lanjut</a>
            </div>
            <div class="hero-illustration">
                <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                    <!-- Ilustrasi sederhana IMS: Gudang dengan kotak inventaris -->
                    <rect x="50" y="100" width="400" height="200" fill="#e0e0e0" stroke="#333" stroke-width="2"/>
                    <rect x="70" y="120" width="80" height="60" fill="#4a90e2"/>
                    <rect x="170" y="120" width="80" height="60" fill="#ffd700"/>
                    <rect x="270" y="120" width="80" height="60" fill="#ff6b6b"/>
                    <rect x="70" y="200" width="80" height="60" fill="#4ecdc4"/>
                    <rect x="170" y="200" width="80" height="60" fill="#45b7d1"/>
                    <rect x="270" y="200" width="80" height="60" fill="#f9ca24"/>
                    <text x="250" y="350" text-anchor="middle" font-size="20" fill="#333">IMS Inventory</text>
                </svg>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="about-text">
                <h3>Tentang IMS</h3>
                <p>IMS (Inventory Management System) adalah solusi lengkap untuk mengelola inventaris Anda dengan mudah. Dari tracking stok hingga laporan real-time, IMS membantu bisnis Anda tetap terorganisir dan efisien.</p>
                <p>Dengan antarmuka yang intuitif dan fitur canggih, IMS dirancang untuk skala kecil hingga besar, memungkinkan integrasi dengan sistem POS dan e-commerce lainnya.</p>
            </div>
            <div class="about-illustration">
                <img src="https://via.placeholder.com/400x300?text=IMS+Illustration" alt="Ilustrasi IMS">
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <h3>Fitur Utama</h3>
            <div class="feature-grid">
                <div class="feature-item">
                    <h4>Tracking Stok Real-Time</h4>
                    <p>Pantau inventaris Anda secara langsung dengan pembaruan otomatis dan notifikasi stok rendah.</p>
                </div>
                <div class="feature-item">
                    <h4>Laporan Otomatis</h4>
                    <p>Hasilkan laporan penjualan, inventaris, dan analitik dengan mudah untuk pengambilan keputusan yang lebih baik.</p>
                </div>
                <div class="feature-item">
                    <h4>Integrasi Mudah</h4>
                    <p>Terhubung dengan sistem POS, e-commerce, dan aplikasi pihak ketiga tanpa kesulitan.</p>
                </div>
                <div class="feature-item">
                    <h4>Keamanan Data</h4>
                    <p>Enkripsi data dan kontrol akses untuk melindungi informasi inventaris Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <h3>Testimoni Pengguna</h3>
            <div class="testimonial-grid">
                <div class="testimonial-item">
                    <p>"IMS telah mengubah cara kami mengelola inventaris. Sangat efisien dan mudah digunakan!"</p>
                    <cite>- Ahmad, Pemilik Toko Retail</cite>
                </div>
                <div class="testimonial-item">
                    <p>"Laporan real-time membantu kami menghemat waktu dan mengurangi kesalahan stok."</p>
                    <cite>- Siti, Manajer Gudang</cite>
                </div>
                <div class="testimonial-item">
                    <p>"Integrasi dengan sistem kami sempurna. Rekomendasi untuk bisnis apa pun."</p>
                    <cite>- Budi, CEO Startup</cite>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <h3>Siap Tingkatkan Efisiensi Bisnis Anda?</h3>
        <p>Mulai gunakan IMS hari ini dan rasakan perbedaannya.</p>
        <a href="/client/login" class="btn">Bergabung Sekarang</a>
    </section>

    <footer id="contact">
        <p>&copy; 2023 IMS. Semua Hak Dilindungi. | Kontak: info@ims.com | Telepon: +62 123 456 789</p>
    </footer>

    <script>
        // Smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animasi on scroll (opsional, menggunakan Intersection Observer)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.feature-item, .testimonial-item').forEach(item => {
            item.style.animationPlayState = 'paused';
            observer.observe(item);
        });
    </script>
</body>
</html>
@endsection