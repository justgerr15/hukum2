         <!-- breadcrumb -->
                <div class="site-breadcrumb" style="background: url('{{ asset('assets/img/breadcrumb/Foto.jpg') }}')">
                <div class="container">
                    <h2 class="breadcrumb-title">{{$slot}}</h2>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ url('/') }}">Tentang Kami</a></li>
                        <li class="active">{{$slot}}</li>
                    </ul>
                </div>
            </div>

        <!-- breadcrumb end -->