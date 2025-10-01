<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini-Shop Lite</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */*,:before,:after{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x: 0;--tw-border-spacing-y: 0;--tw-translate-x: 0;--tw-translate-y: 0;--tw-rotate: 0;--tw-skew-x: 0;--tw-skew-y: 0;--tw-scale-x: 1;--tw-scale-y: 1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness: proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width: 0px;--tw-ring-offset-color: #fff;--tw-ring-color: rgb(59 130 246 / .5);--tw-ring-offset-shadow: 0 0 #0000;--tw-ring-shadow: 0 0 #0000;--tw-shadow: 0 0 #0000;--tw-shadow-colored: 0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }*,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}:before,:after{--tw-content: ""}html,:host{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;-o-tab-size:4;tab-size:4;font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}ol,ul,menu{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{opacity:1;color:#9ca3af}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role=button]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.absolute{position:absolute}.relative{position:relative}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-left-20{left:-5rem}.top-0{top:0}.z-0{z-index:0}.\!row-span-1{grid-row:span 1 / span 1!important}.-mx-3{margin-left:-.75rem;margin-right:-.75rem}.-ml-px{margin-left:-1px}.ml-3{margin-left:.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.inline-flex{display:inline-flex}.table{display:table}.grid{display:grid}.\!hidden{display:none!important}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-5{height:1.25rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-5{width:1.25rem}.w-\[calc\(100\%_\+_8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.w-full{width:100%}.max-w-2xl{max-width:42rem}.max-w-\[877px\]{max-width:877px}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.transform{transform:translate(var(--tw-translate-x),var(--tw-translate-y)) rotate(var(--tw-rotate)) skew(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.cursor-default{cursor:default}.resize{resize:both}.grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.\!flex-row{flex-direction:row!important}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-items-center{justify-items:center}.gap-2{gap:.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:.5rem}.rounded-md{border-radius:.375rem}.rounded-sm{border-radius:.125rem}.rounded-l-md{border-top-left-radius:.375rem;border-bottom-left-radius:.375rem}.rounded-r-md{border-top-right-radius:.375rem;border-bottom-right-radius:.375rem}.border{border-width:1px}.border-gray-300{--tw-border-opacity: 1;border-color:rgb(209 213 219 / var(--tw-border-opacity, 1))}.bg-\[\#FF2D20\]\/10{background-color:#ff2d201a}.bg-gray-50{--tw-bg-opacity: 1;background-color:rgb(249 250 251 / var(--tw-bg-opacity, 1))}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.bg-gradient-to-b{background-image:linear-gradient(to bottom,var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from: transparent var(--tw-gradient-from-position);--tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to: #fff var(--tw-gradient-to-position)}.to-zinc-900{--tw-gradient-to: #18181b var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#ff2d20}.object-cover{-o-object-fit:cover;object-fit:cover}.object-top{-o-object-position:top;object-position:top}.p-6{padding:1.5rem}.px-2{padding-left:.5rem;padding-right:.5rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.pt-3{padding-top:.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji",Segoe UI Symbol,"Noto Color Emoji"}.text-sm{font-size:.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-medium{font-weight:500}.font-semibold{font-weight:600}.leading-5{line-height:1.25rem}.text-black{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.text-black\/50{color:#00000080}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.underline{text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\,0\,0\,0\.08\)\]{--tw-shadow: 0px 14px 34px 0px rgba(0,0,0,.08);--tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.shadow-sm{--tw-shadow: 0 1px 2px 0 rgb(0 0 0 / .05);--tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.ring-black{--tw-ring-opacity: 1;--tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity, 1))}.ring-gray-300{--tw-ring-opacity: 1;--tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity, 1))}.ring-transparent{--tw-ring-color: transparent}.ring-white{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity, 1))}.ring-white\/\[0\.05\]{--tw-ring-color: rgb(255 255 255 / .05)}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.06\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\,0\,0\,0\.25\)\]{--tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0,0,0,.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.filter{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-property:color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1);transition-duration:.15s}.duration-150{transition-duration:.15s}.duration-300{transition-duration:.3s}.ease-in-out{transition-timing-function:cubic-bezier(.4,0,.2,1)}.selection\:bg-\[\#FF2D20\] *::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white *::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white *::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:bg-\[\#FF2D20\]::-moz-selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity: 1;background-color:rgb(255 45 32 / var(--tw-bg-opacity, 1))}.selection\:text-white::-moz-selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.selection\:text-white::selection{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.hover\:text-black:hover{--tw-text-opacity: 1;color:rgb(0 0 0 / var(--tw-text-opacity, 1))}.hover\:text-black\/70:hover{color:#000000b3}.hover\:text-gray-400:hover{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.hover\:text-gray-500:hover{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.hover\:ring-black\/20:hover{--tw-ring-color: rgb(0 0 0 / .2)}.focus\:z-10:focus{z-index:10}.focus\:border-blue-300:focus{--tw-border-opacity: 1;border-color:rgb(147 197 253 / var(--tw-border-opacity, 1))}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus\:ring:focus{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity, 1))}.active\:bg-gray-100:active{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity, 1))}.active\:text-gray-500:active{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.active\:text-gray-700:active{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity, 1))}@media (min-width: 640px){.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:flex-1{flex:1 1 0%}.sm\:items-center{align-items:center}.sm\:justify-between{justify-content:space-between}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}.lg\:grid-cols-3{grid-template-columns:repeat(3,minmax(0,1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0}.lg\:text-\[\#FF2D20\]{--tw-text-opacity: 1;color:rgb(255 45 32 / var(--tw-text-opacity, 1))}}.rtl\:flex-row-reverse:where([dir=rtl],[dir=rtl] *){flex-direction:row-reverse}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-gray-600{--tw-border-opacity: 1;border-color:rgb(75 85 99 / var(--tw-border-opacity, 1))}.dark\:bg-black{--tw-bg-opacity: 1;background-color:rgb(0 0 0 / var(--tw-bg-opacity, 1))}.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.dark\:bg-zinc-900{--tw-bg-opacity: 1;background-color:rgb(24 24 27 / var(--tw-bg-opacity, 1))}.dark\:via-zinc-900{--tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);--tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to: #18181b var(--tw-gradient-to-position)}.dark\:text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.dark\:text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity, 1))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:text-white\/50{color:#ffffff80}.dark\:text-white\/70{color:#ffffffb3}.dark\:ring-zinc-800{--tw-ring-opacity: 1;--tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity, 1))}.dark\:hover\:text-gray-300:hover{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.dark\:hover\:text-white:hover{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:hover\:text-white\/70:hover{color:#ffffffb3}.dark\:hover\:text-white\/80:hover{color:#fffc}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity: 1;--tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity, 1))}.dark\:focus\:border-blue-700:focus{--tw-border-opacity: 1;border-color:rgb(29 78 216 / var(--tw-border-opacity, 1))}.dark\:focus\:border-blue-800:focus{--tw-border-opacity: 1;border-color:rgb(30 64 175 / var(--tw-border-opacity, 1))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity, 1))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity: 1;--tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity, 1))}.dark\:active\:bg-gray-700:active{--tw-bg-opacity: 1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.dark\:active\:text-gray-300:active{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}}
            </style>
        @endif
    </head>
   <body class="font-sans antialiased bg-gradient-to-br from-blue-900 via-black to-pink-700 text-white">
    <div class="relative min-h-screen flex flex-col">
        <!-- Header -->
        <header class="w-full px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
            <a href="{{ url('/') }}" class="sm:hidden flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">

                <!--My Logo Text -->
                <div class="flex flex-col space-y-0">
                    <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                    <h1 class="text-2xl font-bold text-white">SHOP</h1>
                </div>
            </a>
                <a href="{{ url('/') }}" class="hidden sm:flex flex-col leading-none">
                    <span class="text-xs tracking-widest font-bold text-pink-400">MINI</span>
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        SH
                        <img src="{{ asset('images/logo.png') }}" alt="O" class="w-6 h-6 mx-1">
                        P
                    </h1>
                </a>
            </div>

            <nav class="flex space-x-6 text-sm font-medium">
                <a href="#" class="hover:text-pink-300 transition">Login</a>
                <a href="#" class="hover:text-pink-300 transition">Register</a>
            </nav>
        </header>
      <main
  class="flex-1 flex flex-col justify-center items-center text-center px-6 relative overflow-hidden bg-gradient-to-b from-transparent to-black/40"
>
  {{-- Preloader (you already had this idea) --}}
  <div id="preloader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
    <img src="{{ asset('images/logo.png') }}"
         alt="Logo"
         class="w-16 h-16 rounded-full animate-spin-slow">
  </div>

  {{-- Hero / Intro --}}
  <section class="w-full max-w-6xl mx-auto py-12 lg:py-20 relative">
    <div class="flex flex-col lg:flex-row items-center gap-8">
      <div class="flex-1 text-left">
        <p class="uppercase text-sm tracking-widest text-pink-300 mb-2">Welcome to</p>
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight">
          MINI <span class="text-pink-400">SHOP</span> — Curated tech & treats
        </h2>

        <p class="mt-4 text-gray-200/90 max-w-xl">
          Mini Shop Lite is a sleek demo store built for your Laravel Full-Stack assessment.
          Browse curated products, add to cart, checkout, and try our API. Designed to look
          beautiful on both mobile and desktop — with smooth micro-animations, sliding headlines,
          and an immersive product carousel.
        </p>

        {{-- Sliding / bouncing animated words (continuous) --}}
        <div class="mt-6">
          <div class="overflow-hidden">
            <div class="sliding-words whitespace-normal md:whitespace-nowrap text-lg md:text-xl font-semibold">
              <span class="inline-block mr-8">Fast checkout •</span>
              <span class="inline-block mr-8">Secure checkout •</span>
              <span class="inline-block mr-8">Mobile-first design •</span>
            </div>
          </div>

          <div class="mt-4 flex items-center gap-3">
            <a href="{{ url('/register') }}"
               class="inline-flex items-center gap-2 bg-pink-400/95 text-black px-4 py-2 rounded-full font-medium shadow-lg hover:scale-[1.02] transform transition">
              Get started
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>

            <a href="#products" class="text-sm text-gray-300 hover:text-white transition">Browse products</a>
          </div>
        </div>
      </div>

      <div class="flex-1 hidden lg:flex justify-center">
        <div class="w-72 h-72 rounded-2xl bg-gradient-to-tr from-white/5 to-white/3 p-6 backdrop-blur-md border border-white/5 flex items-center justify-center">
          <img src="{{ asset('images/happy.jpg') }}" alt="Happy" class="rounded-xl object-cover w-full h-full shadow-xl">
        </div>
      </div>
    </div>
  </section>

  {{-- Product carousel / grid --}}
  <section id="products" class="w-full max-w-6xl mx-auto py-6 lg:py-12">
    <div class="flex items-center justify-between mb-4 px-2">
      <h3 class="text-xl md:text-2xl font-bold">Featured picks</h3>
      <div class="hidden md:flex items-center gap-2">
        <button id="prevBtn" class="p-2 rounded-full bg-white/5 hover:bg-white/10 transition">
          ‹
        </button>
        <button id="nextBtn" class="p-2 rounded-full bg-white/5 hover:bg-white/10 transition">
          ›
        </button>
      </div>
    </div>

    {{-- Desktop: show carousel row; Mobile: full-width slideshow --}}
    <div id="carousel" class="relative">
      <div id="cardsWrapper" class="flex gap-6 overflow-hidden px-2 touch-pan-y">
        {{-- Product Card Template (JS will duplicate / manage) --}}
        {{-- We'll provide initial markup for each product based on provided images --}}
        <article class="product-card min-w-[260px] max-w-[260px] rounded-2xl bg-gradient-to-br from-white/5 to-white/3 p-4 backdrop-blur-sm border border-white/5 shadow-xl transform transition-all">
          <div class="relative">
            <div class="ribbon absolute left-3 top-3 text-xs font-semibold px-2 py-1 rounded-full bg-pink-400 text-black">-20%</div>
            <img src="{{ asset('images/black airbuds sony.png') }}" alt="Black Airbuds" class="w-full h-32 object-contain rounded-xl">
          </div>

          <div class="mt-3 text-left">
            <h4 class="font-semibold">Black Airbuds (Sony)</h4>
            <p class="text-xs text-gray-300 mt-1">Wireless • Noise-cancelling</p>

            <div class="mt-3 flex items-center justify-between">
              <div class="text-left">
                <div class="text-sm font-bold">KES 7,499</div>
                <div class="text-xs text-gray-400 line-through">KES 9,299</div>
              </div>

              <div class="rating text-yellow-400" aria-hidden>
                ★★★★☆
              </div>
            </div>
          </div>
        </article>

        <article class="product-card min-w-[260px] max-w-[260px] rounded-2xl bg-gradient-to-br from-white/5 to-white/3 p-4 backdrop-blur-sm border border-white/5 shadow-xl transform transition-all">
          <div class="relative">
            <div class="ribbon absolute left-3 top-3 text-xs font-semibold px-2 py-1 rounded-full bg-pink-400 text-black">-15%</div>
            <img src="{{ asset('images/cannon camera.png') }}" alt="Cannon Camera" class="w-full h-32 object-contain rounded-xl">
          </div>

          <div class="mt-3 text-left">
            <h4 class="font-semibold">Cannon XC100</h4>
            <p class="text-xs text-gray-300 mt-1">Capture moments</p>

            <div class="mt-3 flex items-center justify-between">
              <div class="text-left">
                <div class="text-sm font-bold">KES 24,999</div>
                <div class="text-xs text-gray-400 line-through">KES 29,499</div>
              </div>

              <div class="rating text-yellow-400" aria-hidden>
                ★★★★★
              </div>
            </div>
          </div>
        </article>

        <article class="product-card min-w-[260px] max-w-[260px] rounded-2xl bg-gradient-to-br from-white/5 to-white/3 p-4 backdrop-blur-sm border border-white/5 shadow-xl transform transition-all">
          <div class="relative">
            <div class="ribbon absolute left-3 top-3 text-xs font-semibold px-2 py-1 rounded-full bg-pink-400 text-black">-10%</div>
            <img src="{{ asset('images/fitness watch.png') }}" alt="Fitness Watch" class="w-full h-32 object-contain rounded-xl">
          </div>

          <div class="mt-3 text-left">
            <h4 class="font-semibold">Fitness Watch</h4>
            <p class="text-xs text-gray-300 mt-1">24/7 heart monitoring</p>

            <div class="mt-3 flex items-center justify-between">
              <div class="text-left">
                <div class="text-sm font-bold">KES 5,199</div>
                <div class="text-xs text-gray-400 line-through">KES 5,999</div>
              </div>

              <div class="rating text-yellow-400" aria-hidden>
                ★★★★☆
              </div>
            </div>
          </div>
        </article>

        <article class="product-card min-w-[260px] max-w-[260px] rounded-2xl bg-gradient-to-br from-white/5 to-white/3 p-4 backdrop-blur-sm border border-white/5 shadow-xl transform transition-all">
          <div class="relative">
            <div class="ribbon absolute left-3 top-3 text-xs font-semibold px-2 py-1 rounded-full bg-pink-400 text-black">-8%</div>
            <img src="{{ asset('images/pc.jpeg') }}" alt="Macbook PC" class="w-full h-32 object-contain rounded-xl">
          </div>

          <div class="mt-3 text-left">
            <h4 class="font-semibold">Macbook-like PC</h4>
            <p class="text-xs text-gray-300 mt-1">Lightweight • Powerful</p>

            <div class="mt-3 flex items-center justify-between">
              <div class="text-left">
                <div class="text-sm font-bold">KES 149,999</div>
                <div class="text-xs text-gray-400 line-through">KES 159,999</div>
              </div>

              <div class="rating text-yellow-400" aria-hidden>
                ★★★★★
              </div>
            </div>
          </div>
        </article>

        {{-- LAST SPECIAL CARD: Shoe (blurred background, CTA overlay) --}}
        <article id="specialCard" class="product-card min-w-[300px] max-w-[300px] rounded-2xl relative overflow-hidden">
          <img src="{{ asset('images/shoe.jpg') }}" alt="Shoe" class="w-full h-60 object-cover filter blur-sm scale-105">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
            <div class="backdrop-blur-md bg-black/40 p-4 rounded-xl">
              <h4 class="text-2xl font-bold">See more styles</h4>
              <p class="text-sm text-gray-200 mt-2">Exclusive drops & limited offers</p>
              <a href="{{ url('/register') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-pink-400 text-black font-semibold">
                Sign up to view
                <span class="text-xl font-bold">→</span>
              </a>
            </div>
          </div>
        </article>
      </div>

      {{-- Mobile arrows bottom --}}
      <div class="md:hidden absolute left-4 right-4 bottom-2 flex justify-between items-center px-2">
        <button id="prevMobile" class="p-2 rounded-full bg-white/5">‹</button>
        <button id="nextMobile" class="p-2 rounded-full bg-white/5">›</button>
      </div>
    </div>
  </section>

  {{-- Happy users gallery (small) --}}
  <section class="w-full max-w-6xl mx-auto py-6">
    <h4 class="text-lg font-bold mb-3">Happy customers</h4>
    <div class="grid grid-cols-3 md:grid-cols-6 gap-3">
      <img src="{{ asset('images/happy1.jpeg') }}" alt="happy1" class="w-full h-32 object-cover rounded-lg shadow-sm">
      <img src="{{ asset('images/happy2.jpg') }}" alt="happy2" class="w-full h-32 object-cover rounded-lg shadow-sm hidden md:block">
      <img src="{{ asset('images/happy3.jpeg') }}" alt="happy3" class="w-full h-32 object-cover rounded-lg shadow-sm">
      <img src="{{ asset('images/happy4.jpeg') }}" alt="happy4" class="w-full h-32 object-cover rounded-lg shadow-sm hidden md:block">
      <img src="{{ asset('images/happy5.jpeg') }}" alt="happy5" class="w-full h-32 object-cover rounded-lg shadow-sm hidden md:block">
      <img src="{{ asset('images/happy.jpg') }}" alt="happy" class="w-full h-32 object-cover rounded-lg shadow-sm">
      <div class="col-span-3 text-left mt-2 md:mt-0 text-xs text-gray-300">
        Loved by people who want quick shopping and clean UI. Try the cart & checkout flow.
      </div>
    </div>
  </section>

  {{-- Minimal footer CTA --}}
  <div class="w-full max-w-6xl mx-auto py-8 flex justify-center">
    <a href="{{ url('/register') }}" class="px-6 py-3 rounded-full bg-pink-400 text-black font-semibold shadow-lg hover:scale-105 transition">Create an account — it’s free</a>
  </div>

  {{-- Styles & small scripts (keep them at bottom) --}}
  <style>
  /* Custom keyframes and small component styles */
  @keyframes slide-left {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
  .sliding-words {
    display: inline-block;
    animation: slide-left 12s linear infinite;
  }

  .product-card:hover { transform: translateY(-6px) scale(1.01); }
  .animate-spin-slow { animation: spin 1.8s linear infinite; }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* Responsive tweaks */
  @media (max-width: 768px) {
    .product-card { min-width: 100%; max-width: 100%; }
    /* remove scrollbar track/slider on mobile */
    #cardsWrapper { overflow-x: hidden; }
    #specialCard { min-width: 90%; max-width: 90%; }
  }

  .ribbon { box-shadow: 0 6px 18px rgba(0,0,0,0.35); }

  #preloader.hidden { opacity: 0; pointer-events: none; transition: opacity 400ms ease; }
</style>


  <script>
    // --- Preloader hide ---
    window.addEventListener('load', () => {
      const pre = document.getElementById('preloader');
      pre.classList.add('hidden');
      setTimeout(() => pre.remove(), 600);
    });

    // --- Carousel logic: auto-rotate and manual nav ---
    (function () {
      const wrapper = document.getElementById('cardsWrapper');
      const cards = Array.from(wrapper.querySelectorAll('.product-card'));
      let index = 0;
      const cardWidthDesktop = cards[0]?.offsetWidth + 24 || 300;
      let interval = null;
      const rotateDelay = 3500;

      function scrollToIndex(i) {
        const card = cards[i];
        if (!card) return;
        const parentRect = wrapper.getBoundingClientRect();
        const cardRect = card.getBoundingClientRect();
        const currentScroll = wrapper.scrollLeft;
        const target = currentScroll + (cardRect.left - parentRect.left) - 12;
        wrapper.scrollTo({ left: target, behavior: 'smooth' });
      }

      function next() {
        index = (index + 1) % cards.length;
        scrollToIndex(index);
      }
      function prev() {
        index = (index - 1 + cards.length) % cards.length;
        scrollToIndex(index);
      }

      // start automatic rotation on desktop; on mobile we still auto but respect user scroll
      function startRotate() {
        if (interval) clearInterval(interval);
        interval = setInterval(next, rotateDelay);
      }

      // Buttons
      document.getElementById('nextBtn')?.addEventListener('click', () => { next(); startRotate(); });
      document.getElementById('prevBtn')?.addEventListener('click', () => { prev(); startRotate(); });
      document.getElementById('nextMobile')?.addEventListener('click', () => { next(); startRotate(); });
      document.getElementById('prevMobile')?.addEventListener('click', () => { prev(); startRotate(); });

      // Touch swipe for mobile
      let startX = 0;
      let isDown = false;
      wrapper.addEventListener('touchstart', (e) => {
        isDown = true;
        startX = e.touches[0].clientX;
        if (interval) clearInterval(interval);
      }, {passive:true});
      wrapper.addEventListener('touchmove', () => {}, {passive:true});
      wrapper.addEventListener('touchend', (e) => {
        if (!isDown) return;
        const endX = e.changedTouches[0].clientX;
        const diff = endX - startX;
        if (Math.abs(diff) > 40) {
          if (diff < 0) next();
          else prev();
        }
        isDown = false;
        startRotate();
      });

      // Pause auto-rotate while hovering on desktop
      wrapper.addEventListener('mouseover', () => { if (interval) clearInterval(interval); });
      wrapper.addEventListener('mouseleave', () => startRotate());

      // Kick off
      startRotate();

      // periodically swap some product data (subtle refreshing)
      setInterval(() => {
        // move first card to the end (keeps view fresh)
        const first = wrapper.querySelector('.product-card:first-child');
        if (first && wrapper.children.length > 1) wrapper.appendChild(first);
      }, 12000);
    })();
  </script>
</main>




        <!-- Footer -->
        <footer class="py-6 text-center text-xs text-gray-400 flex flex-col md:flex-row justify-center items-center gap-4 bg-black">
            <span>© {{ date('Y') }} Mini-Shop Lite — All rights reserved. 
                <span class="hidden md:inline">•</span>
            </span>
            <div class="flex items-center gap-4 mt-2 md:mt-0">
                <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" class="h-6">
                <img src="{{ asset('images/mpesa.jpeg') }}" alt="M-Pesa" class="h-6">
                <img src="{{ asset('images/stripe.png') }}" alt="Stripe" class="h-6">
            </div>
        </footer>

    </div>
</body>

</html>
