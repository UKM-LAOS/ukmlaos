@extends('layouts.cp.front')

@section('content')
    <!-- start hero -->
    <section id="hero"
        class="w-full md:w-auto h-[655px] relative pl-0 md:pl-[90px] md:pr-0 pt-[70px] md:pt-[130px] flex flex-col md:block"
        style="background: url('{{ asset('laos-cp/bg-card1.png') }}') no-repeat center center; background-size: cover;">
        <div
            class="md:absolute w-full sm:w-[550px] flex flex-col items-center md:items-start gap-[25px] md:gap-[50px] z-20 px-5 md:px-0">
            <div class="w-full flex flex-col gap-[10px] md:gap-5">
                <h1 class="text-h3 md:text-h1 text-neutrals-light-01 text-center md:text-start">
                    Selamat
                    <span class="text-secondary-yellow-base">Datang, Laosars!</span>
                </h1>
                <p class="text-body-mobile md:text-body-dekstop text-neutrals-light-01 text-center md:text-start">
                    UKM LAOS adalah Unit Kegiatan Mahasiswa yang berfokus sebagai wadah
                    untuk memajukan kreatifitas dalam pengembangan Linux dan Open Source
                    di Fakultas Ilmu Komputer Universitas Jember.
                </p>
            </div>
            <a href="#manfaat"
                class="w-[160px] md:w-[243px] flex gap-[10px] items-center justify-center py-[10px] border-2 border-neutrals-light-01 rounded-[10px] md:rounded-[20px] text-body-sm-mobile md:text-body-sm-dekstop text-neutrals-light-01 ease-linear transform hover:scale-105 transition duration-500">
                <span>Lihat Selengkapnya</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none"
                    class="w-[11px] md:w-[16px] h-[11px] md:h-[16px]">
                    <path
                        d="M7.3 15.2998C7.11667 15.1165 7.02067 14.8831 7.012 14.5998C7.004 14.3165 7.09167 14.0831 7.275 13.8998L12.175 8.9998H1C0.716667 8.9998 0.479 8.9038 0.287 8.7118C0.0956668 8.52047 0 8.28314 0 7.9998C0 7.71647 0.0956668 7.4788 0.287 7.2868C0.479 7.09547 0.716667 6.9998 1 6.9998H12.175L7.275 2.0998C7.09167 1.91647 7.004 1.68314 7.012 1.3998C7.02067 1.11647 7.11667 0.883138 7.3 0.699804C7.48333 0.516471 7.71667 0.424805 8 0.424805C8.28333 0.424805 8.51667 0.516471 8.7 0.699804L15.3 7.2998C15.4 7.38314 15.471 7.48714 15.513 7.6118C15.5543 7.73714 15.575 7.86647 15.575 7.9998C15.575 8.13314 15.5543 8.25814 15.513 8.3748C15.471 8.49147 15.4 8.5998 15.3 8.6998L8.7 15.2998C8.51667 15.4831 8.28333 15.5748 8 15.5748C7.71667 15.5748 7.48333 15.4831 7.3 15.2998Z"
                        fill="white" />
                </svg>
            </a>
        </div>
        <div class="w-full flex justify-center mt-4 z-20 md:hidden">
            <img src="{{ asset('laos-cp/home-hero-ornament.png') }}" alt="" class="w-[360px]" />
        </div>
        <div class="relative md:absolute md:top-12 md:right-28 z-20 hidden md:block mt-[16px]">
            <div
                class="absolute left-[105px] md:left-[75px] bottom-2 md:bottom-8 -z-10 w-[189px] md:w-[360px] h-[189px] md:h-[360px] rounded-full bg-yellow-500">
            </div>
            <img src="{{ asset('laos-cp/maskot-1.png') }}" alt="maskot 1" class="w-[230px] md:w-auto" />
        </div>
        <img src="{{ asset('laos-cp/Icon-1.png') }}" alt="icon 1"
            class="hidden md:block absolute top-[340px] md:top-32 right-20 md:right-32 w-[52px] md:w-auto h-[52px] md:h-auto z-40 hover:animate-spin" />
        <img src="{{ asset('laos-cp/Icon-2.png') }}" alt="icon 2"
            class="hidden md:block absolute top-[340px] md:top-20 right-72 md:right-[500px] w-[52px] md:w-auto h-[52px] md:h-auto z-40 hover:animate-spin" />
        <img src="{{ asset('laos-cp/Icon-3.png') }}" alt="icon 3"
            class="hidden md:block absolute top-[385px] md:top-64 right-[275px] md:right-[500px] w-[52px] md:w-auto h-[52px] md:h-auto z-40 hover:animate-spin" />
        <img src="{{ asset('laos-cp/Ornament.png') }}" alt="ornament"
            class="w-full absolute bottom-20 md:bottom-0 left-0 z-0" />
        <div class="absolute w-full -bottom-[40px] left-0 right-0 h-[73px] bg-neutrals-light-01 transform -skew-y-3">
        </div>
    </section>
    <!-- end hero -->
    <!-- start manfaat -->
    <section id="manfaat" class="w-full flex flex-col mt-20 md:mt-40 gap-[50px] items-center px-7 md:px-0">
        <div class="w-full md:w-[796px] flex flex-col gap-5">
            <h2 class="text-h3 md:text-h2 text-center text-neutrals-dark-01">
                Manfaat <span class="text-primary-green-base">Laosars</span>
            </h2>
        </div>
        <div class="flex flex-col md:flex-row gap-[30px] md:gap-[45px]">
            <div class="w-[300px] md:w-[320px] flex flex-col items-center gap-6">
                <div
                    class="h-full py-5 px-4 rounded-md text-center bg-black bg-opacity-90 shadow-lg hover:bg-opacity-20 ease-linear transform hover:scale-105 transition duration-500 group">
                    <img class="w-32 h-32 mx-auto mb-6" src="{{ asset('laos-cp/networking.png') }}" alt="" />
                    <h3
                        class="text-h4 md:text-h3 text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Relasi
                    </h3>
                    <p
                        class="text-body-mobile md:text-body-dekstop text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Menambah wawasan membuat terbebas dari permasalahan, relasi yang
                        tepat bisa menemukan ide menyelesaikan masalah dan menambah
                        pengalaman
                    </p>
                </div>
            </div>
            <div class="w-[300px] md:w-[320px] flex flex-col items-center gap-6">
                <div
                    class="h-full py-5 px-4 rounded-md text-center bg-black bg-opacity-90 shadow-lg hover:bg-yellow-200 ease-linear transform hover:scale-105 transition duration-500 group">
                    <img class="w-32 h-32 mx-auto mb-6" src="{{ asset('laos-cp/cloud-data.png') }}" alt="" />
                    <h3
                        class="text-h4 md:text-h3 text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Bakat
                    </h3>
                    <p
                        class="text-body-mobile md:text-body-dekstop text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Meningkatkan dan mengembangkan potensi yang ada pada setiap
                        mahasiswa secara optimal melalui berbagai kegiatan
                    </p>
                </div>
            </div>
            <div class="w-[300px] md:w-[320px] flex flex-col items-center gap-6">
                <div
                    class="h-full py-5 px-4 rounded-md text-center bg-black bg-opacity-90 shadow-lg hover:bg-green-200 ease-linear transform hover:scale-105 transition duration-500 group">
                    <img class="w-32 h-32 mx-auto mb-6" src="{{ asset('laos-cp/license.png') }}" alt="" />
                    <h3
                        class="text-h4 md:text-h3 text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Sertifikat
                    </h3>
                    <p
                        class="text-body-mobile md:text-body-dekstop text-center text-white group-hover:text-neutrals-dark-01 transform hover:transition duration-500">
                        Dapatkan sertifikat keaktifan sebagai anggota UKM LAOS, dukung CV
                        kamu agar jauh lebih baik lagi
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end manfaat -->
    <!-- start proker section -->
    <section id="proker-section" class="w-full flex flex-col mt-40 gap-[50px] items-center px-7 md:px-0">
        <div class="w-full md:w-[796px] flex flex-col gap-5">
            <h2 class="text-h3 md:text-h2 text-center text-neutrals-dark-01">Program <span
                    class="text-primary-green-base">Kerja</span></h2>
        </div>

        <div class="w-full h-[209px] md:h-[309px] flex justify-center relative">
            @if (count($programs) > 0)
                <!-- Swiper when programs exist -->
                <div class="swiper mySwiper w-full max-w-[300px] sm:max-w-[650px] lg:max-w-[986px] h-full">
                    <div class="swiper-wrapper">
                        @foreach ($programs as $program)
                            <div class="swiper-slide h-full">
                                <a href="#" class="block h-full">
                                    <img src="{{ $program->getFirstMediaUrl('program-thumbnail') }}"
                                        alt="{{ $program->judul_program }}" class="w-full h-full object-cover rounded-3xl">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Navigation Arrows - Only show when programs exist -->
                <div
                    class="swiper-button-prev absolute z-10 left-2 md:left-10 lg:left-20 top-1/2 transform -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-md cursor-pointer hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M15 18L9 12L15 6" stroke="#2DCC70" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div
                    class="swiper-button-next absolute z-10 right-2 md:right-10 lg:right-20 top-1/2 transform -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-md cursor-pointer hover:bg-gray-50 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M9 6L15 12L9 18" stroke="#2DCC70" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            @else
                <!-- Centered empty state when no programs -->
                @EmptyCP([
                'title' => 'Program Kerja',
                ])
            @endif
        </div>
    </section>
    <!-- end proker section -->
    <!-- start divisi -->
    <section id="divisi-section" class="w-full flex flex-col mt-40 gap-[60px] items-center px-7 md:px-0">
        <div class="flex flex-col md:flex-row md:gap-[40px] items-center md:items-start">
            <div class="w-[350px] md:w-[500px] flex flex-col justify-center items-center">
                <h2 class="text-h3 md:text-h2 text-center text-neutrals-dark-01 z-40">
                    Divisi <span class="text-primary-green-base">Kami</span>
                </h2>
                <div class="flex z-40 flex-col md:flex-row gap-2">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-3 group w-full">
                        <!-- Penguin Image Container -->
                        <div
                            class="relative w-[200px] h-[200px] mt-4 md:w-[400px] md:h-[300px] md:ml-10 md:mt-[50px] animate-bounce hover:animate-none md:animate-none md:group-hover:ml-[150px] md:hover:animate-bounce">
                            <!-- First image (visible on mobile, hidden on desktop by default) -->
                            <img src="{{ asset('laos-cp/pila1.png') }}" alt="Gambar Awal"
                                class="w-full h-full object-contain md:object-cover md:transition-opacity md:duration-200 opacity-100 group-hover:opacity-0 md:opacity-0 md:group-hover:opacity-100" />

                            <!-- Second image (hidden on mobile, visible on desktop by default) -->
                            <img src="{{ asset('laos-cp/pila2.png') }}" alt="Gambar Setelah Hover"
                                class="absolute inset-0 w-full h-full object-contain md:object-cover opacity-0 group-hover:opacity-100 md:opacity-100 md:group-hover:opacity-0 transition-opacity duration-200" />
                        </div>

                        <!-- Text Container -->
                        <div class="flex items-center justify-center md:items-start">
                            <p
                                class="z-10 mt-4 w-full max-w-[320px] md:max-w-[380px] py-3 px-4 rounded-lg shadow-lg text-body-sm-mobile md:text-body-dekstop text-center md:text-left text-neutrals-dark-01 bg-white transition-opacity duration-200 opacity-0 group-hover:opacity-100 md:opacity-100 md:group-hover:opacity-0">
                                Terdapat empat divisi yang kami miliki dan tentunya berhubungan dengan Ilmu Komputer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[250px] md:w-[550px] flex flex-col items-center gap-5 md:gap-2">
                <div class="flex flex-col md:flex-row gap-5 mt-5 md:mt-20">
                    <div class="flex gap-5">
                        <div class="w-[200px] h-[180px] md:w-[230px] md:h-[200px] py-6 px-4 rounded-md text-center text-white shadow-lg transition duration-500 ease-in-out transform hover:scale-105 group"
                            style="background: url('{{ asset('laos-cp/bg-card1.png') }}') no-repeat center center; background-size: cover;">
                            <img class="w-20 h-20 mx-auto mb-3 transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100"
                                src="{{ asset('laos-cp/hums.png') }}" alt="humas" />
                            <h5
                                class="text-h6 md:text-h5 text-center transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100">
                                Hubungan Masyarakat
                            </h5>
                            <p
                                class="absolute inset-0 w-full h-full object-cover py-10 px-5 md:py-6 md:px-4 text-body-mobile md:text-body-dekstop w-[270px] text-center opacity-0 transition duration-500 ease-in-out transform group-hover:opacity-100 delay-100">
                                Divisi yang bertanggung jawab dalam perihal penyebaran
                                informasi terutama di lingkup Fakultas Ilmu Komputer
                                Univesitas Jember.
                            </p>
                        </div>
                        <div class="w-[200px] h-[180px] md:w-[230px] md:h-[200px] py-6 px-4 rounded-md text-center text-white shadow-lg transition duration-500 ease-in-out transform hover:scale-105 group"
                            style="background: url('{{ asset('laos-cp/bg-card1.png') }}') no-repeat center center; background-size: cover;">
                            <img class="50 w-20 h-20 mx-auto mb-3 transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100"
                                src="{{ asset('laos-cp/pemro.png') }}" alt="pemro" />
                            <h5
                                class="text-h6 md:text-h5 text-center transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100">
                                Pemrograman
                            </h5>
                            <p
                                class="absolute inset-0 w-full h-full object-cover py-10 px-5 md:py-6 md:px-4 text-body-mobile md:text-body-dekstop w-[270px] text-center opacity-0 transition duration-500 ease-in-out transform group-hover:opacity-100 delay-100">
                                Divisi yang berfokus pada pemrograman untuk mewujudkan tujuan
                                dari UKM LAOS yaitu turut andil dalam menyebarkan open source.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-5">
                    <div class="flex gap-5">
                        <div class="w-[200px] h-[180px] md:w-[230px] md:h-[200px] py-6 px-4 rounded-md text-center text-white shadow-lg transition duration-500 ease-in-out transform hover:scale-105 group"
                            style="background: url({{ asset('laos-cp/bg-card1.png') }}) no-repeat center center; background-size: cover;">
                            <img class="w-20 h-20 mx-auto mb-3 transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100"
                                src="{{ asset('laos-cp/cysec.png') }}" alt="cysec" />
                            <h5
                                class="text-h6 md:text-h5 text-center transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100">
                                Cyber Security
                            </h5>
                            <p
                                class="absolute inset-0 w-full h-full object-cover py-10 px-5 md:py-6 md:px-4 text-body-mobile md:text-body-dekstop w-[270px] text-center opacity-0 transition duration-500 ease-in-out transform group-hover:opacity-100 delay-100">
                                Divisi yang memberikan wawasan mengenai Linux, jaringan
                                komputer (cloud computing), hingga keamanan siber.
                            </p>
                        </div>
                        <div class="w-[200px] h-[180px] md:w-[230px] md:h-[200px] py-6 px-4 rounded-md text-center text-white shadow-lg transition duration-500 ease-in-out transform hover:scale-105 group"
                            style="background: url({{ asset('laos-cp/bg-card1.png') }}) no-repeat center center; background-size: cover;">
                            <img class="w-20 h-20 mx-auto mb-3 transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100"
                                src="{{ asset('laos-cp/mulmed.png') }}" alt="mulmed" />
                            <h5
                                class="text-h6 md:text-h5 text-center transition duration-500 ease-in-out transform group-hover:opacity-0 delay-100">
                                Multimedia
                            </h5>
                            <p
                                class="absolute inset-0 w-full h-full object-cover py-10 px-5 md:py-6 md:px-4 text-body-mobile md:text-body-dekstop w-[270px] text-center opacity-0 transition duration-500 ease-in-out transform group-hover:opacity-100 delay-100">
                                Divisi yang berfokus pada bidang desain dan UI/UX dalam web
                                maupun aplikasi serta mengelola poster yang di sebarkan di
                                sosial media UKM LAOS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end divisi -->
@endsection
