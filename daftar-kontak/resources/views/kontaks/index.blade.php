<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-1"><i class="fas fa-users me-2"></i>Daftar Kontak</h2>
            <p class="text-muted mb-0">Kelola semua kontak Anda di satu tempat</p>
        </div>
        <a href="{{ route('kontaks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Kontak Baru
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>Kontak Saya 
                        <span class="badge bg-primary ms-2">{{ $kontaks->count() }}</span>
                    </h5>
                </div>
                <div class="card-body">
                    @if ($kontaks->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kontaks as $kontak)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                        <i class="fas fa-user text-white"></i>
                                                    </div>
                                                    <strong>{{ $kontak->nama_lengkap }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="fas fa-phone text-success me-2"></i>
                                                {{ $kontak->nomor_telepon }}
                                            </td>
                                            <td>
                                                @if($kontak->email)
                                                    <i class="fas fa-envelope text-info me-2"></i>
                                                    {{ $kontak->email }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($kontak->alamat)
                                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                    {{ Str::limit($kontak->alamat, 30) }}
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('kontaks.edit', $kontak) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('kontaks.destroy', $kontak) }}" method="POST" onsubmit="return confirm('Yakin hapus kontak {{ $kontak->nama_lengkap }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-users fa-4x text-muted"></i>
                            </div>
                            <h5 class="text-muted">Belum ada kontak</h5>
                            <p class="text-muted mb-4">Mulai dengan menambahkan kontak pertama Anda</p>
                            <a href="{{ route('kontaks.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Tambah Kontak Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>