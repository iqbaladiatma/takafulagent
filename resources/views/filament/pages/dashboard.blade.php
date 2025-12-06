<x-filament-panels::page>
    <!-- Theme Toggle Button -->
    <div class="absolute top-6 right-6 z-10">
        <button id="theme-toggle" class="p-3 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition-colors duration-300 shadow-lg">
            <svg id="theme-icon-sun" class="w-5 h-5 text-white hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <svg id="theme-icon-moon" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
        </button>
    </div>

    <!-- Welcome Header with Animated Gradient -->
    <div class="mb-8 relative overflow-hidden rounded-2xl shadow-lg animate-slide-up">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 via-primary-500 to-emerald-500 animate-gradient-x"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/10 to-transparent"></div>
        
        <div class="relative p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="relative z-10">
                    <!-- Animated Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full mb-4 animate-fade-in">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium">Admin Dashboard • Takaful</span>
                    </div>
                    
                    <!-- Title with Animation -->
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-3 animate-fade-in" style="animation-delay: 0.1s">
                        Welcome back, <span class="text-emerald-200">{{ auth()->user()->name }}!</span> 👋
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-white/90 text-lg max-w-2xl animate-fade-in" style="animation-delay: 0.2s">
                        Manage your Takaful agents efficiently. Track performance, analyze data, and optimize operations.
                    </p>
                </div>
                
                <!-- Date Info with Glow Effect -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 animate-fade-in" style="animation-delay: 0.3s">
                    <div class="flex items-center gap-3 text-white">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-lg">{{ now()->translatedFormat('l, d F Y') }}</div>
                            <div class="text-sm text-white/80">{{ now()->format('H:i') }} WIB</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Floating Elements -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-emerald-400/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s"></div>
        </div>
    </div>

    <!-- Stats Widget with Animation -->
    @if(class_exists(\App\Filament\Widgets\AgenStatsOverview::class))
        <div class="mb-8 animate-slide-up" style="animation-delay: 0.3s">
            @livewire(\App\Filament\Widgets\AgenStatsOverview::class)
        </div>
    @endif

    <!-- Quick Actions Section -->
    <div class="mb-8 animate-slide-up" style="animation-delay: 0.4s">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Quick Actions</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Frequently used features</p>
            </div>
            <div class="flex items-center gap-2 text-primary-600 dark:text-primary-400">
                <svg class="w-5 h-5 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span class="text-sm font-medium">Shortcuts</span>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $quickActions = [
                    [
                        'title' => 'Add New Agent',
                        'desc' => 'Register a new agent to the system',
                        'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z',
                        'route' => 'filament.admin.resources.agens.create',
                        'color' => 'blue'
                    ],
                    [
                        'title' => 'Manage Agents',
                        'desc' => 'View and edit all registered agents',
                        'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-1.205a21.4 21.4 0 00-2.3-5.306M6.75 7.5l4.72-4.72a.75.75 0 011.28.53v15.94a.75.75 0 01-1.28.53L6.75 17.25v-9.8z',
                        'route' => 'filament.admin.resources.agens.index',
                        'color' => 'emerald'
                    ],
                    [
                        'title' => 'Analytics',
                        'desc' => 'View detailed reports and statistics',
                        'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                        'route' => 'filament.admin.pages.dashboard',
                        'color' => 'purple'
                    ],
                    [
                        'title' => 'Website Preview',
                        'desc' => 'See how your site looks to users',
                        'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                        'url' => '/',
                        'color' => 'amber',
                        'target' => '_blank'
                    ]
                ];
            @endphp
            
            @foreach ($quickActions as $index => $action)
                <a href="{{ isset($action['url']) ? url($action['url']) : route($action['route']) }}" 
                   @if(isset($action['target'])) target="{{ $action['target'] }}" @endif
                   class="group relative bg-white dark:bg-gray-800 rounded-2xl p-6 hover:shadow-2xl transition-all duration-500 hover:translate-y-[-8px] animate-fade-in-up"
                   style="animation-delay: {{ 0.5 + ($index * 0.1) }}s">
                    <!-- Hover Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-{{ $action['color'] }}-500/0 via-{{ $action['color'] }}-500/0 to-{{ $action['color'] }}-500/0 group-hover:from-{{ $action['color'] }}-500/5 group-hover:via-{{ $action['color'] }}-500/10 group-hover:to-{{ $action['color'] }}-500/5 transition-all duration-500 rounded-2xl"></div>
                    
                    <div class="relative">
                        <div class="flex items-start gap-4">
                            <!-- Animated Icon Container -->
                            <div class="relative">
                                <div class="absolute -inset-2 bg-gradient-to-br from-{{ $action['color'] }}-500 to-{{ $action['color'] }}-600 rounded-xl blur-lg opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>
                                <div class="bg-gradient-to-br from-{{ $action['color'] }}-100 to-{{ $action['color'] }}-50 dark:from-{{ $action['color'] }}-900/30 dark:to-{{ $action['color'] }}-800/20 p-4 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-{{ $action['color'] }}-600 dark:text-{{ $action['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $action['icon'] }}"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 dark:text-white mb-2">{{ $action['title'] }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">{{ $action['desc'] }}</p>
                                <div class="text-{{ $action['color'] }}-600 dark:text-{{ $action['color'] }}-400 text-sm font-medium flex items-center gap-1">
                                    <span>Get started</span>
                                    <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Animated Border Bottom -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-{{ $action['color'] }}-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Info Cards Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Best Practices Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.6s">
            <div class="flex items-center gap-4 mb-8">
                <div class="relative">
                    <div class="absolute -inset-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl blur-lg opacity-0 hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900/30 dark:to-blue-800/20 p-4 rounded-xl relative">
                        <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">Best Practices</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Tips for better agent management</p>
                </div>
            </div>
            
            <div class="space-y-4">
                @php
                    $tips = [
                        'Upload high-quality profile photos for professional appearance',
                        'Ensure WhatsApp numbers are active for instant communication',
                        'Write clear and professional agent descriptions',
                        'Regularly update agent information and status',
                        'Utilize advanced search filters for efficient management',
                        'Schedule regular data backups for security'
                    ];
                @endphp
                
                @foreach ($tips as $index => $tip)
                    <div class="flex items-start gap-3 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-300 group animate-fade-in" style="animation-delay: {{ 0.7 + ($index * 0.05) }}s">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900/30 dark:to-blue-800/20 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-sm font-bold text-blue-600 dark:text-blue-400">{{ $index + 1 }}</span>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 flex-1">{{ $tip }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.7s">
            <div class="flex items-center gap-4 mb-8">
                <div class="relative">
                    <div class="absolute -inset-3 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl blur-lg opacity-0 hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="bg-gradient-to-br from-emerald-100 to-emerald-50 dark:from-emerald-900/30 dark:to-emerald-800/20 p-4 rounded-xl relative">
                        <svg class="w-7 h-7 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">System Status</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">All systems are operational</p>
                </div>
            </div>
            
            <div class="space-y-4 mb-8">
                @php
                    $services = [
                        ['name' => 'Database Service', 'status' => 'operational', 'uptime' => '99.9%'],
                        ['name' => 'File Storage', 'status' => 'operational', 'uptime' => '100%'],
                        ['name' => 'Email Service', 'status' => 'operational', 'uptime' => '99.8%'],
                        ['name' => 'API Gateway', 'status' => 'operational', 'uptime' => '99.9%'],
                    ];
                @endphp
                
                @foreach ($services as $index => $service)
                    <div class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-300 group animate-fade-in" style="animation-delay: {{ 0.8 + ($index * 0.05) }}s">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="absolute -inset-2 bg-emerald-500 rounded-full blur-md opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                <div class="w-2 h-2 bg-emerald-500 rounded-full relative"></div>
                            </div>
                            <div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $service['name'] }}</span>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $service['uptime'] }} uptime</div>
                            </div>
                        </div>
                        <span class="text-sm bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-300 px-3 py-1.5 rounded-full">
                            {{ $service['status'] }}
                        </span>
                    </div>
                @endforeach
            </div>
            
            <!-- Uptime Stats -->
            <div class="bg-gradient-to-r from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 rounded-xl p-6 animate-fade-in" style="animation-delay: 1s">
                <div class="text-center">
                    <div class="text-4xl font-bold text-gray-800 dark:text-white mb-2 animate-count-up" data-target="99.9">0%</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">System Uptime</div>
                    <div class="mt-4 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-2 rounded-full animate-progress" style="width: 99.9%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.8s">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Recent Activity</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Latest updates and actions</p>
            </div>
            <button class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 text-sm font-medium flex items-center gap-2 px-4 py-2.5 bg-primary-50 dark:bg-primary-900/20 hover:bg-primary-100 dark:hover:bg-primary-900/30 rounded-lg transition-all duration-300 group">
                <span>View all activity</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </div>
        
        <div class="space-y-4">
            @php
                $activities = [
                    ['type' => 'agent_added', 'title' => 'New agent added', 'desc' => 'Ahmad Fauzi registered as agent', 'time' => '5 minutes ago', 'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
                    ['type' => 'profile_updated', 'title' => 'Profile updated', 'desc' => 'Siti Rahma profile information updated', 'time' => '1 hour ago', 'icon' => 'M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                    ['type' => 'export_completed', 'title' => 'Export completed', 'desc' => 'Monthly report exported successfully', 'time' => '3 hours ago', 'icon' => 'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10'],
                ];
            @endphp
            
            @foreach ($activities as $index => $activity)
                <div class="flex items-center gap-4 p-5 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-500 group animate-fade-in-up" style="animation-delay: {{ 0.9 + ($index * 0.1) }}s">
                    <!-- Icon with Glow Effect -->
                    <div class="relative">
                        @if($activity['type'] === 'agent_added')
                            <div class="absolute -inset-2 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 dark:from-blue-900/30 dark:to-blue-800/20 flex items-center justify-center relative group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"/>
                                </svg>
                            </div>
                        @elseif($activity['type'] === 'profile_updated')
                            <div class="absolute -inset-2 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-100 to-emerald-50 dark:from-emerald-900/30 dark:to-emerald-800/20 flex items-center justify-center relative group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"/>
                                </svg>
                            </div>
                        @else
                            <div class="absolute -inset-2 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-100 to-amber-50 dark:from-amber-900/30 dark:to-amber-800/20 flex items-center justify-center relative group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Activity Content -->
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800 dark:text-white">{{ $activity['title'] }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $activity['desc'] }}</p>
                    </div>
                    
                    <!-- Time Indicator -->
                    <div class="text-right">
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $activity['time'] }}</span>
                        <div class="mt-1">
                            @if($activity['type'] === 'agent_added')
                                <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-full">Completed</span>
                            @elseif($activity['type'] === 'profile_updated')
                                <span class="inline-block px-3 py-1 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-300 rounded-full">Updated</span>
                            @else
                                <span class="inline-block px-3 py-1 text-xs font-medium bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 rounded-full">Exported</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sidebar Integration Area (Optional for showing sidebar context) -->
    <div class="fixed left-0 top-1/2 transform -translate-y-1/2 z-20 hidden lg:block">
        <div class="ml-4 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-r-2xl shadow-lg p-4 border-l-4 border-primary-500">
            <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">Navigation</div>
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-primary-600 dark:text-primary-400">
                    <div class="w-2 h-2 bg-primary-500 rounded-full"></div>
                    <span class="text-sm font-medium">Dashboard</span>
                </div>
                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400">
                    <div class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                    <span class="text-sm">Agents</span>
                </div>
                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400">
                    <div class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                    <span class="text-sm">Analytics</span>
                </div>
                <div class="flex items-center gap-2 text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400">
                    <div class="w-2 h-2 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                    <span class="text-sm">Settings</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Animations and Theme Toggle JavaScript -->
    <style>
        :root {
            --primary-color: #3b82f6;
            --bg-color: #ffffff;
            --text-color: #1f2937;
        }

        .dark {
            --primary-color: #60a5fa;
            --bg-color: #1f2937;
            --text-color: #f9fafb;
        }

        /* Animations */
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradient-x {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.1;
            }
            50% {
                opacity: 0.3;
            }
        }

        @keyframes count-up {
            from {
                width: 0%;
            }
        }

        @keyframes progress {
            from {
                width: 0%;
            }
        }

        /* Animation Classes */
        .animate-slide-up {
            animation: slide-up 0.6s ease-out forwards;
            opacity: 0;
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
            opacity: 0;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
            opacity: 0;
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 3s ease infinite;
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        .animate-count-up {
            animation: count-up 2s ease-out forwards;
        }

        .animate-progress {
            animation: progress 1.5s ease-out forwards;
        }

        /* Smooth Theme Transitions */
        body, .bg-white, .bg-gray-50, .text-gray-800, .text-gray-600 {
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: #4b5563;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .dark ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Focus Styles */
        *:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .dark *:focus {
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.3);
        }
    </style>

    <script>
        // Theme Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('theme-toggle');
            const themeIconSun = document.getElementById('theme-icon-sun');
            const themeIconMoon = document.getElementById('theme-icon-moon');
            
            // Check for saved theme or prefer-color-scheme
            const savedTheme = localStorage.getItem('theme') || 
                              (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
                themeIconSun.classList.add('hidden');
                themeIconMoon.classList.remove('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                themeIconSun.classList.remove('hidden');
                themeIconMoon.classList.add('hidden');
            }
            
            // Toggle theme on button click
            themeToggle.addEventListener('click', function() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    themeIconSun.classList.remove('hidden');
                    themeIconMoon.classList.add('hidden');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    themeIconSun.classList.add('hidden');
                    themeIconMoon.classList.remove('hidden');
                }
            });
            
            // Animate count-up numbers
            const countUpElements = document.querySelectorAll('.animate-count-up');
            countUpElements.forEach(el => {
                const target = parseFloat(el.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;
                
                const updateCount = () => {
                    current += step;
                    if (current >= target) {
                        el.textContent = target + '%';
                    } else {
                        el.textContent = Math.round(current) + '%';
                        requestAnimationFrame(updateCount);
                    }
                };
                
                // Start animation when element is in viewport
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCount();
                            observer.unobserve(entry.target);
                        }
                    });
                });
                
                observer.observe(el);
            });
            
            // Add hover sound effect (optional)
            const hoverSound = new Audio('data:audio/wav;base64,UklGRigAAABXQVZFZm10IBIAAAABAAEARKwAAIhYAQACABAAZGF0YQQAAAAAAA==');
            
            document.querySelectorAll('a, button').forEach(el => {
                el.addEventListener('mouseenter', () => {
                    // Optional: Add subtle hover sound
                    // hoverSound.play().catch(() => {});
                    
                    // Add ripple effect on click
                    el.addEventListener('click', function(e) {
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;
                        
                        ripple.style.cssText = `
                            position: absolute;
                            border-radius: 50%;
                            background: rgba(255, 255, 255, 0.6);
                            transform: scale(0);
                            animation: ripple-animation 0.6s linear;
                            width: ${size}px;
                            height: ${size}px;
                            left: ${x}px;
                            top: ${y}px;
                            pointer-events: none;
                        `;
                        
                        this.style.position = 'relative';
                        this.style.overflow = 'hidden';
                        this.appendChild(ripple);
                        
                        setTimeout(() => ripple.remove(), 600);
                    });
                });
            });
            
            // Add CSS for ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</x-filament-panels::page>