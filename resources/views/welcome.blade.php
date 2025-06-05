<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GajianKuy - Solusi Penggajian Digital Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        .hero-bg {
            background: linear-gradient(135deg, #a78bfa, #c084fc); /* purple-400 to fuchsia-400 */
        }
        .section-bg-gradient {
            background: linear-gradient(to right, #f3e8ff, #fdf2f8); /* From purple-50 to fuchsia-50 */
        }
        .text-gradient {
            background: linear-gradient(to right, #8b5cf6, #d946ef); /* purple-500 to fuchsia-500 */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .animate-fade-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        html {
            scroll-padding-top: 80px;
        }
        .step-icon-base {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-weight: bold;
            color: white;
            background: linear-gradient(45deg, #a78bfa, #c084fc);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .step-line {
            width: 2px;
            height: 40px;
            background-color: #c084fc;
            margin: 0 auto;
        }
        @media (min-width: 768px) {
            .step-line {
                width: 100%;
                height: 2px;
                margin: 0;
            }
        }
    </style>
</head>
<body class="text-gray-800 bg-gray-50">

    <nav class="fixed top-0 z-50 w-full px-6 py-4 bg-white shadow-md">
        <div class="flex items-center justify-between mx-auto max-w-7xl">
            <a href="/" class="text-2xl font-extrabold text-gradient">GajianKuy</a>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-purple-700 hover:text-purple-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mr-4 font-semibold text-purple-700 hover:text-purple-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 font-semibold text-white transition-all duration-300 rounded-md shadow-lg bg-gradient-to-r from-fuchsia-500 to-purple-500 hover:from-purple-600 hover:to-fuchsia-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-300">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header id="hero" class="flex items-center justify-center min-h-screen pt-16 text-white hero-bg">
        <div class="max-w-4xl px-4 text-center animate-fade-in">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight md:text-6xl drop-shadow-lg">
                Kelola Gaji Karyawan dengan <span class="text-fuchsia-100">Mudah & Cepat</span>
            </h1>
            <p class="mb-8 text-lg md:text-2xl opacity-90">
                Sistem penggajian digital yang intuitif dan aman untuk PT Dompet Anak Jawa Digital.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 text-lg font-bold text-white transition-all duration-300 rounded-full shadow-xl md:px-8 md:py-4 md:text-xl bg-gradient-to-r from-fuchsia-600 to-purple-600 hover:scale-105 hover:from-purple-700 hover:to-fuchsia-700 focus:outline-none focus:ring-4 focus:ring-fuchsia-300">
                Mulai Sekarang Gratis!
            </a>
        </div>
    </header>

    <section id="features" class="flex items-center justify-center min-h-screen py-16 md:py-0 section-bg-gradient">
        <div class="px-6 pt-16 mx-auto text-center max-w-7xl">
            <h2 class="mb-12 text-3xl font-extrabold text-purple-800 md:text-4xl drop-shadow animate-fade-in">
                Solusi Penggajian Terbaik untuk Bisnis Anda
            </h2>
            <div class="grid grid-cols-1 gap-8 md:gap-10 md:grid-cols-3"> <div class="p-6 transition-transform duration-300 transform bg-white shadow-lg md:p-8 rounded-xl ring-1 ring-fuchsia-100 hover:scale-105 animate-fade-in"> <div class="mb-4 text-5xl text-fuchsia-500">✨</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Otomatisasi Penuh</h3> <p class="text-sm text-gray-600 md:text-base">Hitung gaji, tunjangan, dan potongan secara otomatis dengan akurasi tinggi.</p> </div>
                <div class="p-6 transition-transform duration-300 transform bg-white shadow-lg md:p-8 rounded-xl ring-1 ring-fuchsia-100 hover:scale-105 animate-fade-in" data-delay="100">
                    <div class="mb-4 text-5xl text-purple-500">🔒</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Keamanan Data Terjamin</h3>
                    <p class="text-sm text-gray-600 md:text-base">Data karyawan dan penggajian Anda aman dengan sistem enkripsi canggih kami.</p>
                </div>
                <div class="p-6 transition-transform duration-300 transform bg-white shadow-lg md:p-8 rounded-xl ring-1 ring-fuchsia-100 hover:scale-105 animate-fade-in" data-delay="200">
                    <div class="mb-4 text-5xl text-fuchsia-500">📊</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Laporan Akurat & Cepat</h3>
                    <p class="text-sm text-gray-600 md:text-base">Hasilkan laporan gaji lengkap hanya dengan beberapa klik.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="flex items-center justify-center min-h-screen py-16 md:py-0 bg-gray-50">
        <div class="px-6 pt-16 mx-auto text-center max-w-7xl">
            <h2 class="mb-12 text-3xl font-extrabold text-purple-800 md:mb-16 md:text-4xl drop-shadow animate-fade-in"> Bagaimana GajianKuy Bekerja?
            </h2>
            <div class="flex flex-col items-center justify-center space-y-8 md:flex-row md:space-y-0 md:space-x-8"> <div class="flex flex-col items-center max-w-xs px-4 animate-fade-in"> <div class="mb-4 text-3xl step-icon-base md:text-4xl">1</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Daftar & Konfigurasi</h3> <p class="text-sm text-gray-600 md:text-base">Buat akun Anda, masukkan data perusahaan, dan mulai tambahkan data karyawan.</p> </div>

                <div class="md:hidden step-line"></div>
                <div class="flex-1 hidden md:block step-line"></div>

                <div class="flex flex-col items-center max-w-xs px-4 animate-fade-in" data-delay="150"> <div class="mb-4 text-3xl step-icon-base md:text-4xl">2</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Input Data Gaji</h3>
                    <p class="text-sm text-gray-600 md:text-base">Masukkan detail gaji pokok, tunjangan, dan potongan untuk setiap karyawan.</p>
                </div>

                <div class="md:hidden step-line"></div>
                <div class="flex-1 hidden md:block step-line"></div>

                <div class="flex flex-col items-center max-w-xs px-4 animate-fade-in" data-delay="300"> <div class="mb-4 text-3xl step-icon-base md:text-4xl">3</div>
                    <h3 class="mb-3 text-xl font-bold text-purple-700 md:text-2xl">Proses & Laporan</h3>
                    <p class="text-sm text-gray-600 md:text-base">Sistem akan menghitung otomatis dan Anda bisa cetak laporan gaji dengan mudah.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" class="flex items-center justify-center min-h-screen py-16 text-white bg-purple-700 md:py-0">
        <div class="max-w-4xl px-6 pt-16 mx-auto text-center animate-fade-in">
            <h2 class="mb-6 text-3xl font-extrabold md:text-4xl drop-shadow">
                Siap Permudah Penggajian Anda?
            </h2>
            <p class="mb-8 text-lg md:text-xl opacity-90">
                Bergabunglah dengan ratusan perusahaan yang telah merasakan efisiensi dengan GajianKuy.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 rounded-full shadow-xl md:px-10 md:py-5 md:text-xl bg-gradient-to-r from-fuchsia-500 to-purple-500 hover:scale-105 hover:from-purple-600 hover:to-fuchsia-600 focus:outline-none focus:ring-4 focus:ring-fuchsia-300">
                Daftar & Mulai Sekarang!
            </a>
        </div>
    </section>

    <footer class="py-4 text-center text-gray-300 bg-gray-800">
        <div class="px-6 mx-auto max-w-7xl">
            <p>&copy; {{ date('Y') }} PT Dompet Anak Jawa Digital. Semua Hak Dilindungi.</p>
            <p class="mt-2 text-sm">Dibangun dengan <span class="text-fuchsia-500">❤️</span> untuk Anda.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faders = document.querySelectorAll('.animate-fade-in');

            const appearOptions = {
                threshold: 0,
                rootMargin: "0px 0px -100px 0px"
            };

            const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        return;
                    } else {
                        entry.target.classList.add('is-visible');
                        appearOnScroll.unobserve(entry.target);
                    }
                });
            }, appearOptions);

            faders.forEach(fader => {
                const delay = parseInt(fader.dataset.delay) || 0;
                setTimeout(() => {
                    appearOnScroll.observe(fader);
                }, delay);
            });

            if (window.location.hash) {
                const targetElement = document.querySelector(window.location.hash);
                if (targetElement) {
                    setTimeout(() => {
                        window.scrollTo({
                            top: targetElement.offsetTop - document.querySelector('nav').offsetHeight,
                            behavior: 'smooth'
                        });
                    }, 100);
                }
            }
        });
    </script>
</body>
</html>