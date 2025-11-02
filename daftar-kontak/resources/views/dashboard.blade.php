<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-1"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
            <p class="text-muted mb-0">Selamat datang di sistem manajemen kontak</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ Auth::user()->kontaks()->count() }}</h4>
                            <p class="mb-0">Total Kontak</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ Auth::user()->kontaks()->where('email', '!=', null)->count() }}</h4>
                            <p class="mb-0">Kontak dengan Email</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ Auth::user()->kontaks()->where('alamat', '!=', null)->count() }}</h4>
                            <p class="mb-0">Kontak dengan Alamat</p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-rocket me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('kontaks.create') }}" class="btn btn-primary w-100 py-3">
                                <i class="fas fa-user-plus fa-2x mb-2"></i><br>
                                Tambah Kontak Baru
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('kontaks.index') }}" class="btn btn-success w-100 py-3">
                                <i class="fas fa-list fa-2x mb-2"></i><br>
                                Lihat Semua Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Info Sistem</h5>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-user me-2"></i><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p><i class="fas fa-envelope me-2"></i><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><i class="fas fa-clock me-2"></i><strong>Terakhir Login:</strong> {{ session('last_login') ?? 'Sekarang' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>