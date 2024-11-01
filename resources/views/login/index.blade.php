<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: "Mondwest";
            src: url("/css/font/Mondwest.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Hack";
            src: url("/css/font/Hack-Regular.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Hack";
            src: url("/css/font/Hack-Bold.woff") format("woff");
            font-weight: 700;
            font-style: normal;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    bgGradientDeg: {
                        55: "55deg",
                    },
                },
                fontFamily: {
                    mondwest: ["Mondwest", "sans-serif"],
                    hack: ["Hack", "sans-serif"],
                },
            },
        };
    </script>
</head>

<body>
    {{-- DEMO MODAL --}}
    <div class="h-[100dvh] w-full fixed z-[9999] justify-center items-center backdrop-blur-[3px] px-4 hidden" id="demo-modal">
        <div class='bg-white border-[#999999] border-2 rounded-[16px] p-6 w-fit max-w-[800px] flex flex-col xl:flex-row gap-6 shadow-2xl'>
            <div class='flex flex-col w-full xl:items-start xl:w-[50%]'>
                <div class='flex items-center gap-3'>
                    <h1 class='text-[46px]'>👋</h1>
                    <div class='flex flex-col'>
                        <h1 class='font-mondwest text-[#333] text-2xl'>Bersosial</h1>
                        <a href="https://galeraz.viewsource.work" class='text-[#777] font-mondwest'>
                            https://bersosial.viewsource.work/
                        </a>
                    </div>
                </div>
                <p class='text-[#333] text-xs font-hack font-bold mt-3 indent-4'>
                    Hello Visitor! Welcome to one of my dummy projects. Dummy project is a project that i made to train my skills or just for my school task. I’ve hosted it to provide a preview for you and to showcase it in my portfolio. Enjoy!
                </p>
                <div class='flex gap-6 mt-6'>
                    <div class='flex flex-col gap-2'>
                        <p class='text-[#333] text-base font-mondwest'>Made With</p>
                        <div class='flex items-center gap-3'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-laravel">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 17l8 5l7 -4v-8l-4 -2.5l4 -2.5l4 2.5v4l-11 6.5l-4 -2.5v-7.5l-4 -2.5z" />
                                <path d="M11 18v4" />
                                <path d="M7 15.5l7 -4" />
                                <path d="M14 7.5v4" />
                                <path d="M14 11.5l4 2.5" />
                                <path d="M11 13v-7.5l-4 -2.5l-4 2.5" />
                                <path d="M7 8l4 -2.5" />
                                <path d="M18 10l4 -2.5" />
                            </svg>
                        </div>
                    </div>
                    <div class='flex flex-col gap-2'>
                        <p class='text-[#333] text-base font-mondwest'>By viewsource</p>
                        <div class='flex flex-col gap-3'>
                            <div class='flex items-center gap-2 group cursor-pointer' onclick="window.open('https://github.com/vi3w-s0urce')">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="text-[#333] text-[24px]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.001 2C6.47598 2 2.00098 6.475 2.00098 12C2.00098 16.425 4.86348 20.1625 8.83848 21.4875C9.33848 21.575 9.52598 21.275 9.52598 21.0125C9.52598 20.775 9.51348 19.9875 9.51348 19.15C7.00098 19.6125 6.35098 18.5375 6.15098 17.975C6.03848 17.6875 5.55098 16.8 5.12598 16.5625C4.77598 16.375 4.27598 15.9125 5.11348 15.9C5.90098 15.8875 6.46348 16.625 6.65098 16.925C7.55098 18.4375 8.98848 18.0125 9.56348 17.75C9.65098 17.1 9.91348 16.6625 10.201 16.4125C7.97598 16.1625 5.65098 15.3 5.65098 11.475C5.65098 10.3875 6.03848 9.4875 6.67598 8.7875C6.57598 8.5375 6.22598 7.5125 6.77598 6.1375C6.77598 6.1375 7.61348 5.875 9.52598 7.1625C10.326 6.9375 11.176 6.825 12.026 6.825C12.876 6.825 13.726 6.9375 14.526 7.1625C16.4385 5.8625 17.276 6.1375 17.276 6.1375C17.826 7.5125 17.476 8.5375 17.376 8.7875C18.0135 9.4875 18.401 10.375 18.401 11.475C18.401 15.3125 16.0635 16.1625 13.8385 16.4125C14.201 16.725 14.5135 17.325 14.5135 18.2625C14.5135 19.6 14.501 20.675 14.501 21.0125C14.501 21.275 14.6885 21.5875 15.1885 21.4875C19.259 20.1133 21.9999 16.2963 22.001 12C22.001 6.475 17.526 2 12.001 2Z"></path>
                                </svg>
                                <p class='text-[#333] text-[10px] sm:text-xs font-hack group-hover:text-[#0000ff]'>github.com/vi3w-s0urce</p>
                            </div>
                            <div class='flex items-center gap-2 group cursor-pointer' onclick="window.open('https://linkedin.com/in/vi3w-s0urce')">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="text-[#333] text-[24px]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                </svg>
                                <p class='text-[#333] text-[10px] sm:text-xs font-hack group-hover:text-[#0000ff]'>linkedin.com/in/vi3w-s0urce</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='w-full xl:w-[50%] flex flex-col gap-2'>
                <p class='font-mondwest text-[#333] text-base'>How to use this website:</p>
                <div class='py-3 px-4 flex flex-col gap-2 bg-[#e0e0e0]'>
                    <p class="text-xs font-hack">
                        You can register (sign up) in this page:
                        <br>
                        <br>
                        <a href="/register" class="text-[#0000ff] font-bold">
                            bersosial.viewsource.work/register
                        </a>
                        <br>
                        <br>
                        <br>
                        or you can login as visitor with this credentials:
                        <br>
                        <br>
                        username: visitor
                        <br>
                        password: visitor
                    </p>
                </div>
                <Button class='min-w-0 w-full h-fit px-6 py-3 text-white font-hack font-bold mt-1 rounded-none bg-[#00FF00] hover:bg-[#00aa00] text-base' onclick="closeDemoModal()">
                    ENJOY!
                </Button>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <section class="login">
        <div class="login-container">
            <div class="login-title">
                <h1>Selamat Datang</h1>
                <p>Silahkan Sign in</p>
                @if (session()->has('success'))
                    <div class="success-message">
                        <iconify-icon icon="line-md:circle-to-confirm-circle-transition" style="color: #63bb67;" width="24" height="24"></iconify-icon>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ session('loginError') }}
                    </div>
                @endif
            </div>
            <div>
                <form action="/login" method="post" class="form-login">
                    @csrf
                    <div class="input-container">
                        <p>Username</p>
                        <input type="text" name="username" id="username" placeholder="Masukkan username" class="@error('username') invalid-input @enderror" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-message">
                                <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-container">
                        <p>Password</p>
                        <input type="password" name="password" id="password" placeholder="Masukkan password" class="@error('password') invalid-input @enderror" required>
                        @error('password')
                            <div class="invalid-message">
                                <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit">Login</button>
                </form>
                <p class="dialog-barrier">atau</p>
                <a href="/register"><button type="submit" class="register-button">Register</button></a>
            </div>
        </div>
        <div class="introduction">
            <h1 class="top-title-login">Bersosial</h1>
            <p class="description">Bersosial adalah platform media sosial mini<br>yang memungkinkan pengguna dapat memposting<br>teks dan gambar dengan mudah.
                <br>
                <br>Sesuai dengan namanya<br>dengan Bersosial pengguna saling berbagi postingan<br>dan tentu juga dapat saling berinteraksi dengan komentar.
                <br>Jadi skuy gas Bersosial...
            </p>
            <p class="footer-watermark">Made with <iconify-icon icon="devicon:laravel" style="color: white;" width="24"></iconify-icon> by Mike</p>
        </div>
    </section>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <script>
        if (localStorage.getItem('demo-modal') === null) {
            localStorage.setItem('demo-modal', 'seen');
        }

        function checkDemoModal() {
            if (!sessionStorage.getItem('demo-modal-session')) {
                const demoModal = document.getElementById("demo-modal");
                if (demoModal) demoModal.style.display = 'flex';

                sessionStorage.setItem('demo-modal-session', 'shown');
            } else {
                const demoModal = document.getElementById("demo-modal");
                if (demoModal) demoModal.remove();
            }
        }

        function closeDemoModal() {
            const demoModal = document.getElementById("demo-modal");
            if (demoModal) demoModal.remove();

            sessionStorage.setItem('demo-modal-session', 'closed');
        }

        checkDemoModal();
    </script>
</body>

</html>
