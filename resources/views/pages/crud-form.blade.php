@extends('../layout/' . $layout)

@section('subhead')
    <title>PMA 2023 - Transaksi File PMA</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Transaksi File PMA </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 ">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('file.store')}}" method="POST" class="intro-y box p-5" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Form Input FIle -->
                <div class="mt-3">
                    <label>Site</label>
                    <!-- BEGIN: Basic Select -->
                    <div class="mt-2"> 
                        <select data-placeholder="Pilih site" name="site" class="tom-select w-full @error('site') border-danger @enderror">
                            <option value="" selected disabled>Pilih Site</option>
                            @foreach($site as $st)
                            <option value="{{$st->kodesite}}">{{$st->namasite}} - {{$st->lokasi}}</option>
                            @endforeach
                        </select> 
                        @error('site')
                            <div class="text-danger mt-2">{{$message}}</div>
                        @endif
                    </div>
                    <!-- END: Basic Select -->
                </div>

                <div class="mt-3">
                    <label for="file_pma">File PMA (Rar & Zip)</label>
                    <div class="mt-2">
                        <input name="file_pma" id="file_pma" type="file" class="form-control @error('file_pma') border-danger @enderror}}" /> 
                        @error('file_pma')
                            <div class="text-danger mt-2">{{$message}}</div>
                        @endif
                    </div>
                </div>
                <!-- END: Form Input File -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-lg btn-primary w-full mr-1 mb-2 mt-2">Submit</button>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-20">
        <form class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0">
                <div class="w-56 relative text-slate-500">
                    <input type="date" id="tgl" class="form-control box w-56 date-picker" placeholder="Search...">
                </div>
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-auto">
                <div class="w-56 relative text-slate-500">
                    <input type="text" id="cari" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div>
            </div>
        </form>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible ">
            <table class="table table-report -mt-2 ">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">#</th>
                        <th class="text-center whitespace-nowrap">Site</th>
                        <th class="text-center whitespace-nowrap">Tanggal</th>
                        <th class="text-center whitespace-nowrap">Waktu</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $dt)
                        <tr class="intro-x">
                            <td class="text-center w-40">
                                {{$key + 1}}
                            </td>
                            @foreach($dt as $keys => $d)
                                @if($keys != 'sv')
                                    @if($keys == 'tgl')
                                        <td class="text-center font-medium whitespace-nowrap">
                                            {{date('d-m-Y', strtotime($d))}}
                                        </td>
                                    @else
                                        <td class="text-center font-medium whitespace-nowrap">
                                            {{$d}}
                                        </td>
                                    @endif
                                @endif
                            @endforeach
                            <td class="w-40 text-center">
                                <div class="flex items-center justify-center {{ $dt->sv == 1 ? 'text-success' : 'text-danger' }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $dt->sv==1 ? 'Terverifikasi' : ($dt->sv==2 ? 'Ditolak' : 'Menunggu Verifikasi') }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        {{$data->onEachSide(1)->links()}}
        <!-- END: Pagination -->
    </div>

@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            console.log("HALO")
        });
    </script>
@endsection
