<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-slate-50">

        <div class="bg-white w-full max-w-5xl p-5 rounded-xl m-5 flex items-center flex-col md:flex-row gap-10">
            <div class="relative">
                <div class="absolute -right-6 w-[1px] h-full bg-gray-200"></div>
                <div class="flex flex-wrap items-center gap-2 justify-between mb-4">
                    <div>
                        <p class="text-gray-400">
                            Statistics
                        </p>

                        <h3 class="text-gray-600 font-bold text-xl">
                            Total summary of sales
                        </h3>
                    </div>

                    <div x-data="{ selected: 2 }"
                         class="flex *:cursor-pointer *:transition-all items-center gap-4 bg-slate-100 text-gray-500 px-2 h-14 rounded-2xl">
                        <p @click="selected = 1"
                           :class="selected == 1 && ' bg-black text-white' "
                           class="flex items-center px-4 h-10 rounded-xl">
                            Daily
                        </p>

                        <p @click="selected = 2"
                           :class="selected == 2 && ' bg-black text-white' "
                            class="flex items-center px-4 h-10 rounded-xl">
                            Weekly
                        </p>

                        <p @click="selected = 3"
                           :class="selected == 3 && ' bg-black text-white' "
                           class="flex items-center px-4 h-10 rounded-xl">
                            Monthly
                        </p>
                    </div>
                </div>
                <div class="chartContainer">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <div class="overflow-x-auto w-full md:w-auto">
            <div x-data="{ category: 1 }" class="text-gray-500 inline-flex items-start md:flex-col *:whitespace-nowrap">
                <button @click="category = 1" class="rounded-full flex gap-2 items-center px-4 py-2"
                        :class="category == 1 ? 'border border-vivid_blue bg-light_lavender text-vivid_blue' : 'border border-transparent' ">
                    <div class="w-3 h-3 rounded-full border-2"
                         :class="category == 1 ? 'bg-vivid_blue border-transparent' :  'border-violet' "></div>
                    <p>All Categories</p>
                </button>

                <button @click="category = 2" class="rounded-full flex gap-2 items-center px-4 py-2"
                        :class="category == 2 ? 'border border-vivid_blue bg-light_lavender text-vivid_blue' : 'border border-transparent' ">
                    <div class="w-3 h-3 rounded-full border-2"
                        :class="category == 2 ? 'bg-violet border-transparent' :  'border-violet' "></div>
                    <p>Smartphones
                        <span class="text-gray-400">- 37%</span>
                    </p>
                </button>

                <button @click="category = 3" class="rounded-full flex gap-2 items-center px-4 py-2"
                        :class="category == 3 ? 'border border-vivid_blue bg-light_lavender text-vivid_blue' : 'border border-transparent' ">
                    <div class="w-3 h-3 rounded-full border-2"
                         :class="category == 3 ? 'bg-vivid_blue border-transparent' :  'border-vivid_blue' "></div>
                    <p>Headphones
                        <span class="text-gray-400">- 23%</span>
                    </p>
                </button>

                <button @click="category = 4" class="rounded-full flex gap-2 items-center px-4 py-2"
                        :class="category == 4 ? 'border border-vivid_blue bg-light_lavender text-vivid_blue' : 'border border-transparent' ">
                    <div class="w-3 h-3 rounded-full border-2"
                         :class="category == 4 ? 'bg-violet border-transparent' :  'border-violet border-opacity-30' "></div>
                    <p>Cameras
                        <span class="text-gray-400">- 29%</span>
                    </p>
                </button>

                <button @click="category = 5; " class="rounded-full flex gap-2 items-center px-4 py-2"
                        :class="category == 5 ? 'border border-vivid_blue bg-light_lavender text-vivid_blue' : 'border border-transparent' ">
                    <div class="w-3 h-3 rounded-full border-2"
                         :class="category == 5 ? 'bg-vivid_blue border-transparent' :  'border-vivid_blue border-opacity-50' "></div>
                    <p>Wearables
                        <span class="text-gray-400">- 21%</span>
                    </p>
                </button>
            </div>
        </div>
        </div>

        <div class="bg-white w-full max-w-5xl p-5 rounded-xl m-5">
            <div class="flex justify-between gap-2">
                <div class="flex flex-col">
                    <p class="text-gray-400">Statistics</p>
                    <h3 class="text-gray-600 font-bold text-xl">
                        Age and gender
                    </h3>
                </div>
                <div class="flex flex-col items-end">
                    <p class="text-gray-400">
                        Total:
                    </p>
                    <h3 class="text-gray-600 font-bold text-xl">
                        31,863
                    </h3>
                </div>
            </div>

            <div class="w-full h-[1px] bg-gray-200 my-5"></div>

            <div id="horizontalBarChart"></div>
        </div>

        <div class="bg-white w-full max-w-5xl p-5 rounded-xl m-5">
            <div class="flex justify-between flex-wrap gap-2 mb-4">
                <div>
                    <p class="text-gray-400">
                        Statistics
                    </p>

                    <p class="text-gray-600 font-bold text-xl">
                        Browser usage
                    </p>
                </div>

                <div x-data="{ selected: 2 }"
                     class="flex *:cursor-pointer *:transition-all items-center gap-2 bg-slate-100 text-gray-500 px-2 h-14 rounded-2xl">
                    <p @click="selected = 1"
                       :class="selected == 1 && ' bg-black text-white' "
                       class="flex items-center px-4 h-10 rounded-xl">
                        Weekly
                    </p>

                    <p @click="selected = 2"
                       :class="selected == 2 && ' bg-black text-white' "
                       class="flex items-center px-4 h-10 rounded-xl">
                        Monthly
                    </p>
                </div>
            </div>
            <div id="browserUsageChart"></div>
        </div>

    </body>
</html>
