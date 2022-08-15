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
        <!-- <div class="intro-y col-span-12 flex justify-end flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div> -->
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
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $dt->sv==1 ? 'Terverifikasi' : ($dt->sv==2 ? 'T' : 'Y') }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <!-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div> -->
        <!-- END: Pagination -->
    </div>

@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
