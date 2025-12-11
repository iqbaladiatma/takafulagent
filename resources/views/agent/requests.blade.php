<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-list mr-2"></i>{{ __('Riwayat Request') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('agent.dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('agent.requests.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-plus mr-2"></i>Buat Request
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Pending</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $requests->where('status', 'pending')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Disetujui</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $requests->where('status', 'approved')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-times text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Ditolak</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $requests->where('status', 'rejected')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Requests List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($requests->count() > 0)
                        <div class="space-y-4">
                            @foreach($requests as $request)
                            <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $request->title }}</h3>
                                            {!! $request->status_badge !!}
                                        </div>
                                        
                                        <div class="flex items-center space-x-4 text-sm text-gray-500 mb-3">
                                            <span>
                                                <i class="fas fa-tag mr-1"></i>{{ $request->type_name }}
                                            </span>
                                            <span>
                                                <i class="fas fa-calendar mr-1"></i>{{ $request->created_at->format('d M Y, H:i') }}
                                            </span>
                                            @if($request->product)
                                                <span>
                                                    <i class="fas fa-shopping-bag mr-1"></i>{{ $request->product->judul }}
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <p class="text-gray-700 mb-3">{{ $request->description }}</p>
                                        
                                        @if($request->admin_notes)
                                            <div class="bg-blue-50 border border-blue-200 rounded p-3">
                                                <p class="text-sm font-medium text-blue-900 mb-1">
                                                    <i class="fas fa-comment mr-1"></i>Catatan Admin:
                                                </p>
                                                <p class="text-sm text-blue-800">{{ $request->admin_notes }}</p>
                                                @if($request->approved_by)
                                                    <p class="text-xs text-blue-600 mt-1">
                                                        Oleh: {{ $request->approvedBy->name }} • {{ $request->approved_at->format('d M Y, H:i') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-shrink-0 ml-4">
                                        @if($request->status === 'pending')
                                            <div class="text-right">
                                                <p class="text-sm text-gray-500">Menunggu review admin</p>
                                                <div class="mt-2">
                                                    <div class="w-6 h-6 border-2 border-yellow-500 border-t-transparent rounded-full animate-spin"></div>
                                                </div>
                                            </div>
                                        @elseif($request->status === 'approved')
                                            <div class="text-center">
                                                <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                                                <p class="text-xs text-green-600 mt-1">Disetujui</p>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <i class="fas fa-times-circle text-red-500 text-2xl"></i>
                                                <p class="text-xs text-red-600 mt-1">Ditolak</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $requests->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada request</h3>
                            <p class="text-gray-500 mb-4">Anda belum pernah membuat request perubahan.</p>
                            <a href="{{ route('agent.requests.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-plus mr-2"></i>Buat Request Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>