<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
        
            <ul class="nav">
                @if(auth()->user()->role=='admin')
                <li><a href="{{ url('admin/dashboard') }}" class="{{ Request::is('admin/dashboard')?'active':'' }}"><i class="lnr lnr-star"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ url('admin/guru') }}" class="{{ Request::is('admin/guru')?'active':'' }}"><i class="lnr lnr-users"></i> <span>Data Guru</span></a></li>
                <li><a href="{{ url('admin/siswa/pilihtahun') }}" class="{{ Request::is('admin/siswa/pilihtahun')?'active':'' }}"><i class="lnr lnr-users"></i> <span>Data Siswa</span></a></li>
                <li><a href="{{ url('admin/kelas/pilihtahun') }}" class="{{ Request::is('admin/kelas/pilihtahun')?'active':'' }}"><i class="glyphicon glyphicon-home"></i> <span>Kelas</span></a></li>
                <li><a href="{{ url('admin/mapel/pilihtahun') }}" class="{{ Request::is('admin/mapel/pilihtahun')?'active':'' }}"><i class="lnr lnr-database"></i> <span>Mata Pelajaran</span></a></li>
                <!--<li><a href="{{ url('admin/materi/pilihtahun') }}" class="{{ Request::is('guru/materi/pilihtahun')?'active':'' }}"><i class="lnr lnr-book"></i> <span>Materi Pembelajaran</span></a></li> -->
                <li><a href="{{ url('admin/jadwalpelajaran') }}" class="{{ Request::is('admin/jadwalpelajaran')?'active':'' }}"><i class="glyphicon glyphicon-calendar"></i> <span>Jadwal Pelajaran</span></a></li>
                <li><a href="{{ url('admin/tahunakademik') }}" class="{{ Request::is('admin/tahunakademik')?'active':'' }}"><i class="glyphicon glyphicon-calendar"></i> <span>Tahun Akademik</span></a></li>
                <li><a href="{{ url('admin/pengumuman') }}" class="{{ Request::is('admin/pengumuman')?'active':'' }}"><i class="glyphicon glyphicon-envelope"></i> <span>Pengumuman</span></a></li>
                @elseif(auth()->user()->role=='guru')
                    <li><a href="{{ url('guru/dashboard') }}" class="{{ Request::is('guru/dashboard')?'active':'' }}"><i class="lnr lnr-star"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ url('guru/profile/'.auth()->user()->guru->id) }}" class="{{ Request::is('guru/profile/'.auth()->user()->guru->id)?'active':'' }}"><i class="glyphicon glyphicon-user"></i> <span>Profile</span></a></li>
                    <li><a href="{{ url('guru/kelas/pilihtahun') }}" class="{{ Request::is('admin/kelas/pilihtahun')?'active':'' }}"><i class="glyphicon glyphicon-home"></i> <span>Kelas</span></a></li>
                    {{-- <li><a href="{{ url('guru/mapel') }}" class="{{ Request::is('guru/mapel')?'active':'' }}"><i class="lnr lnr-database"></i> <span>Mata Pelajaran</span></a></li> --}}
                    {{-- <li><a href="{{ url('guru/materi/pilihtahun') }}" class="{{ Request::is('guru/materi/pilihtahun')?'active':'' }}"><i class="lnr lnr-book"></i> <span>Materi Pembelajaran</span></a></li> --}}
                    <li><a href="{{ url('guru/tugas/pilihtahun') }}" class="{{ Request::is('guru/tugas/pilihtahun')?'active':'' }}"><i class="glyphicon glyphicon-hourglass"></i> <span>Manajement Tugas/Quis/Ujian</span></a></li>
                    {{-- <li><a href="{{ url('guru/forum') }}" class="{{ Request::is('guru/forum')?'active':'' }}"><i class="lnr lnr-layers"></i> <span>Forum</span></a></li> --}}
                @elseif(auth()->user()->role=='siswa')
                    <li><a href="/siswa/dashboard/{{ auth()->user()->siswa->id }}" class="{{ Request::is('siswa/dashboard/'.auth()->user()->siswa->id)?'active':'' }}"><i class="lnr lnr-star"></i> <span>Dashboard</span></a></li>
                    <li><a href="/siswa/profile/{{ auth()->user()->siswa->id }}" class="{{ Request::is('siswa/profile/'.auth()->user()->siswa->id)?'active':'' }}"><i class="glyphicon glyphicon-user"></i> <span>Profile</span></a></li>
                    <li><a href="{{ url('siswa/kelas/'.auth()->user()->siswa->kelas_id) }}" class="{{ Request::is('siswa/kelas/'.auth()->user()->siswa->kelas->id)?'active':'' }}"><i class="lnr lnr-database"></i> <span>Kelas</span></a></li>
                    {{-- <li><a href="{{ url('siswa/materi/tahunakademik/'.auth()->user()->siswa->id_tahun) }}" class="{{ Request::is('siswa/materi/pilihtahun')?'active':'' }}"><i class="lnr lnr-book"></i> <span>Materi Pembelajaran</span></a></li> --}}
                    {{-- <li><a href="{{ url('siswa/kelas/'.auth()->user()->siswa->id.'/nilaisiswa') }}" class="{{ Request::is('kelas/'.auth()->user()->siswa->id.'/nilaisiswa')?'active':'' }}"><i class="
                                        glyphicon glyphicon-object-align-bottom"></i> <span>Nilai</span></a></li> --}}
                    {{-- <li><a href="{{ url('siswa/forum') }}" class="{{ Request::is('siswa/forum')?'active':'' }}"><i class="lnr lnr-layers"></i> <span>Forum</span></a></li> --}}
                @endif
                
                
            </ul>
        </nav>
    </div>
</div>