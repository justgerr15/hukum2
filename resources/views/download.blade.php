<x-download-layout> 
<x-slot:title>{{$title}}</x-slot>

<style>
    .download-card {
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 12px 16px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: 0.25s;
        cursor: pointer;
        margin-bottom: 16px;
    }

    .download-card:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }

    .download-card h4 {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        color: #1e293b;
    }

    .notice-meta span {
        margin-right: 10px;
        color: #64748b;
        font-size: 12px;
    }

    .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #2563eb;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.25s;
        width: max-content;
    }

    .download-btn:hover {
        background: #1d4ed8;
    }
</style>


<div class="notice-board py-10">
    <div class="container">

        <!-- Notice Item Example -->
         @foreach   ($download as $download)
        <div class="download-card">
            <h4>{{$download['name']}}</h4>

            <div class="notice-meta">
                <span><i class="far fa-buildings"></i>{{$download['category']}}</span>
            </div>

            <a href="{{$download['link']}}" class="download-btn">
                <i class="far fa-download"></i> Download
            </a>
        </div>
        @endforeach

        <!-- Duplikasi item sesuai data -->
    </div>
</div>
</x-download-layout>
