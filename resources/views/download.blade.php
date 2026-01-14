<x-head :setting="$setting"/>

        <header class="header">

        <div class="header-top">
            <x-sub-header :setting="$setting"/>
    </header>

            <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->

    <x-nav-bar :setting="$setting"/>

<x-download-layout> 
<x-slot:title>{{$title}}</x-slot>

<div class="notice-board py-10">
            <form action="{{ route('downloads.index') }}" method="GET" class="mb-6">
                <div style="display: flex; width: 100%; gap: 10px;">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search ?? '' }}" 
                        placeholder="Cari nama atau kategori..." 
                        style="
                            padding: 10px 14px; 
                            border: 1px solid #cbd5e1; 
                            border-radius: 8px; 
                            width: 100%; 
                            font-size: 14px;
                        "
                    >

                    <button 
                        type="submit" 
                        style="
                            padding: 10px 18px; 
                            background:#2563eb; 
                            color:white; 
                            border:none; 
                            border-radius:8px; 
                            font-weight:600;
                            white-space: nowrap;
                        "
                    >
                        Cari
                    </button>
                </div>
            </form>

    <div class="container">

        <style>
            .table-wrapper {
                overflow-x: auto;
                margin-top: 20px;
            }

            table.custom-table {
                width: 100%;
                border-collapse: collapse;
                background: #fff;
                border-radius: 10px;
                overflow: hidden;
                font-size: 14px;
            }

            table.custom-table thead {
                background: #1e293b;
                color: #fff;
            }

            table.custom-table th,
            table.custom-table td {
                padding: 12px 16px;
                border-bottom: 1px solid #e2e8f0;
            }

            /* Column Widths */
            .col-name { width: 60%; }
            .col-category { width: 20%; white-space: nowrap; }
            .col-download { width: 20%; white-space: nowrap; }

            table.custom-table tbody tr:hover {
                background: #f8fafc;
            }
        </style>

        <div class="table-wrapper">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th class="col-name">Nama File</th>
                        <th class="col-category">Kategori</th>
                        <th class="col-download">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $item)
                        <tr>
                           
                            <td>
    @php
        $ext = strtolower(pathinfo($item['link'], PATHINFO_EXTENSION));
    @endphp

    {{-- ICON BERDASARKAN EXTENSION --}}
    @if(in_array($ext, ['pdf']))
        <i class="fa-solid fa-file-pdf" style="color:#e63946; font-size:18px; margin-right:6px;"></i>
    @elseif(in_array($ext, ['doc', 'docx']))
        <i class="fa-solid fa-file-word" style="color:#1d4ed8; font-size:18px; margin-right:6px;"></i>
    @elseif(in_array($ext, ['xls', 'xlsx']))
        <i class="fa-solid fa-file-excel" style="color:#15803d; font-size:18px; margin-right:6px;"></i>
    @elseif(in_array($ext, ['zip', 'rar']))
        <i class="fa-solid fa-file-zipper" style="color:#f59e0b; font-size:18px; margin-right:6px;"></i>
    @elseif(in_array($ext, ['jpg','jpeg','png']))
        <i class="fa-solid fa-file-image" style="color:#06b6d4; font-size:18px; margin-right:6px;"></i>
    @else
        <i class="fa-solid fa-file" style="color:#64748b; font-size:18px; margin-right:6px;"></i>
    @endif

    {{ $item['name'] }}
</td>
                            <td class="col-category">{{ $item['category'] }}</td>
                            <td class="col-download" style="text-align: left; width: 60px;">
    <a href="{{ asset($item['link']) }}" 
       target="_blank"
       style="display:inline-flex; align-items:center; justify-content:center; width:35px; height:35px; background:#2563eb; border-radius:8px; color:white; font-size:18px;">
        <i class="fa-solid fa-download"></i>
    </a>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

</x-download-layout>
