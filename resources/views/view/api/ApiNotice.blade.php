@section("title",__("查看通知消息"))
<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                {{ $title }}
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $content !!}
            </div>
            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        
                        @if(get_options("web-icp"))
                        <a href="https://beian.miit.gov.cn" class="ml-1 underline">
                            {{ get_options("web-icp") }}
                        </a>
                        @endif
                    </div>
                </div>
    
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) (SWOOLE
                    V{{ SWOOLE_VERSION }}) {{ swoole_cpu_num() }} Core CPU
                </div>
            </div>
        </div>
        
    </div>
</x-guest-layout>
