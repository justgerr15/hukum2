@props(['setting'])
<div class="container">
                <div class="header-top-wrap">
                    <div class="header-top-left">
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-contact">
                            <ul>
                                <li>
                                    <a href="#"><i class="far fa-location-dot"></i>{{ $setting[0]->address ?? 'address' }}</a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com"><i class="far fa-envelopes"></i>{{ $setting[0]->email ?? 'email' }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>