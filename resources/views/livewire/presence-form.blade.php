<div>
    @include('partials.alerts')

    <h1 class="fs-2">{{ $attendance->title }}</h1>
    <p class="text-muted">{{ $attendance->description }}</p>

    <div class="mb-4">
        <span class="badge text-bg-light border shadow-sm">Masuk : {{
            substr($attendance->data->start_time, 0 , -3) }} - {{
            substr($attendance->data->batas_start_time,0,-3 )}}</span>
        <span class="badge text-bg-light border shadow-sm">Pulang : {{
            substr($attendance->data->end_time, 0 , -3) }} - {{
            substr($attendance->data->batas_end_time,0,-3 )}}</span>
    </div>

    {{-- @if ($attendance->data->is_start && $attendance->data->is_using_qrcode)
    <button class="btn btn-primary px-3 py-2 btn-sm fw-bold">Scan QRCode Masuk</button>
    <button class="btn btn-info px-3 py-2 btn-sm fw-bold">Izin</button>
    @endif --}}

    {{-- jika tidak menggunakan qrcode (button) --}}
    @if (!$attendance->data->is_using_qrcode && !$data['is_there_permission'])

    {{-- jika belum absen dan absen masuk sudah dimulai --}}
    @if ($attendance->data->is_start && !$data['is_has_enter_today'])
    <button class="btn btn-primary px-3 py-2 btn-sm fw-bold" wire:click="sendEnterPresence" wire:loading.attr="disabled"
        wire:target="sendEnterPresence">Masuk</button>
    <a href="{{ route('home.permission', $attendance->id) }}" class="btn btn-info px-3 py-2 btn-sm fw-bold">Izin</a>
    @endif

    @if ($data['is_has_enter_today'])
    <div class="alert alert-success">
        <small class="d-block fw-bold text-success">Anda sudah berhasil mengirim absensi masuk.</small>
    </div>
    @endif

    {{-- jika absen pulang sudah dimulai, dan karyawan sudah absen masuk dan belum absen pulang --}}
    @if ($attendance->data->is_end && $data['is_has_enter_today'] && $data['is_not_out_yet'])
    <button class="btn btn-primary px-3 py-2 btn-sm fw-bold" wire:click="sendOutPresence" wire:loading.attr="disabled"
        wire:target="sendOutPresence">Pulang</button>
    @endif

    {{-- sudah absen masuk dan absen pulang --}}
    @if ($data['is_has_enter_today'] && !$data['is_not_out_yet'])
    <div class="alert alert-success">
        <small class="d-block fw-bold text-success">Anda sudah melakukan absen masuk dan absen pulang.</small>
    </div>
    @endif

    {{-- jika sudah absen masuk dan belum saatnya absen pulang --}}
    @if ($data['is_has_enter_today'] && !$attendance->data->is_end)
    <div class="alert alert-danger">
        <small class="fw-bold">Belum saatnya melakukan absensi pulang.</small>
    </div>
    @endif
    @endif

    @if($data['is_there_permission'] && !$data['is_permission_accepted'])
    <div class="alert alert-info">
        <small class="fw-bold">Permintaan izin sedang diproses (atau masih belum di terima).</small>
    </div>
    @endif

    @if($data['is_there_permission'] && $data['is_permission_accepted'])
    <div class="alert alert-success">
        <small class="fw-bold">Permintaan izin sudah diterima.</small>
    </div>
    @endif

    {{-- @if ($attendance->data->is_end && $attendance->data->is_using_qrcode)
    <button class="btn btn-primary px-3 py-2 btn-sm fw-bold">Scan QRCode Pulang</button>
    @endif

    @if ($attendance->data->is_end && !$attendance->data->is_using_qrcode)
    <button class="btn btn-warning px-3 py-2 btn-sm fw-bold">Pulang</button>
    @endif

    @if (!$attendance->data->is_start && !$attendance->data->is_end)
    <small class="text-danger fw-bold ">Belum bisa melakukan absensi.</small>
    @endif --}}
</div>